<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class IndexController extends BaseAdminController{

	public function index(){
		
		$admin_name=session('admin_name');
		$this->assign('admin_name',$admin_name);
		$this->display();
	}

}