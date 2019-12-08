<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class DockerController extends BaseHomeController{

	/*
		如果学生已经加入课程，直接启动所在容器	
		学生还没有加入即第一次加入，run一个容器
	 */
	 
	public  $docker=NULL;

	public function _initialize(){

		// $SdkOrApi=new \MyUtils\DockerUtils\SdkOrApi();
		// $manner=$SdkOrApi->getControllerManner();
		// if($manner=='PythonSdk'){
		// 	$this->docker=new \Home\Controller\Entity\DockerSdk();
		// }else{
			$this->docker=new \MyUtils\DockerUtils\DockerApi();
		// }
	}


	public function judgeExperimentType($experimentId){

		$model=new \Home\Model\Experiment_imageModel();
		$info=$model->is_Have_More_Image($experimentId);

		if($info==0){
			$this->error('该实验没有镜像');
		}else if($info>1){
			$this->redirect("Home/Docker/joinMoreExperiment/experimentId/$experimentId");
		}
			$this->redirect("Home/Docker/joinExperiment/experimentId/$experimentId");	
		
	}


	public function joinMoreExperiment($experimentId){

		$model=new \Home\Model\Experiment_imageModel();
		$model2=new \Home\Model\Student_experimentModel();
		$model3=new \Home\Model\Docker_containerModel();
		

		$user_id=session('user_id');
	    
		$is_exist=$model2->if_Join_Experiment($user_id,$experimentId); 
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			$image_ids=$model->find_ImageId_By_experimentId($experimentId);

			$noVNC=new \MyUtils\HostUtils\Host();
			$hostName=$noVNC->getHostName();

			$arr_Url=array();
			for($i=0;$i<count($image_ids);$i++){
				$container_id=$model3->find_Container_By_UserId($user_id,$image_ids[$i]);
				
				$this->docker->startContainerById($container_id);
				// $ip_num=$model3->find_Ip_id($user_id,$image_ids[$i]);
				  $ip_num=$model3->find_Ip_id($container_id);

				$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
				$arr_Url[$i]=$url;
			}
			$this->assign('datas',$arr_Url);
			$this->display('NoVNC/joinMoreExperiment');

		}else{             //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id
			$image_ids=$model->find_ImageId_By_experimentId($experimentId);
			$image_names=$model->find_ImageId_By_experimentName($experimentId);
			$host_Names=$model->find_HostName_By_experimentId($experimentId);

			$model2->student_Join_Experiment($user_id,$experimentId);    //学生加入课程，填写到experiment 


			$noVNC=new \MyUtils\HostUtils\Host();
			$hostName=$noVNC->getHostName();

			$first_containerId=Null;
			$arr_Url=array();
			for($i=0;$i<count($image_names);$i++){
				$info=$this->runContainerById($image_names[$i],$hostName=$host_Names[$i],$link_Container=$first_containerId);
				if($i==0){
					$first_containerId=$info[0];
				}
				$data=array('Container_id'=>$info[0],
						'student_id'=>$user_id,
						'ip'=>$info[1],
						'Image_id'=>$image_ids[$i],
						'to_experiment'=>$experimentId,
						'ip_num'=>$info[2]);
				$model3->add_Container($data);

				$ip_num=$info[2];
				$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
				$arr_Url[$i]=$url;

			}
			$this->assign('datas',$arr_Url);
			$this->display('NoVNC/joinMoreExperiment');
		}
	}



	
	public function joinExperiment($experimentId){
		

		$model2=new \Home\Model\Student_experimentModel();
		$model3=new \Home\Model\Docker_containerModel();
		$model4=D('Experiment');

		$user_id=session('user_id');

	    
		$is_exist=$model2->if_Join_Experiment($user_id,$experimentId);  //判断是否已经加入课程
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			$containerInfo=$model3->find_Container_Info(array('student_id'=>$user_id,'to_experiment'=>$experimentId));
			$this->docker->startContainerById($containerInfo['container_id']);
			
			$isDesktop=$model4->is_Desktop_ById($experimentId);
			if($isDesktop){
				 \MyUtils\DockerUtils\NoVNC::JumpUrlByIp($containerInfo['ip_num']);
			}
				\MyUtils\DockerUtils\Ssh::jumpSshUrlByIP($containerInfo['ip']);

			
		}else{   //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id    
			$model=new \Home\Model\Experiment_imageModel();
		    
			$image_id=$model->find_ImageId_By_experimentId($experimentId);
			$info=$this->runContainerById($image_id);  //此处应该是上行的，改一部分

			$model2->student_Join_Experiment($user_id,$experimentId);

			$data=array('Container_id'=>$info[0],
						'student_id'=>$user_id,
						'ip'=>$info[1],
						'Image_id'=>$image_id,
						'to_experiment'=>$experimentId,
						'ip_num'=>$info[2]);
			$model3->add_Container($data); //学生容器id 加入 docker_container


			$isDesktop=$model4->is_Desktop_ById($experimentId);
			if($isDesktop){
				 \MyUtils\DockerUtils\NoVNC::JumpUrlByIp($info[2]);
			}
			       \MyUtils\DockerUtils\Ssh::jumpSshUrlByIP($info[1]);
		}
	}



	/*
		docker run -d 运行一个新容器，返回容器id,存入数据库
	 */
	public function runContainerById($image_id,$hostName=Null,$link_Container=Null){
		
		
		$ips=$this->docker->getNewIp();
		
		$ip=$ips['ip'];
		
		$container_id=$this->docker->runContainerByIdIp($image_id,$ip,$hostName=$hostName,$link_Container=$link_Container);    //具体docker中 run -it 
		$info[]=$container_id;
		$info[]=$ip;
		$info[]=$ips['ip_num'];
		return $info;
	}

}