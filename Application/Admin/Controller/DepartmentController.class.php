<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class DepartmentController extends BaseAdminController{

	public function showAllDepartmentInfo(){

		
		$datas=D('Department')->show_AllDepartment_Info();
		$this->assign('datas',$datas);
		$this->display();
	}

	public function showDepartmentInfoById($id){
		
		
		$info=D('Department')->show_DepartmentInfo_ById($id);

		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyDepartmentInfoById($id){

		if(IS_POST){
			
			$post=I('post.');
			$status=D('Department')->editData($post);
			if($status){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			
			$datas=D('Department')->show_DepartmentInfo_ById($id);

			$this->assign('datas',$datas);
			$this->display();		
		}	
	}

	public function deleteDepartmentById($id){

		$status=D('Department')->delete_Department_ById($id);
		if($status){
			$this->success('删除成功',U('Department/showAllDepartmentInfo'));
		}else{
			$this->error('删除失败');
		}

	}

	public function addDepartmentInfo(){

		if(IS_POST){
			$post=I('post.');
			$status=D('Department')->add_Department_Info($post);

			if($status){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
			
		}else{
			$datas=D('Department')->show_AllDepartment_Info();
			$this->assign('datas',$datas);
			$this->display();
		}
	}




}