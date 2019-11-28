<?php 

namespace Teacher\Controller;
use Think\Controller;

class StudentController extends MyController{

	public function courseProgress($courseId,$classId){

		dump($classId);
		$model=new \Teacher\Model\Course_classModel();
		dump($courseId);
		$datas=$model->show_ClassId_ByCourseId(array('course_id'=>$courseId));

	}

}