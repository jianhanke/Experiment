<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class TeacherController extends BaseTeacherController{

	public function showInfo($teacherId){

		
		$info=D('Teacher')->find_Info_ById($teacherId);
		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyInfo($teacherId){


		if(IS_POST){
			$post=I('post.');
			$info=D('Teacher')->modify_Info($post);

			if($info !== false){
				$this->redirect("Teacher/showInfo",array('teacherId'=>$post['Tid']));
			}else{
				$this->error('修改失败');
			}
		}else{
			$info=D('Teacher')->find_Info_ById($teacherId);
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function modifyPwd(){

		if(IS_POST){
			$teacherId=Session('teacher_id');
			$post=I('post.');

			if($post['newPwd1']==$post['newPwd2']){
				$info['Tid']=$teacherId;
				$info['Tpwd']=$post['newPwd1'];
				$status=D('Teacher')->modify_Info($info);	

				if($status !== false){
					echo "<script> alert('修改成功');  </script>";
				}else{
					$this->error('修改失败');
				}

			}else{
				echo "<script> alert('密码不一致,请重新输入');  </script> ";
			}

		}
			$this->display();	
		
		
	}


}