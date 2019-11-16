<?php 

namespace Teacher\Controller;
use Think\Controller;

class TeacherController extends Controller{

	public function showInfo($teacherId){

		$model=D('Teacher');
		$info=$model->find_Info_ById($teacherId);
		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyInfo($teacherId){

		$model=D('Teacher');
		$info=$model->find_Info_ById($teacherId);
		$this->assign('datas',$info);
		
		$this->display();

	}

}