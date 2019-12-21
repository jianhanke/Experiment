<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

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

	public function test01(){
		// $datas['_logic']='OR';
		$status=$status=D('ClassTeacher')->where($datas)->delete();
		dump($status);
	}
}