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
		$model =D('WebConfig');
		$name=$model->getValueByName("Api_Or_Sdk");
		

		$this->assign('configName',$name);

		
		
		$this->display();
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