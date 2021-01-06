<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class ChapterController extends BaseTeacherController{

	public function ChapterRelateImage(){
		if(IS_POST){
			$post=I('post.');
		
			$data=D('ExperimentImage')->getAllImageIdById($post['to_imageId']);
			
			$chapterImageInfo=array();
			for($i=0;$i<count($data);$i++){
				$chapterImageInfo[$i]['to_imageId']=$data[$i];
				$chapterImageInfo[$i]['Cid']=$post['chapter_id'];
			}
			D('ChapterImage')->delData(array('Cid'=>$post['chapter_id']));
			$status=D('ChapterImage')->addData($chapterImageInfo);
			if($status){
				echo "<script>  alert('添加成功') </script>";
			}else{
				echo "<script>  alert('添加失败') </script>";
			}

			$experimentInfo=D('Experiment')->getAllDataIdName();	
			$info=D('Chapter')->find_Chapter_By_Course_Id($post['courseId']);
			
			$this->assign('experimentInfo',$experimentInfo);
			$this->assign('id',$post['courseId']);
			$this->assign('datas',$info);
			$this->display('Course/editCourseById',array('id'=>$post['courseId']));
		}

	}

	public function addChapter($to_course){
		
		if(IS_POST){
			$post=I('post.');
			
			$chapter_id=D('Chapter')->add_Info($post);

			$data=D('ExperimentImage')->getAllImageIdById($post['to_imageId']);
			
			for($i=0;$i<count($data);$i++){
				$chapterImageInfo[$i]['to_imageId']=$data[$i];
				$chapterImageInfo[$i]['Cid']=$chapter_id;
			}
			$status=D('ChapterImage')->addData($chapterImageInfo);

			$status1=uploadChapterToVideo($chapter_id);
			$status2=uploadChapterToVideo($chapter_id);
			if($status1 && $status2){
				$this->success('添加成功',U("Course/editCourseById",array('id'=>$to_course)));
			}else{
				$this->error('添加失败');
			}
		
		}else{
			$to_course=I('get.to_course');
			$courseName=D('Course')->find_Course_Name($to_course);
			$experimentInfo=D('Experiment')->getAllDataIdName();
			$this->assign('datas',$experimentInfo);
			$this->assign('id',$to_course);
			$this->assign('courseName',$courseName);
			$this->display();	
		}
	}

	public function deleteChapterById($chapterId){
		$status=D('Chapter')->delChapterById($chapterId);
		$status2=D('ChapterImage')->delChapterImage($chapterId);
		// echo "<script> alert('删除成功'); </script>";
		if($status){
			$this->success('删除成功',U('Course/editCourseById',array('id'=>I('get.courseId'))));
		}else{
			$this->error('删除失败');
		}
	}

	public function uploadVideo($chapter_id){


		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}		
		try{
			$status=uploadChapterToVideo($chapter_id);
			
			if($status){
				$this->success('上传成功');
			}else{
				$this->error('上传失败');
			}	
		}catch(\Exception $e){
	         	$this->error('上传文件出现错误');
	    } 

	}

	public function uploadWord($chapter_id){

		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}
		try{
			$status=uploadChapterToWord($chapter_id);
			if($status){
				$this->success('上传成功');
			}else{
				$this->error('上传失败');
			}	
		}catch(\Exception $e){
	         	$this->error('上传文件出现错误');
	    }
	}

	public function downloadReportById($reportId){

			$path=D('ChapterReport')->find_RepoartPath_ById($reportId);
			$showname=array_pop(explode('/', $path));

			if(empty($path)){
				$this->error('下载失误');
			}
			 $filePath=C("SOURCE_UPLOAD_PATH").$path;
			 try{
		      	\Org\Net\Http::download($filePath, $showname);	
			 }catch(\Exception $e){
			 	echo "<script> alert('下载出错');  </script>";
			 	echo "<script>  javascript :history.back(-1); </script> ";
		    	exit();
			 }
	}

	


}