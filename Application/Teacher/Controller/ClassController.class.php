<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class ClassController extends BaseTeacherController{


	public function showMyClass(){

		$teacher_id=Session('teacher_id');

		$datas=D('ViewCourseTeacherClass','Logic')->show_MyClass_Info($teacher_id);
		
		$this->assign('datas',$datas);
		$this->display();
	}

	public function showChapterToClassStudent($chapterId,$classId){

		
		$datas=D('StudentChapter')->getDataByChapterId($chapterId,$classId);
		$courseInfo=D('Course')->find_Course_ByChapterId($chapterId);
		
		$classInfo=D('ViewClassDepartment','Logic')->show_ClassInfo_ById($classId);
		$this->assign('classInfo',$classInfo);
		$this->assign('courseInfo',$courseInfo);
		$this->assign('datas',$datas);
		$this->display();

	}

	public function showChapterToClassReport($chapterId,$classId){

		
		$data=D('Chapter')->find_Student_WithReport($chapterId,$classId);

		$courseInfo=D('Course')->find_Course_ByChapterId($chapterId);
		
		$classInfo=D('ViewClassDepartment','Logic')->show_ClassInfo_ById($classId);
		// dump($classInfo);
		
		$this->assign('classInfo',$classInfo);
		$this->assign('courseInfo',$courseInfo);
		$this->assign('datas',$data);
		$this->display();
	}

	public function showClassToStudent($classId){
		
		$datas=D('Student')->show_Student_ById($classId);
		$this->assign('classId',$classId);
		$this->assign("datas",$datas);
		$this->display();
	}

	public function findStudentByLike(){  
		
		
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=D('Student')->find_Student_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->display('Class/showClassToStudent');
	}

	public function getCurrentClass($departmentId,$grade){

		$condition=array('department_id'=>$departmentId,'grade'=>$grade,'teacher_id'=>Session('teacher_id'));

		
		$class=D('ViewClassDepartment','Logic')->show_NoneSlect_class($condition);
		
		$data=array('status'=>0,'district'=>$class);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	public function getCurrentGrade($id){

		$grades=D('ViewClassDepartment','Logic')->show_AllGrade_ById($id);

		$data=array('status'=>0,'city'=>$grades);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	

}