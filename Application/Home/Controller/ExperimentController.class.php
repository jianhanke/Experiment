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
		$this->docker=getControllerDockerWay();
	}

	public function showMyExperiment(){
		$user_id=session('user_id');

		$info=D('StudentExperiment')->show_My_Experiment($user_id);
		$this->assign('datas',$info);
		$this->display();
	}

	public function showExperiment(){

		$user_id=session('user_id');
		$info=D('Experiment')->getDataAboutMe($user_id);
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
		
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			// $image_ids=D('ExperimentImage')->find_ImageId_By_experimentId($experimentId);
			
			$containerInfo=D('ViewContainerStuExperiment','Logic')->getData($user_id,$experimentId);
			for($i=0;$i<count($containerInfo);$i++){
				$this->docker->startContainerById($containerInfo[$i]['container_id']);
				$arr_Url[$i]=\MyUtils\DockerUtils\NoVNC::getWsUrlByIp($containerInfo[$i]['ip_num']);
			}
			$this->assign('datas',$arr_Url);
			$this->display('NoVNC/joinMoreExperiment');

		}else{             //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id

			$datas=D('ExperimentImage')->getDataById($experimentId);
			$stu_experiment_key=D('StudentExperiment')->student_Join_Experiment($user_id,$experimentId);    //学生加入课程，填写到experiment 
			$first_containerId=Null;
			for($i=0;$i<count($datas);$i++){
				$info=runContainerById($datas[$i]['image_id'],$hostName=$datas[$i]['hostname'],$link_Container=$first_containerId);
				if($i==0){
					$first_containerId=$info['container_id'];
				}
				$data=array('Container_id'=>$info['container_id'],
							'ip'=>$info['ip'],
							'Image_id'=>$datas[$i]['image_id'],
							'ip_num'=>$info['ip_num']);
				$container_key=D('DockerContainer')->addData($data);
				$arr[]=array('stu_id'=>$user_id,'stu_experiment_key'=>$stu_experiment_key,'container_key'=>$container_key);
				$arr_Url[$i]=\MyUtils\DockerUtils\NoVNC::getWsUrlByIp($info['ip_num']);
			}
			D('StuExperimentContainer')->addData($arr);		
			$this->assign('datas',$arr_Url);
			$this->display('NoVNC/joinMoreExperiment');
		}
	}

	public function joinExperiment($experimentId){
		
		$user_id=session('user_id');
		$is_exist=D('StudentExperiment')->if_Join_Experiment($user_id,$experimentId);  //判断是否已经加入课程
		
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启

			$containerInfo=D('ViewContainerStuExperiment','Logic')->getData($user_id,$experimentId);
			$this->docker->startContainerById($containerInfo['container_id']);
			$isDesktop=D('Experiment')->is_Desktop_ById($experimentId);
			if($isDesktop){
				 \MyUtils\DockerUtils\NoVNC::JumpUrlByIp($containerInfo['ip_num']);
			}
				\MyUtils\DockerUtils\Ssh::jumpSshUrlByIP($containerInfo['ip']);

			
		}else{   //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id    
		    
			$image_id=D('ExperimentImage')->find_ImageId_By_experimentId($experimentId);
			$info=runContainerById($image_id);  //此处应该是上行的，改一部分

			$experiment_key=D('StudentExperiment')->student_Join_Experiment($user_id,$experimentId);
			
			$data=array('Container_id'=>$info['container_id'],
						'ip'=>$info['ip'],
						'Image_id'=>$image_id,
						'ip_num'=>$info['ip_num']);

			$container_key=D('DockerContainer')->addData($data); //学生容器id 加入 docker_container

			D('StuExperimentContainer')->addDataByOrder($user_id,$experiment_key,$container_key);

			$isDesktop=D('Experiment')->is_Desktop_ById($experimentId);

			if($isDesktop){
				 \MyUtils\DockerUtils\NoVNC::JumpUrlByIp($info['ip_num']);
			}
			       \MyUtils\DockerUtils\Ssh::jumpSshUrlByIP($info['ip']);
		}
	}




	public function serachKeyWord($keyword){

		$info=D('Experiment')->serach_Key_Wordl($keyword);
		$this->assign('datas',$info);
		$this->display('showExperiment');
	}

}