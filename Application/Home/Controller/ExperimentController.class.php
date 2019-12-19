<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class ExperimentController extends BaseHomeController{

	/*
		如果学生已经加入课程，直接启动所在容器	
		学生还没有加入即第一次加入，run一个容器
	 */
	 
	public  $docker=NULL;

	public function _initialize(){
		$way=getDockerWay();
		$this->docker=\MyUtils\DockerUtils\DockerFactory::createControllerWay($way);
	}

	public function showMyExperiment(){
		$user_id=session('user_id');

		$info=D('StudentExperiment')->show_My_Experiment($user_id);
		// $info=D('ViewStuContainerExperiment','Logic')->show_My_Experiment($user_id);
		// echo $model-> _sql();
		$this->assign('datas',$info);
		$this->display();
	}

	public function showExperiment(){
		
		$info=D('Experiment')->show_Experiment();
		$user_id=session('user_id');
		
		$arr=array();
		for($i=0;$i<count($info);$i++){
			
			$experiment_id=$info[$i]['eid'];
			$is_Join=$this->isJoinExperimentById($user_id,$experiment_id);
			$info[$i]['is_Join']=$is_Join;
		}
		$this->assign('datas',$info);
		$this->display();
	}

	public function isJoinExperimentById($user_id,$experiment_id){
		
		return D('StudentExperiment')->if_Join_Experiment($user_id,$experiment_id);
	       // return  D("StudentExperiment")->if_Join_Experiment($user_id,$experimentId);
	}


	public function judgeExperimentType($experimentId){

		$info=D('ExperimentImage')->is_Have_More_Image($experimentId);

		if($info==0){
			$this->error('该实验没有镜像');
		}else if($info>1){
			$this->redirect("Home/Experiment/joinMoreExperiment/experimentId/$experimentId");
		}
			$this->redirect("Home/Experiment/joinExperiment/experimentId/$experimentId");	
		
	}


	public function joinMoreExperiment($experimentId){

		$user_id=session('user_id');
	    
		$is_exist=D('StudentExperiment')->if_Join_Experiment($user_id,$experimentId); 
		// $is_exist=D('StuContainerExperiment')->if_Join_Experiment($user_id,$experimentId);
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			$image_ids=D('ExperimentImage')->find_ImageId_By_experimentId($experimentId);

			$hostName=(new \MyUtils\HostUtils\Host())->getHostName();

			$arr_Url=array();
			for($i=0;$i<count($image_ids);$i++){
				
				$data=D('DockerContainer')->findDataById($user_id,$image_ids[$i]);
				$this->docker->startContainerById($data['container_id']);
				dump("ceshi");
				$arr_Url[$i]=\MyUtils\DockerUtils\NoVNC::getWsUrlByIp($data['ip_num']);
			}
			$this->assign('datas',$arr_Url);
			$this->display('NoVNC/joinMoreExperiment');

		}else{             //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id

			$datas=D('ExperimentImage')->getDataById($experimentId);

			D('StudentExperiment')->student_Join_Experiment($user_id,$experimentId);    //学生加入课程，填写到experiment 
			$hostName=(new \MyUtils\HostUtils\Host())->getHostName();

			$first_containerId=Null;
			$arr_Url=array();

			for($i=0;$i<count($datas);$i++){
				$info=$this->runContainerById($datas[$i]['image_id'],$hostName=$datas[$i]['hostname'],$link_Container=$first_containerId);
				if($i==0){
					$first_containerId=$info[0];
				}
				$data=array('Container_id'=>$info[0],
						'student_id'=>$user_id,
						'ip'=>$info[1],
						'Image_id'=>$datas[$i]['image_id'],
						'to_experiment'=>$experimentId,
						'ip_num'=>$info[2]);
				D('DockerContainer')->addData($data);
				$arr_Url[$i]=\MyUtils\DockerUtils\NoVNC::getWsUrlByIp($info[2]);
			}
			$this->assign('datas',$arr_Url);
			$this->display('NoVNC/joinMoreExperiment');
		}
	}

	public function joinExperiment($experimentId){
		
		$user_id=session('user_id');
		$is_exist=D('StudentExperiment')->if_Join_Experiment($user_id,$experimentId);  //判断是否已经加入课程
		// $is_exist=D('StuContainerExperiment')->if_Join_Experiment($user_id,$experimentId);
		

		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
			
			$containerInfo=D('DockerContainer')->find_Container_Info(array('student_id'=>$user_id,'to_experiment'=>$experimentId));
			$this->docker->startContainerById($containerInfo['container_id']);
			dump($containerInfo);
			
			$isDesktop=D('Experiment')->is_Desktop_ById($experimentId);
			if($isDesktop){
				 \MyUtils\DockerUtils\NoVNC::JumpUrlByIp($containerInfo['ip_num']);
			}
				\MyUtils\DockerUtils\Ssh::jumpSshUrlByIP($containerInfo['ip']);

			
		}else{   //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id    
		    
			$image_id=D('ExperimentImage')->find_ImageId_By_experimentId($experimentId);
			$info=$this->runContainerById($image_id);  //此处应该是上行的，改一部分

			D('StudentExperiment')->student_Join_Experiment($user_id,$experimentId);

			$data=array('Container_id'=>$info[0],
						'student_id'=>$user_id,
						'ip'=>$info[1],
						'Image_id'=>$image_id,
						'to_experiment'=>$experimentId,
						'ip_num'=>$info[2]);

			$status=D('DockerContainer')->addData($data); //学生容器id 加入 docker_container

			$isDesktop=D('Experiment')->is_Desktop_ById($experimentId);
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
		
		
		$ips=getNewIp();
		
		$ip=$ips['ip'];
		
		$container_id=$this->docker->runContainerByIdIp($image_id,$ip,$hostName=$hostName,$link_Container=$link_Container);    //具体docker中 run -it 
		$info[]=$container_id;
		$info[]=$ip;
		$info[]=$ips['ip_num'];
		return $info;
	}

	public function serachKeyWord($keyword){

		$info=D('Experiment')->serach_Key_Wordl($keyword);
		$this->assign('datas',$info);
		$this->display('showExperiment');
	}

}