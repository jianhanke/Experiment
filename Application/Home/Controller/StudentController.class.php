<?php


namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class StudentController extends BaseHomeController{

	public function showStudentInfoById(){
		$user_id=session('user_id');
		
		$info=D('Student')->show_Student_Info_By_Id($user_id);
		$this->assign('datas',$info);
		$this->display('showStudentInfo');
	}
}