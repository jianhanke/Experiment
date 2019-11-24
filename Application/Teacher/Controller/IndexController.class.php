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

	// public function test01(){
	// 	$arr=array('软件学院','计算机学院');
	// 	dump($arr);
		
	// 	$this->assign('datas',json_encode($arr));
	// 	$this->display();
	// }




}