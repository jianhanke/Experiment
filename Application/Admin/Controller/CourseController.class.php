<?php 
namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class CourseController extends BaseAdminController{

	public function showCourse(){
		
		$info=D('Course')->show_All_Course();
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
			
			$id=D('Course')->add_Info($post);

			$courseInfo=array('course_id'=>$id,'teacher_id'=>$post['to_teacher_id']);
				
			
			if($id){
				$this->success('添加成功',U('Course/showCourse'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$info=D('Teacher')->show_Teacher();
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function deleteCourseById($id){
		
		D('Course')->delete_Course_By_Id($id);
		$this->redirect('Course/showCourse');
	}
	public function showChapterImage(){
		
		$model=D('ChapterImage');
		$info=$model->show_Image();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
	}
	public function editCourseById($id){

		$info=D('Chapter')->find_Chapter_By_Course_Id($id);
		$this->assign('id',$id);
		$this->assign('datas',$info);
		$this->display();
	}
	public function addChapter($to_course){
		
		if(IS_POST){
			$post=I('post.');
			
			$chapter_id=D('Chapter')->add_Info($post);

			$chapterInfo=array('Cid'=>$chapter_id,'to_imageId'=>$post['to_image'],'to_imageName'=>Null);
			D('ChapterImage')->add_ChapterInfo($chapterInfo);
			
			$this->uploadVideo($chapter_id);
			$this->uploadWord($chapter_id);
			
			$this->success('添加成功',U("Course/editCourseById",array('id'=>$to_course)));
		}else{
			// $to_course=I('get.to_course');
			
			$courseName=D('Course')->find_Course_Name($to_course);
			$data=D('MakeImage')->show_All_Data();

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
		$info=D('ViewCoursetochapter','Logic')->find_Chapter_Course($chapter_id);
		$savePath=$info['cname'].'/'.$info['name']."/";
		try{
			$res=\MyUtils\FileUtils\UploadFile::uploadChapterVideo($savePath,$info['id']);
		}catch(\Exception $e){
			$this->error('上传失败,文件错误');
		}
		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{// 上传成功 获取上传文件信息
		        
		        $status=D('Chapter')->editDataVideo($res['status']['savepath'].$res['status']['savename'],$chapter_id);
		        if($status){
		        	$this->success('上传成功');	
		        }else{
		        	$this->error('上传失败');
		        }
		} 
	}

	public function uploadWord($chapter_id){
		
		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}
		
		$info=D('ViewCoursetochapter','Logic')->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$uploadFile=new \MyUtils\FileUtils\UploadFile();
		$savePath=$course_name.'/'.$chapter_name."/";
		try{
				$res=$uploadFile->uploadChapterWord($savePath,$new_name);
		 }catch(\Exception $e){
	         	$this->error('上传文件出现错误');
	     }
		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{// 上传成功 获取上传文件信息
		         $wordPath=C('SOURCE_CHAPTER_PATH').$res['status']['savepath'].$res['status']['savename'];
		         $htmPath=C('SOURCE_CHAPTER_PATH').$res['status']['savepath'].$new_name.'.htm';
		         try{
		         	$uploadFile->saveWordToHtm($wordPath,$htmPath);
		         }catch(\Exception $e){
		         	$this->error('转换格式出现错误');
		         }
		         $status=D('Chapter')->editDataWord($res['status']['savepath'].$new_name.'.htm',$chapter_id);
		         if($status){
					$this->success('上传成功');
				}else{
					$this->error('上传失败');
				}
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