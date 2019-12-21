<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class StudentController extends BaseTeacherController
{


	public function addStudentToClass(){

		if(IS_POST){
			$post=I('post.');
			$status=D('Student')->addInfo($post);
			if($status){
				$this->success('添加成功',U('Class/showClassToStudent',array('classId'=>$post['Class_id'])));
			}else{
				$this->error('添加失败');
			}
		}else{
			$classId=I('get.classId');
			$this->assign('classId',$classId);
			$this->display();
		}
	}

}