<?php 

namespace Admin\Controller;
use Think\Controller;

class TeacherController extends MyController{

	public function showTeacher(){

		$model=D('Teacher');
		$info=$model->show_Teacher();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();

	}

	public function modifyTeacherById(){
		$model=D('Teacher');
		if(IS_POST){
			$info=I('post.');
			dump($info);
			$is_success=$model->modify_Teacher_By_Id($info);
			if($info){
				$this->success('修改成功',U('Teacher/showTeacher'));
			}else{
				$this->error('修改错误');
			}
		}else{
			$teacher_id=I('get.teacher_id');
			$info=$model->find_Teacher_By_Id($teacher_id);
			$this->assign('datas',$info);
			$this->display('modifyTeacher');
		}
	}
	public function findTeacherByLike(){   
		$model=D('Teacher');
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=$model->find_Teacher_By_Like($search,$keywords);
		$count=$model->count_Teacher_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('showTeacher');
	}

	public function addTeacher(){

		if(IS_POST){
			$post=I('post.');
			$post['Spwd']=md5($post['Spwd']);
			$model=D('Teacher');

			$info=$model->add_Teacher($post);
			if($info){
				$this->success('添加成功',U('Teacher/showTeacher'));
			}else{
				$this->error("添加失败,重新输入");
			}

		}else{
				$this->display();	
		}
	}

	public function deleteTeacher($teacher_id){

		$model=D("Teacher");
		$info=$model->delete_Teacher_By_Id($teacher_id);
		$this->redirect('Teacher/showTeacher');
	}



}