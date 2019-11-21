<?php 

namespace Home\Controller;
use Think\Controller;

class DockerController extends MyController{

	/*
		如果学生已经加入课程，直接启动所在容器	
		学生还没有加入即第一次加入，run一个容器
	 */
	 
	public  $docker=NULL;

	public function _initialize(){

		$SdkOrApi=new \Admin\Controller\Entity\SdkOrApi();
		// $manner=$SdkOrApi->getControllerManner();
		// if($manner=='PythonSdk'){
		// 	$this->docker=new \Home\Controller\Entity\DockerSdk();
		// }else{
			$this->docker=new \Home\Controller\Entity\DockerApi();
		// }
	}


	public function joinMoreExperiment($experimentId){

		$model=new \Home\Model\Experiment_imageModel();
		$model2=new \Home\Model\Student_experimentModel();
		$model3=new \Home\Model\Docker_containerModel();
		

		$user_id=session('user_id');
	    
		$is_exist=$model2->if_Join_Experiment($user_id,$experimentId); 
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			$image_ids=$model->find_ImageId_By_experimentId($experimentId);

			$noVNC=new \Home\Controller\Entity\Host();
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


			$noVNC=new \Home\Controller\Entity\Host();
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



	
	public function joinExperiment($id){
		$experimentId=$id;

		$model2=new \Home\Model\Experiment_imageModel();
		$info=$model2->is_Have_More_Image($experimentId);

		if($info==0){
			$this->error('该实验没有镜像');
		}else if($info>1){
			$this->redirect("Home/Docker/joinMoreExperiment/experimentId/$experimentId");
		}

		// $model=D('Experiment');
		$model=new \Home\Model\Experiment_imageModel();
		
		$model2=new \Home\Model\Student_experimentModel();
		$model3=new \Home\Model\Docker_containerModel();

		$user_id=session('user_id');

	    
		$is_exist=$model2->if_Join_Experiment($user_id,$experimentId);  //判断是否已经加入课程
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			$image_id=$model->find_ImageId_By_experimentId($experimentId);

			
			$container_id=$model3->find_Container_By_UserId($user_id,$image_id);


			$this->docker->startContainerById($container_id);

			$ip_num=$model3->find_Ip_id($container_id);

	
			
			$noVNC=new \Home\Controller\Entity\NoVNC();
			$noVNC->JumpUrlByIp($ip_num);
 
			exit();
		}else{             //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id
			$image_id=$model->find_ImageId_By_experimentId($experimentId);
			$image_name=$model->find_ImageId_By_experimentName($experimentId);


			$model2->student_Join_Experiment($user_id,$experimentId);    //学生加入课程，填写到experiment 

			// $info=$this->runContainerById($image_id);
			$info=$this->runContainerById($image_id);  //此处应该是上行的，改一部分

			$data=array('Container_id'=>$info[0],
						'student_id'=>$user_id,
						'ip'=>$info[1],
						'Image_id'=>$image_id,
						'to_experiment'=>$experimentId,
						'ip_num'=>$info[2]);

			$model3->add_Container($data); //学生容器id 加入 docker_container

			// $ip_num=$model3->find_Ip_id($user_id,$image_id);
			$ip_num=$info[2];


			 $noVNC=new \Home\Controller\Entity\NoVNC();
			 $noVNC->JumpUrlByIp($ip_num);

			exit();
		}
	}

	public function test01(){

		$model3=new \Home\Model\Docker_containerModel();
		$info=array('Container_id'=>'321','student_id'=>'100','ip'=>'10.6.7.22','Image_id'=>'3213121fsda','to_experiment'=>'32','ip_num'=>'22');
		dump($info);
		$info=$model3->add_Container2($info);
		dump($info);
	}
	
	public function restartContainerByIp($false_ip){
		$ip_num=str_replace('host','',$false_ip);
		dump($false_ip);
		dump($ip_num);
		
		$model=new \Home\Model\Docker_containerModel();
		$container_id=$model->find_ContainerId_By_Ip($ip_num);

		// $docker=new \Home\Controller\Entity\Docker();
		$this->docker->restartContainerById($container_id);
		
		$noVNC=new \Home\Controller\Entity\NoVNC();
		$noVNC->JumpUrlByIp($ip_num);
		exit();
	}

	public function startContainerByIp($false_ip){
		
		$ip_num=str_replace('host','',$false_ip);

		$model=new \Home\Model\Docker_containerModel();
		$container_id=$model->find_ContainerId_By_Ip($ip_num);
		
		// $docker=new \Home\Controller\Entity\Docker();
		$this->docker->startContainerById($container_id);

		$noVNC=new \Home\Controller\Entity\NoVNC();
		$noVNC->JumpUrlByIp($ip_num);

		exit();
	}

	public function stopContainerByIp($false_ip){
		$model=new \Home\Model\Docker_containerModel();

		$ip_num=str_replace('host','',$false_ip);
		$container_id=$model->find_ContainerId_By_Ip($ip_num);
		
		// $docker=new \Home\Controller\Entity\Docker();
		$this->docker->stopContainerById($container_id);
		$noVNC=new \Home\Controller\Entity\NoVNC();
		$noVNC->JumpUrlByIp($ip_num);

		// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
		// $noVNC=new \Home\Controller\Entity\NoVNC();
		// $noVNC->JumpUrlByIp($ip_num);
		exit();

	}

	/*
		docker run -d 运行一个新容器，返回容器id,存入数据库
	 */
	public function runContainerById($image_id,$hostName=Null,$link_Container=Null){
		
		// $docker=new \Home\Controller\Entity\Docker();
		$ips=$this->docker->getNewIp();
		
		$ip=$ips['ip'];
		
		$container_id=$this->docker->runContainerByIdIp($image_id,$ip,$hostName=$hostName,$link_Container=$link_Container);    //具体docker中 run -it 

		$info[]=$container_id;
		$info[]=$ip;
		$info[]=$ips['ip_num'];
		return $info;
	}

	public function resetContainer($id){

		
			

		$model=new \Home\Model\Docker_containerModel();
		$model2=new \Home\Model\Chapter_imageModel();
		$info=$model->findContainerById($id);

		$imageName=$model2->findImageNameById($info['Image_id']);
	
		$this->docker->deleteContainerById($info['container_id']);
		$container_id=$this->docker->runContainerByIdIp($imageName,$info['ip']);


		$model->updateContainerId($id,$container_id);

		$this->redirect("Course/joinChapterById",array('id'=>$info['to_chapter']));
	}

	


}