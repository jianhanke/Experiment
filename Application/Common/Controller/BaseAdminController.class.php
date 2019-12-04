<?php 

namespace Common\Controller;
use Think\Controller;


class BaseAdminController extends Controller{


	public function _initialize(){   //每次调用方法时候，都会调用此方法

		if(empty(session('admin_name'))){
			$url=U('Login/login');
			echo "<script> top.location.href='$url' </script> ";
			exit();		
		}


	}

}