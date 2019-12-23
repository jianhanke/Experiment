<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class CourseController extends BaseHomeController{


	public function showCourse(){
		
		$info=D('Course')->show_All_Course();
		$this->assign('datas',$info);
		$this->display();
	}
	
	public function showMyCourse(){

		$studentId=Session('user_id');
		$classId=D('Student')->find_MyClass_ById($studentId);
		if($classId){
			$datas=D('CourseClass')->find_MyCourse_ById($classId);	
		}else{
			echo "<script> alert('当前为空');  </script>";
		}
		$this->assign('datas',$datas);
		$this->display();
	}



	public  function showCourseById($id){

		
		$info=D('Chapter')->show_MyChapterInfo_ById($id,Session('user_id'));

		$this->assign('datas',$info);
		$this->display();
	}

	public function joinChapterById($chapter_id){
		$user_id=session('user_id');
		
		$image_id=D('ChapterImage')->find_Image_By_id($chapter_id);
		
		$isJoinInfo=D('StudentChapter')->getData($user_id,$chapter_id); //判断是否已经加入此章节
		if($isJoinInfo){              //已经加入找到对应容器进入即可，
			$containerInfo=D('ViewContainerStuChapter','Logic')->getData($user_id,$chapter_id);
			
			getControllerDockerWay()->startContainerById($containerInfo['container_id']);
			A('NoVNC')->showNoVNC($containerInfo['ip_num'],$chapter_id,$isJoinInfo['note']);
			exit();
		}else{                                  //没有则加入此章节，并创建容器
			$info=runContainerById($image_id);
			$data=array('Container_id'=>$info['container_id'],
						'ip'=>$info['ip'],
						'Image_id'=>$image_id,
						'ip_num'=>$info['ip_num']);
			$dcPrimaryKey=D('DockerContainer')->addData($data); //学生容器id 加入 docker_container
			$scPrimaryKey=D('StudentChapter')->addDataByOrder($user_id,$chapter_id);
			$status=D('StuChapterContainer')->addDataByOrder($scPrimaryKey,$dcPrimaryKey);

			A('NoVNC')->showNoVNC($info['ip_num'],$chapter_id);
			exit();
		}

	}

	public function saveNote(){
		$student_id=session('user_id');	
		$myNote=I('post.myNote');
		$chapterId=I('post.chapterId');
		dump(I('post.'));
		dump($student_id);
		$status=D('StudentChapter')->saveNoteById($student_id,$chapterId,$myNote);
		echo D('StudentChapter')->_sql();
		dump($status);
		
	}

	public function uploadFile(){
			$chapter_id=I('post.chapter_id');
			$new_name=$student_id.'_';
			
			$info=D('ViewCoursetochapter','Logic')->find_Chapter_Course($chapter_id);	

			$chapter_name=$info['name'];
			$course_name=$info['cname'];
			$savepath=$course_name.'/'.$chapter_name."/";

			
			$res=(new \MyUtils\FileUtils\UploadFile())->uploadReport($savepath,$new_name);
			
			if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		    }else{
		    	
		    	$info=array('upload_path'=>$res['status']['savepath'].$res['status']['savename'],
		    				'chapter_id'=>$chapter_id,
		    				'student_id'=>$student_id,
		    		);
		    	try{
		    		$status=D('ChapterReport')->add_Info($info);
		    	}catch(\Exception $e){
		    		echo "<script>  alert('请勿重复上传'); </script>";
		    		echo "<script>  javascript :history.back(0); </script> ";
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

			
			$path=D('ChapterReport')->find_RepoartPath_ById($reportId);
			$showname=array_pop(explode('/', $path));

			if(empty($path)){
				$this->error('下载失误');
			}
			 $filePath=C("SOURCE_UPLOAD_PATH")."$path";
			 try{
		      	\Org\Net\Http::download($filePath, $showname);	
			 }catch(\Exception $e){
			 	echo "<script> alert('下载出错');  </script>";
			 	echo "<script>  javascript :history.back(-1); </script> ";
		    	exit();
			 }
		}


}