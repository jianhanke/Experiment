<?php 

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function login(){
    	$this->display('Login/lognew');
    }

  	public function checkLogin(){
        $model=D('Student');
        $info=$model->check_Login();        
       if(isset($info)){
            $this->success('登录成功', U('Home/Index/index'));
            session('user_id',$info['sid']);
            session('user_name',$info['sname']);
        }else{
            $this->error('账号或密码错误',U('Home/Login/login'));
        }
    }

    public function logout(){
        session('user_id',null);
        session('user_name',null);
        $this->success('退出成功',U('Login/login'));

    }

}