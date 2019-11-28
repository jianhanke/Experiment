<?php 

namespace Teacher\Controller;
use Think\Controller;

class StudentController extends MyController{

	public function courseProgress($courseId,){

		$model=new \Teacher\Model\Course_classModel();
		dump($courseId);
		$datas=$model->show_ClassId_ByCourseId(array('course_id'=>$courseId));
		echo $model->_sql();
		dump($datas);
	}

	public function courseProgress($classId){
		$model=D('Student');
		$datas=$model->show_Student_ById($classId);
		$this->assign('classId',$classId);
		$this->assign("datas",$datas);
		$this->display();
	}

}