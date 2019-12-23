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
	
		$model=new \Admin\Model\View_coursetochapterModel();
		$info=$model->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$uploadFile=new \Admin\Controller\Entity\UploadFile();
		$res=$uploadFile->uploadChapterVideo($course_name,$chapter_name,$new_name);


		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{   // 上传成功 获取上传文件信息
		        D('Chapter')->add_Video_By_Id($res['status']['savepath'].$res['status']['savename'],$chapter_id);
				$this->success('上传成功');
		} 
	}

	public function uploadWord($chapter_id){

		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}
		
		$model=new \Admin\Model\View_coursetochapterModel();
		$info=$model->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$uploadFile=new \Admin\Controller\Entity\UploadFile();
		$res=$uploadFile->uploadChapterWord($course_name,$chapter_name,$new_name);

		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{// 上传成功 获取上传文件信息
		         $host=new \Admin\Controller\Entity\Host();
				 $courseRealPath=$host-> getRootRealPath().'/Source/Chapter/';

		         $wordPath=$courseRealPath.$res['status']['savepath'].$res['status']['savename'];
		         $htmPath=$courseRealPath.$res['status']['savepath'].$new_name.'.htm';
		         $uploadFile->saveWordToHtm($wordPath,$htmPath);
		         
		         D('Chapter')->add_WordPath_ById($res['status']['savepath'].$new_name.'.htm',$chapter_id);
				$this->success('上传成功');
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