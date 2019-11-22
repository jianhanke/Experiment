<?php 

namespace Teacher\Controller;
use Think\Controller;

class TeacherController extends MyController{

	public function showInfo($teacherId){

		$model=D('Teacher');
		$info=$model->find_Info_ById($teacherId);
		$this->assign('datas',$info);
		$this->display();
	}

	public function showMyClass(){
		$teacher_id=Session('teacher_id');

		// $model=new \Teacher\Model\Course_infoModel();
		// $ids=$model->show_ClassId_ById($teacher_id);

		$model2=new \Teacher\Model\View_classwithdepartmentModel();
		$datas=$model2->show_MyClass_Info($teacher_id);
		$this->assign('datas',$datas);
		$this->display();

	}

	public function showStudentById($classId){

		$model=D('Student');
		$datas=$model->show_Student_ById($classId);
		dump($datas[0]);
		$this->assign("datas",$datas);
		$this->display();
	}



	public function modifyInfo($teacherId){


		if(IS_POST){
			$post=I('post.');
			$model=D('Teacher');
			$info=$model->modify_Info($post);

			if($info !== false){
				$this->redirect("Teacher/showInfo",array('teacherId'=>$post['Tid']));
			}else{
				$this->error('修改失败');
			}
		}else{
			$model=D('Teacher');
			$info=$model->find_Info_ById($teacherId);
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function modifyPwd(){

		if(IS_POST){
			$teacherId=Session('teacher_id');
			$post=I('post.');
			dump($post);

			if($post['newPwd1']==$post['newPwd2']){
				$info['Tid']=$teacherId;
				$info['Tpwd']=$post['newPwd1'];
				$model=D('Teacher');
				$status=$model->modify_Info($info);	

				if($status !== false){
					$this->success('修改成功');
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