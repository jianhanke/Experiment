<?php 

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function login(){

		if(IS_POST){
			$post=I('post.');
			$model=D('Admin');
			$info=$model->check_Login($post);
			if(!empty($info)){
				// session('admin_id',$info['aid']);
	            session('admin_name',$info['aname']);
				$this->success('登录成功',U('Index/index'));
			}else{
				$this->error('密码错误');
			}
		}else{
			$this->display();
		}
	}
	public function logout(){

		session(null);
		$this->success('退出成功',U('Admin/login/login'));
	

	}


}