<?php 

namespace Teacher\Controller;
use Think\Controller;


class MyController extends Controller{


	public function _initialize(){   //每次调用方法时候，都会调用此方法

		if(empty(session('teacher_name'))){
			$url=U('Login/login');
			echo "<script> top.location.href='$url' </script> ";
			exit();		
		}


	}

}