<?php 

namespace Teacher\Controller;
use Think\Controller;

class StudentController extends MyController{

	public function courseProgress($courseId,$classId){


		$model=D('Student');
		$datas=$model->show_Student_ById($classId);

		$model2=new \Teacher\Model\View_classwithdepartmentModel();
		$classInfo=$model2->show_ClassInfo_ById($classId);

		$model3=D('Course');
		$courseInfo=$model3->find_Course_ById($courseId);

		$this->assign('courseInfo',$courseInfo);
		$this->assign('classInfo',$classInfo);
		$this->assign('datas',$datas);
		$this->display();


	}

}