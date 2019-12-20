<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class WebConfigController extends BaseAdminController{


	public function showAllConfig(){
		$model=D('WebConfig');
		$datas=$model->getDataAll();
		$count=$model->getCount();

		$this->assign('count',$count);
		$this->assign('datas',$datas);
		$this->display();
	}

	public function updateConfigToFile(){
		$status=D('WebConfig')->ConfigUpdateToFile();
		if($status){
			$this->success('更新成功',U('Index/home'));
		}else{
			$this->error('更新失败');
		}
	}

	public function editConfig(){

		$status=D('WebConfig')->editData(I('post.id'),I('post.value'));
		if($status){
			D('WebConfig')->ConfigUpdateToFile();
			$this->success('修改成功');
		}else{
			echo "<script>  alert('修改失败');  </script>";
		}

	}



}