<?php 

namespace Teacher\Controller;
use Think\Controller;

class CourseController extends MyController{

	public function showMyCourse(){

		$teacherId=Session('teacher_id');

		$model1=new \Teacher\Model\Course_teacherModel();
		$model2=D('Course');
			
		$info=$model1->find_My_CourseId($teacherId);
		$datas=$model2->show_MyCourse_Info($info);
		if(empty($datas)){
			echo "<script> alert('课程为空');   </script>";
		}

		$this->assign('datas',$datas);
		$this->display();
	}

	public function editCourseById($id){
		
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($id);
		$this->assign('id',$id);
		$this->assign('datas',$info);
		$this->display();

	}

	public function deleteCourseById($id){

		$teacherId=Session('teacher_id');

		$model=new \Teacher\Model\Course_teacherModel();
		$model->delete_Course_By_Id($id,$teacherId);
		$this->redirect('Course/showMyCourse');
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
			
			$model2=new \Teacher\Model\Make_imageModel();
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

		$uploadFile=new \Admin\Controller\Entity\UploadFile();
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
		         
		         $model2=D('Chapter');
		         $model2->add_WordPath_ById($res['status']['savepath'].$new_name.'.htm',$chapter_id);
				$this->success('上传成功');
		} 
	}

	public function courseRelateClass(){

		if(IS_POST){
			// $info=array('Cid'=>$courseId,'Tid'=>Session('teacher_id'),'Tclass'=>)
			$post=I('post.');
			$post['teacher_id']=Session('teacher_id');
			$model=new \Teacher\Model\Course_classModel();

			$status=$model->add_Info($post);
			if($status){
				echo " <script> alert('关联成功');  </script>";
				$courseId=$post['Cid'];
				$model=D('Department');
				$departments=$model->show_AllDepartment_Info();
				$model2=D('Course');
				$datas=$model2->show_Course_ById($courseId);
				$this->assign('datas',$datas);
				$this->assign('departments',$departments);
				$this->display();

			}else if($status==0){
				$this->error('请勿重复关联',U('Course/courseRelateClass',array('courseId'=>$post['Cid'])));
			}else{
				$this->error('关联失败');
			}
		}else{
			$courseId=I('get.courseId');
			$model=D('Department');
			$departments=$model->show_AllDepartment_Info();
			$model2=D('Course');
			$datas=$model2->show_Course_ById($courseId);
			$this->assign('datas',$datas);
			$this->assign('departments',$departments);
			$this->display();
		}

	}


	public function getCurrentGrade($id){
		
		$model=new \Teacher\Model\View_classwithdepartmentModel();
		$grades=$model->show_AllGrade_ById($id);

		$data=array('status'=>0,'city'=>$grades);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	// public function get_district($departmentId,$grade){
	public function getCurrentClass($departmentId,$grade){
		$condition=array('department_id'=>$departmentId,'grade'=>$grade);
		// $condition=array('department_id'=>1,'grade'=>17);

		$model=new \Teacher\Model\View_classwithdepartmentModel();
		$class=$model->show_AllClass_ById($condition);
		
		$data=array('status'=>0,'district'=>$class);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	public function otherCourse(){
		
		$teacherId=Session('teacher_id');
		$model2=new \Teacher\Model\Course_teacherModel();
		$myCourseIds=$model2->find_My_CourseId($teacherId);
		
		$model=D('Course');
		$datas=$model->none_myCourse($myCourseIds);	
		
		$this->assign('datas',$datas);
		$this->display();
	}

	public function relateMyCourse($courseId){

		$teacherId=Session('teacher_id');
		$model=new \Teacher\Model\Course_teacherModel();
		$info=array('teacher_id'=>$teacherId,'course_id'=>$courseId);
		$status=$model->relate_To_MyCourse($info);
		if($status){
			$this->success('关联成功',U('Course/showMyCourse'));
		}else{
			$this->error('关联失败');
		}
	}

	public function showCourseById($courseId){
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($courseId);
		$this->assign('datas',$info);
		$this->display();
	}

	public function courseProgress($courseId){

		$model=new \Teacher\Model\Course_infoModel();
		$info=array('Cid'=>$courseId,'Tid'=>Session('teacher_id'));
		$status=$model->show_ClassId_ByCourseId($info);
		dump($status);
	}


}