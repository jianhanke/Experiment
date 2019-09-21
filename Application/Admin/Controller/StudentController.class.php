<?php 

namespace Admin\Controller;
use Think\Controller;

class StudentController extends MyController{

	public function showStudent(){
		$model=D('Student');
		$info=$model->show_Student();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyStudentById(){
		$model=D('Student');
		if(IS_POST){
			$info=I('post.');
			
			$is_success=$model->modify_Student_By_Id($info);
			if($info){
				$this->success('修改成功');
			}else{
				$this->error('修改错误');
			}
		}else{
			$user_id=I('get.user_id');
			$info=$model->find_Student_By_Id($user_id);
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
		$model=new \Admin\Model\View_containerwithstuandexperModel();
		$model2=D('Student');

		$student_id=I('get.student_id');

		$info=$model->find_Student_With_Container($student_id);
		$count=$model->count_Student_With_Container($student_id);
		$student=$model2->find_Student_By_Id($student_id);

		$this->assign('student',$student);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display();
	}

}