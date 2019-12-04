<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class CourseController extends BaseHomeController{


	public  function showCourseById(){


		$id=I('get.id');
		$model=D('Chapter');
		// $info=$model->find_Chapter_By_Course_Id($id);
		$info=$model->show_MyChapterInfo_ById($id,Session('user_id'));

		$this->assign('datas',$info);
		$this->display();
	}

	public function joinChapterById(){

		$chapter_id=I('get.id');
		$user_id=session('user_id');
		// $model=D('chapter');
		$model=new \Home\Model\Chapter_imageModel();
		
		$model3=new \Home\Model\Docker_containerModel();

		$image_id=$model->find_Image_By_id($chapter_id);
		// dump($image_id);
		
		$info=$model3->if_Join_Chapter($user_id,$image_id,$chapter_id); //判断是否已经加入此章节

		if($info){    //已经加入找到对应容器进入即可，
			$container_id=$model3->find_ContainerId_By_ImageId($user_id,$image_id,$chapter_id);
			$docker=new \Home\Controller\Entity\DockerApi();

			$docker->startContainerById($container_id);
			$ip_num=$model3->find_Ip_By_Chapter($user_id,$image_id,$chapter_id);

			$NoVNC=A('NoVNC');
			$NoVNC->showNoVNC($ip_num);
			exit();
		}else{       //没有则加入此章节，并创建容器

			$info=$this->runContainerById($image_id);

			$data=array('Container_id'=>$info[0],
						'student_id'=>$user_id,
						'ip'=>$info[1],
						'Image_id'=>$image_id,
						'to_chapter'=>$chapter_id,
						'ip_num'=>$info[2]);


			$model3->add_Container($data); //学生容器id 加入 docker_container
			$ip_num=$info[2];
			// dump($image_id);
			// dump($info);
			// dump('ipnum'.$ip_num);
			// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
			$NoVNC=A('NoVNC');
			$NoVNC->showNoVNC($ip_num);
			exit();
		}

	}

	public function runContainerById($image_id){
		
		$docker=new \Home\Controller\Entity\DockerApi();
		$ips=$docker->getNewIp();
		// dump($ips);
		$ip=$ips['ip'];
		
		$container_id=$docker->runContainerByIdIp($image_id,$ip);    //具体docker中 run -it 

		$info[]=$container_id;
		$info[]=$ip;
		$info[]=$ips['ip_num'];
		return $info;
	}
	

	/*  纯PHP上传文件
	public function uploadFile(){
		

		$student_id=session('user_id');

		$chapter_id=I('post.chapter_id');
		$postfix=strrchr($_FILES['file']['name'], '.');
		$uploadPath='E:/wamp/apache/library/Experiment/Public/Upload/';
		$new_name=$student_id.'_'.$chapter_id.$postfix;
		$newPath=$uploadPath.$new_name;
		$ROOT = $_SERVER['DOCUMENT_ROOT'];
		move_uploaded_file($_FILES['file']['tmp_name'],$newPath);
	}
		*/
		public function uploadFile(){
			$student_id=session('user_id');	
			$chapter_id=I('post.chapter_id');
			$new_name=$student_id.'_';
			
			$model=new \Home\Model\View_coursetochapterModel();
			$info=$model->find_Chapter_Course($chapter_id);	

			$chapter_name=$info['name'];
			$course_name=$info['cname'];
			$savepath=$course_name.'/'.$chapter_name."/";

			$uploadFile=new \Home\Controller\Entity\UploadFile();
			$res=$uploadFile->uploadReport($savepath,$new_name);
			
			if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		    }else{
		    	$model2=new \Home\Model\Chapter_reportModel();
		    	$info=array('upload_path'=>$res['status']['savepath'].$res['status']['savename'],
		    				'chapter_id'=>$chapter_id,
		    				'student_id'=>$student_id,
		    		);
		    	try{
		    		$status=$model2->add_Info($info);
		    	}catch(\Exception $e){
		    		echo "<script>  alert('请勿重复上传'); </script>";
		    		echo "<script>  javascript :history.back(-1); </script> ";
		    		exit();
		    	}
		    	if($status){
		    			$this->success('上传成功');
			    	}else{
			    		$this->error('上传失败');
			    	}
		    	
		    }

		}

		public function downloadMyReport($reportId){

			$model=new \Home\Model\Chapter_reportModel();
			$path=$model->find_RepoartPath_ById($reportId);

			$arr=explode('/', $path);
			$showname=array_pop($arr);

			if(empty($path)){
				$this->error('下载失误');
				
			}
			 $filePath="./Source/Uploads/".$path;

			 try{
			 	$Http = new \Org\Net\Http();
		      	$Http::download($filePath, $showname);	
			 }catch(\Exception $e){
			 	echo "<script> alert('下载出错');  </script>";
			 	echo "<script>  javascript :history.back(-1); </script> ";
		    		exit();
			 }
		}

		public function ceshi(){
			$path="MySql/MySql第一章节/1_.docx";
			// $name=strrchr($path,'/');
			// dump($name);
			
			dump(array_pop($arr) );
		}


}