<?php 

namespace Teacher\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function login(){
		if(IS_POST){

			$post=I('post.');
			$info=D('Teacher')->check_Login($post);
			if(!empty($info)){
				session('teacher_id',$info['tid']);
	            session('teacher_name',$info['tname']);
				
				$this->redirect('Index/index');
			}else{
				$this->error('密码错误');
			}
		}else{
			$this->display();
		}
	}
	public function logout(){
		session('teacher_id',null);
		$this->success('退出成功',U('login/login'));
	

	}


}