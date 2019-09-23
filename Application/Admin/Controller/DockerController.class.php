<?php 

namespace Admin\Controller;
use Think\Controller;

class DockerController extends MyController{


	public function ceshi(){
		$admin1=M('Admin');
		$admin2=M('Admin');
		dump($admin1===$admin2);
		$model3=new \Admin\Model\AdminModel();
		$model4=D('Admin');
		$model5=D('Admin');
		echo "ceshi";
		dump($model5===$model4);
	}

	public function showContainer(){
		$model=new \Admin\Model\View_containerwithstuandexperModel(); 
		$info=$model->show_Info();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();

	}
	
	public function showImage(){
		$model=new \Admin\Model\Docker_imageModel();
		$info=$model->show_Image();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
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
		$this->redirect('showContainer');
	}

	public function deleteImageById(){

		$image_id=I('get.image_id');
		$model=new \Admin\Model\Docker_imageModel();
		$model->delete_Image_By_Id($image_id);
		$this->redirect('showImage');

	}

	/**
	 *   开关机 容器
	 */
	public function handleContainer(){     
		$model=new \Admin\Model\Docker_containerModel();
		$containers=$model->show_All_Container();   //MySql中所有容器信息
		$all_status=$this->getAllContainerStatus();
		// $all_status=substr($all_status, 1, -1);
		// $arr = explode(']',$all_status);
		// dump($all_status);
		// dump($arr);
		for($i=0;$i<count($containers);$i++){
			$container_id=$containers[$i]['container_id'];
			$status=$this->getContainerStatus($container_id);
			$containers[$i]['status']=$status;
		}
		// for($j=0;$j<count($all_status);$j++){
		// 		dump($all_status[$j]);
		// }
		$count=$model->count_Num();
		$this->assign('datas',$containers);
		$this->assign('count',$count);
		$this->display();
	}

	public function addImage(){
		if(IS_POST){
			$post=I('post.');
			$model=new \Admin\Model\Docker_imageModel();
		try{
			$status=$model->add_Image($post);
			if($status)
				$this->success('添加成功');
			else
				$this->error('添加失败');
				
		}catch(\Exception $e){
		 	$this->error('数据库添加失败');
		}
		}else{
			$this->display();
		}
		
	}

	public function getContainerStatus($container_id){
		$docker_path=dirname(__FILE__).'/ControllerDocker/getContainerStatus.py'; 
		return exec("/usr/bin/python $docker_path $container_id"); 
	}

	public function getAllContainerStatus(){

		$docker_path=dirname(__FILE__).'/ControllerDocker/showAllContainerStatus.py'; 
		return exec("/usr/bin/python $docker_path"); 

	}


	public function restartContainerById(){   //后台重启容器

		$container_id=I('get.container_id');
	
		$docker_path=dirname(__FILE__).'/ControllerDocker/restartContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		$this->redirect('handleContainer');
	}

	public function startContainerById(){  //启动容器
		$container_id=I('get.container_id');
		
		$docker_path=dirname(__FILE__).'/ControllerDocker/startContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		$this->redirect('handleContainer');
	}

	public function shutdownContainerById(){   //关机
		$container_id=I('get.container_id');	
		$docker_path=dirname(__FILE__).'/ControllerDocker/stopContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		$this->redirect('handleContainer');
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
		$model=new \Admin\Model\Docker_imageModel();
		$search=I('post.search-sort');
		$keywords=I('post.keywords'); 

		$info=$model->find_Image_By_Like($search,$keywords);
		$count=$model->count_Image_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('showImage');
	
	}
	

}