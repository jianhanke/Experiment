<?php 

namespace Teacher\Controller;
use Think\Controller;

class IndexController extends MyController{

	public function index(){
		
		$teacher_name=session('teacher_name');
		$teacher_id=session('teacher_id');
		$this->assign('teacher_id',$teacher_id);
		$this->assign('teacher_name',$teacher_name);
		$this->display();
	}

	public function test01(){
		
		
		
		// $model=new \Teacher\Logic\ViewCourseTeacherClassLogic();
		// $model->test01();


	}

}