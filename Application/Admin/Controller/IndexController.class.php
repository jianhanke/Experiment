<?php 

namespace Admin\Controller;
use Think\Controller;

class IndexController extends MyController{

	public function index(){
		
		$admin_name=session('admin_name');
		$this->assign('admin_name',$admin_name);
		$this->display();
	}

}