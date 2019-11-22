<?php 

namespace Admin\Controller;
use Think\Controller;

class DockerController extends MyController{


	public static $name="xiaming";

	public $docker=NULL;
	public function __construct(){
		parent::__construct();
		$this->docker=new \Home\Controller\Entity\DockerApi();
	}

	public function deleteContainerById(){  //在Docker中删除此容器，同时删除数据库中容器和课程记录
		//dokcer中删除容器
		$container_id=I('get.container_id');
		$eid=I('get.eid');
		$user_id=I('get.user_id');

		dump($container_id);
		dump($eid);
		dump($user_id);
		// $docker_path=dirname(__FILE__).'/ControllerDocker/deleteContainerById.py';
		// exec("/usr/bin/python $docker_path $container_id");

		//删除数据库中的容器和课程记录
		$model=new \Admin\Model\Docker_containerModel(); 
		$model2=new \Admin\Model\Student_experimentModel();
		$model->delete_Container_By_Id($container_id);
		$model2->delete_Experiment_By_Id($user_id,$eid);
		$this->redirect('Experiment/showExperimentContainer');
	}

	public function showAllContainer(){
		$allContainers=$this->docker->showAllContainer();
		$this->assign('datas',$allContainers);
		$this->display();
	}

	// public function dealInfo($info){

	// 	array_walk($info, function (&$item) {
 //    		$item = array_diff($item, ['Image']);
	// 	});
	// 	return $info;
	// }



	/**
	 *   开关机 容器
	 */
	
	public function handleContainer(){     
		$model=new \Admin\Model\Docker_containerModel();
		$containers=$model->show_All_Container();   //MySql中所有容器信息
		$all_status=$this->docker->showAllContainer();

		for($i=0;$i<count($containers);$i++){
			$container_id=$containers[$i]['container_id'];
			$status=$this->docker->showContainerStatus($container_id);

			$containers[$i]['status']=$status;
		}

		$count=$model->count_Num();
		$this->assign('datas',$containers);
		$this->assign('count',$count);
		$this->display();
	}

	public function addImageAndId(){
		
		$post=I('post.');
		

		try{
			// $model=new \Admin\Model\Chapter_imageModel();
			$model=new \Admin\Model\Make_imageModel();
			$status=$model->add_Image_AndId($post);
			if($status)
				$this->success('添加成功');
			else
				$this->error('添加失败');
				
		}catch(\Exception $e){
		 	$this->error('数据库添加失败');
		}	
	}


	public function addImage(){
		if(IS_POST){
			$imageName=I('post.name');
			
		try{
				$imageId=$this->docker->pullImageByName($imageName);

				// $model=new \Admin\Model\Chapter_imageModel();
				$model=new \Admin\Model\Make_imageModel();

				$ImageInfo=array('image_id'=>$imageId,'name'=>$$imageName);
				$status=$model->add_Image_AndId($ImageInfo);
			if($status){
				$this->success('添加成功');
			}
			else{
				$this->error('添加失败');
			}
				
		
				
		}catch(\Exception $e){
		 	$this->error('失败');
		}
		}else{
			$this->display();
		}
		
	}

	public function test01(){
		$imageName="ubuntu:latest";
		// $imageName="registry.cn-hangzhou.aliyuncs.com/jianhanke/ssh_base_desktop_auto";
		$info=$this->docker->pullImageByName($imageName);
		dump($info);
	}


	public function restartContainerById(){   //后台重启容器

		$container_id=I('get.container_id');

		$this->docker->restartContainerById($container_id);
		$this->redirect('handleContainer');
	}

	public function startContainerById(){  //启动容器
		$container_id=I('get.container_id');
		
		 $this->docker->startContainerById($container_id);
		$this->redirect('handleContainer');
	}

	public function shutdownContainerById(){   //关机
		$container_id=I('get.container_id');	
		
		$this->docker->stopContainerById($container_id);
		$this->redirect('Docker/handleContainer');
	}	

	/* 
			视图查询
			搜索查询，查询的是Container_student_experiment
	 */

	public function findContainerByLike(){   
		$model=new \Admin\Model\View_containerwithstuandexperModel();
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=$model->find_Container_By_Like($search,$keywords);
		$count=$model->count_Container_By_Like($search,$keywords);

		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('showContainer');
	}
	/*
		单表查询，容器搜索查询 
	 */
	public function findOnlyContainerByLike(){

		$model=new \Admin\Model\Docker_containerModel();
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=$model->find_Container_By_Like($search,$keywords);
		$count=$model->count_Container_By_Like($search,$keywords);

		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('handleContainer');
	}

	public function findImageByLike(){
		$model=new \Admin\Model\Chapter_imageModel();
		$search=I('post.search-sort');
		$keywords=I('post.keywords'); 

		$info=$model->find_Image_By_Like($search,$keywords);
		$count=$model->count_Image_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('showImage');	
	}

	public function dockerController(){

		dump(self::$name);
		self::$name="shishi";
		dump(self::$name);

		$sdkOrApi=new \Admin\Controller\Entity\SdkOrApi();
		if(IS_POST){
			$select=I('post.select');
			$sdkOrApi->setControllerManner($select);
		}
			$currentManner=$sdkOrApi->getControllerManner();
			$this->assign('currentManner',$currentManner);
			$this->display();	
	}

	public function makeImage(){

		$systemType=I('post.systemType');
		
		$docker=new \Home\Controller\Entity\DockerApi();

		$ips=$docker->getNewIp();
		$ip=$ips['ip'];
		
		$container_id=$docker->runContainerByIdIp($systemType,$ip);

		$model3=new \Home\Model\Docker_containerModel();
		$model3->add_Container('110',$container_id,$systemType,$ip,$ips['ip_num']);

		$noVNC=new \Home\Controller\Entity\Host();
		$hostName=$noVNC->getHostName();

		$url='ws://'.$hostName.':6080/websockify?token=host'.$ips['ip_num'];

		$this->assign('containerId',$container_id);
		$this->assign('url',$url);
		$this->display();


		}		
		public function toMakeImage(){
			$container_id=I('post.containerId');
			$imageName=I('post.imageName');
			$admin_name=session('admin_name');

			$docker=new \Home\Controller\Entity\DockerApi();
			$image_id=$docker->commitContainerById($container_id);
			$data=['image_id'=>$image_id,'name'=>$imageName,'from_admin'=>$admin_name];

			$model=new \Home\Model\Make_imageModel();
			$model->add($data);
		}



	public function chooseMakeImage(){

		$this->display();

	}



	

}