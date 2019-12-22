<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class CourseController extends BaseTeacherController{

	public function editCourseById($id){

		$experimentInfo=D('Experiment')->getAllDataIdName();	
		$info=D('Chapter')->find_Chapter_By_Course_Id($id);
		$this->assign('experimentInfo',$experimentInfo);
		$this->assign('id',$id);
		$this->assign('datas',$info);
		$this->display();
	}

	public function courseRelateClass(){

		if(IS_POST){

			if(empty(I('post.class_id'))){
				echo "<script>  alert('填写不完整')  </script>";
				echo "<script>  javascript :history.back(-1); </script> ";
				exit();
			}
			
			$post=I('post.');
			$teacherId=Session('teacher_id');

			$Model = M();
			$Model->startTrans();
			
			$status=D('ClassTeacher')->add_Info(array('class_id'=>$post['class_id'],'teacher_id'=>$teacherId));


		   $status2=D('CourseClass')->add_Info(array('course_id'=>$post['course_id'],'class_id'=>$post['class_id']));
			
			if($status && $status2){
				$this->success('修改成功',U('Teacher/showMyCourse'));
				$Model->commit();
			}else{
				$Model->rollback();
				$this->error('添加失败');
			}
		}else{
			$courseId=I('courseId');
			$departments=D('Department')->show_AllDepartment_Info();
			$datas=D('Course')->show_Course_ById($courseId);

			$this->assign('datas',$datas);
			$this->assign('departments',$departments);
			$this->display();
		}
	}

	// public function get_district($departmentId,$grade){
	

	public function otherCourse(){
		
		$teacherId=Session('teacher_id');
		$myCourseIds=D('CourseTeacher')->find_My_CourseId($teacherId);
		
		$datas=D('Course')->none_myCourse($myCourseIds);	
		
		$this->assign('datas',$datas);
		$this->display();
	}

	

	public function showCourseById($courseId){
		
		$info=D('Chapter')->find_Chapter_By_Course_Id($courseId);
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
			$res=\MyUtils\FileUtils\UploadFile::addCoursePicture();
			if(!$res['status']) {                // 上传错误提示错误信息
		        $this->error($res['upload']->getError());
			}
		}catch(\Exception $e){
			$this->error('添加失败,图片上传错误');
		}
			$post['img']=$res['status']['savename'];
			
			$id=D('Course')->add_Info($post);

			$courseAndTeacher=array('course_id'=>$id,'teacher_id'=>Session('teacher_id'));

			$status=D('CourseTeacher')->add_Info($courseAndTeacher);

			if($status){
				$this->success('添加成功',U('Teacher/showMyCourse'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$info=D('Teacher')->show_Teacher();
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function courseToClassProgress($courseId,$classId){

		
		// $model=D('Student');
		// $stuDatas=$model->find_Student_WithReport($classId);
		$chapterInfo=D('Chapter')->find_Chapter_Info($courseId);
		

		$classInfo=D('ViewClassDepartment','Logic')->show_ClassInfo_ById($classId);
		$courseInfo=D('Course')->find_Course_ById($courseId);
		

		$this->assign('chapterInfo',$chapterInfo);
		$this->assign('courseInfo',$courseInfo);
		$this->assign('classInfo',$classInfo);
		// $this->assign('datas',$stuDatas);
		$this->display();
	}








}