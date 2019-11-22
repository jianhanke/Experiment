<?php 

namespace Admin\Controller;
use Think\Controller;

class ClassController extends MyController{

	public function showAllClassInfo(){

		$model=new \Admin\Model\View_classwithdepartmentModel();
		$info=$model->show_AllClass_Info();
		$count=$model->count_All_Class();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();

	}

	public function showClassInfoById($id){
		
		$model=new \Admin\Model\View_classwithdepartmentModel();
		$class=$model->show_ClassInfo_ById($classId);

		$model=new \Admin\Model\View_classinfoModel();
		$info=$model->show_ClassInfo_ById($id);

		$this->assign('class',$class);
		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyClassInfoById($id){

		if(IS_POST){
			$model=D('Class');
			$post=I('post.');
			$status=$model->save_ClassInfo_ById($post);
			if($status){
				$this->success('修改成功',U('Class/showAllClassInfo'));
			}else{
				$this->error('修改失败');
			}

		}else{
			$model=new \Admin\Model\View_classwithdepartmentModel();
			$model2=D('Department');

			$info=$model->show_ClassInfo_ById($classId);
			$departments=$model2->show_OtherDepartment_Info($info['department_id']);

			$this->assign('departments',$departments);
			$this->assign('datas',$info);
			$this->display();		
		}	
	}

	public function deleteClassById($classId){

		$model=D('Class');
		$status=$model->delete_Class_ById($classId);
		if($status){
			$this->success('删除成功',U('Class/showAllClassInfo'));
		}else{
			$this->error('删除失败');
		}

	}

	public function addClassInfo(){

		if(IS_POST){
			$post=I('post.');
			$model=D('Class');
			$status=$model->add_Class_Info($post);

			if($status){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}

		}else{
			$model2=D('Department');
			$departments=$model2->show_AllDepartment_Info();
			$this->assign('departments',$departments);
			$this->display();
		}
	
	}






}