<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;
use \MyUtils\FileController\Person;

class IndexController extends BaseTeacherController{

	public function index(){
		
		$teacher_name=session('teacher_name');
		$teacher_id=session('teacher_id');
		$this->assign('teacher_id',$teacher_id);
		$this->assign('teacher_name',$teacher_name);
		$this->display();
	}

	public function home(){
		$this->display();
	}

}