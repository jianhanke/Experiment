<?php 

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function login(){
    	$this->display();
    }

  	 public function checkLogin(){
        $model=D('Student');
        $info=$model->check_Login();        
       if(isset($info)){
                session('user_id',$info['sid']);
                session('user_name',$info['sname']);
            $this->success('登录成功', U('Home/Index/index'));
        }else{
            $this->error('密码错误',U('Home/Login/login'));
        }
    }

   

   

}