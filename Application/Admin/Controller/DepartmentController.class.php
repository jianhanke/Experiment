<?php 

namespace Admin\Controller;
use Think\Controller;

class DepartmentController extends MyController{

	public function showAllDepartmentInfo(){

		$model=M('Department');
		$datas=$model->show_AllDepartment_Info();
		dump($datas[0]);
		$this->assign('datas',$datas);
		$this->display();
	}

	public function showDepartmentInfoById($id){
		
		$model=D('Department');
		$info=$model->show_ClassInfo_ById($id);
		dump($info);

		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyDepartmentInfoById($id){

		if(IS_POST){
			$model=D('Department');
			$post=I('post.');
			$status=$model->save_ClassInfo_ById($post);
			if($status){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			
			$model=D('Department');
			$datas=$model->show_ClassInfo_ById($id);
			$this->assign('datas',$info);
			$this->display();		
		}	
	}

	public function deleteDepartmentById($classId){

		$model=D('Department');
		$status=$model->delete_Department_ById($classId);
		if($status){
			$this->success('删除成功',U('Department/showAllDepartmentInfo'));
		}else{
			$this->error('删除失败');
		}

	}

	public function addDepartmentInfo(){

		if(IS_POST){
			$post=I('post.');
			$model=D('Class');
			$status=$model->add_Department_Info($post);

			if($status){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
			
		}else{
			$model2=D('Department');
			$datas=$model2->show_AllDepartment_Info();
			$this->assign('datas',$datas);
			$this->display();
		}
		

	}


}