<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class DockerController extends BaseTeacherController{

	public  $docker=NULL;

	public function _initialize(){
		$this->docker=getControllerDockerWay();
	}
	public function addImageAndId(){
		
		$post=I('post.');
		try{
			$status=D('MakeImage')->add_Image_AndId($post);
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
			$imageName=I('post.image_name');
		try{
				$imageId=$this->docker->pullImageByName($imageName);

				$ImageInfo=array('image_id'=>$imageId,'image_name'=>$$imageName);
				$status=D('MakeImage')->add_Image_AndId($ImageInfo);
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

	public function makeImage(){

		$imageId=I('post.systemType');

		$containerInfo=runContainerById($imageId,$ips['ip']);
		$status=D('DockerContainer')->addDataByOrder($containerInfo['container_id'],session('teacher_id'),$containerInfo['ip'],$imageId,$containerInfo['ip_num']);		

		$url= \MyUtils\DockerUtils\NoVNC::getWsUrlByIp($containerInfo['ip_num']);

		$this->assign('containerId',$containerInfo['container_id']);
		$this->assign('url',$url);
		$this->display();
	}

	public function toMakeImage(){
			$container_id=I('post.containerId');
			$imageName=I('post.image_name');
			$teacher_id=session('teacher_id');

			$image_id=$this->docker->commitContainerById($container_id);
			$data=['image_id'=>$image_id,'image_name'=>$imageName,'from_teacher'=>$teacher_id];
			D('MakeImage')->add($data);
	}

	public function chooseMakeImage(){

		$this->display();

	}
}