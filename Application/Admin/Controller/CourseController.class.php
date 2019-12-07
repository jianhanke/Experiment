<?php 
namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class CourseController extends BaseAdminController{

	public function showCourse(){
		$model=D('Course');
		$info=$model->show_All_Course();
		$this->assign('datas',$info);
		$this->display();
	}

	public function addCourse(){
		if(IS_POST){
			$post=I('post.');
			if( empty($post['cname']) or empty($post['introduce']) or empty($_FILES['img']['tmp_name']) ){
				$this->error('填写不完整',U('Course/addCourse'),2);
			}
		try{
			$uploadFile=new \MyUtils\FileUtils\UploadFile();
			$res=$uploadFile->addCoursePicture();
			if(!$res['status']) {                // 上传错误提示错误信息
		        $this->error($res['upload']->getError());
			}
		}catch(\Exception $e){
			$this->error('添加失败,图片上传错误');
		}
			$post['img']=$res['status']['savename'];
			$model=D('Course');
			$id=$model->add_Info($post);

			$courseInfo=array('course_id'=>$id,'teacher_id'=>$post['to_teacher_id']);
				
			
			if($id){
				$this->success('添加成功',U('Course/showCourse'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$model=D('Teacher');
			$info=$model->show_Teacher();
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function deleteCourseById($id){
		$model=D('Course');
		$model->delete_Course_By_Id($id);
		$this->redirect('Course/showCourse');
	}
	public function showChapterImage(){
		$model=new \Admin\Model\Chapter_imageModel();
		$info=$model->show_Image();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
	}
	public function editCourseById(){
		$courseId=I('get.id');
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($courseId);
		$this->assign('id',$courseId);
		$this->assign('datas',$info);
		$this->display();
	}
	public function addChapter($to_course){
		
		if(IS_POST){
			$post=I('post.');
			$model=D('Chapter');
			$chapter_id=$model->add_Info($post);

			$model2=new \Teacher\Model\Chapter_imageModel();
			$chapterInfo=array('Cid'=>$chapter_id,'to_imageId'=>$post['to_image'],'to_imageName'=>Null);
			$model2->add_ChapterInfo($chapterInfo);

			$this->uploadVideo($chapter_id);
			$this->uploadWord($chapter_id);
			
			$this->success('添加成功',U("Course/editCourseById",array('id'=>$to_course)));
		}else{
			// $to_course=I('get.to_course');
			$model=D('Course');
			$courseName=$model->find_Course_Name($to_course);
			
			$model2=new \Admin\Model\Make_imageModel();
			$data=$model2->show_All_Data();
			$this->assign('datas',$data);
			$this->assign('id',$to_course);
			$this->assign('courseName',$courseName);
			$this->display();	
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

		$uploadFile=new \MyUtils\FileUtils\UploadFile();
		$res=$uploadFile->uploadChapterVideo($course_name,$chapter_name,$new_name);


		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{// 上传成功 获取上传文件信息
		        $model=D('Chapter');
		        $model->add_Video_By_Id($res['status']['savepath'].$res['status']['savename'],$chapter_id);
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

		$uploadFile=new \MyUtils\FileUtils\UploadFile();
		$res=$uploadFile->uploadChapterWord($course_name,$chapter_name,$new_name);

		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{// 上传成功 获取上传文件信息
		         $host=new \MyUtils\HostUtils\Host()
				 $courseRealPath=$host-> getRootRealPath().'/Source/Chapter/';

		         $wordPath=$courseRealPath.$res['status']['savepath'].$res['status']['savename'];
		         $htmPath=$courseRealPath.$res['status']['savepath'].$new_name.'.htm';
		         $uploadFile->saveWordToHtm($wordPath,$htmPath);
		         
		         $model2=D('Chapter');
		         $model2->add_WordPath_ById($res['status']['savepath'].$new_name.'.htm',$chapter_id);
				$this->success('上传成功');
		} 
	}

	public function deleteChapterImageById($id){

		$model=new \Admin\Model\Chapter_imageModel();
		$status=$model->delete_ChapterImage_ById($id);
		if($status){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	
}