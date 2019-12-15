<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class StudentController extends BaseAdminController{

	public function showStudent(){
		$model=D('Student');
		$info=$model->show_Student();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyStudentById(){
		
		if(IS_POST){
			$info=I('post.');
			
			$is_success=D('Student')->modify_Student_By_Id($info);
			if($info){
				$this->success('修改成功',U('Student/showStudent'));
			}else{
				$this->error('修改错误');
			}
		}else{
			$user_id=I('get.user_id');
			$info=D('Student')->find_Student_By_Id($user_id);
			$this->assign('datas',$info);
			$this->display('modifyStudent');
		}
	}
	public function findStudentByLike(){   
		$model=D('Student');
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=$model->find_Student_By_Like($search,$keywords);
		$count=$model->count_Student_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('showStudent');
	}

	public function findStudentWithContainer(){

		$model=D('ViewContainerStuExperiment','Logic');
		$student_id=I('get.student_id');

		$info=$model->find_Student_With_Container($student_id);
		$count=$model->count_Student_With_Container($student_id);
		$student=D('Student')->find_Student_By_Id($student_id);

		$this->assign('student',$student);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display();
	}

	public function addStudent(){

		if(IS_POST){
			$post=I('post.');
			$post['Spwd']=md5($post['Spwd']);

			$info=D('Student')->add_Student($post);
			if($info){
				$this->success('添加成功',('Student/showStudent'));
			}else{
				$this->error("添加失败,重新输入");
			}

		}else{
				$this->display();	
		}		
	}

	public function deleteStudent($student_id){
		
		$info=D('Student')->delete_Student_By_Id($student_id);
		$this->redirect('Student/showStudent');
	}



}