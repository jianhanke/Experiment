<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class IndexController extends BaseHomeController{

	public function index(){
		$user_id=session('user_id');
		$user_name=session('user_name');
		$this->assign('user_id',$user_id);
		$this->assign('user_name',$user_name);
		$this->display();
	}

	public function test01(){
		$config =   M('WebConfig')->getField('name,value');
		C($config);
		dump($config);
	}

	public function test02(){
		dump(C('Api_Or_Sdk'));
	}


}