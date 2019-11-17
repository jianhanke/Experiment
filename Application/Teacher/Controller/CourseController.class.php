<?php 

namespace Teacher\Controller;
use Think\Controller;

class CourseController extends MyController{

	public function showMyCourse(){

		$teacherId=Session('teacher_id');

		$model1=new \Teacher\Model\Course_infoModel();
		$model2=D('Course');
			
		$info=$model1->find_My_CourseId($teacherId);
		$datas=$model2->show_MyCourse_Info($info);

		$this->assign('datas',$datas);
		$this->display();
	}




}