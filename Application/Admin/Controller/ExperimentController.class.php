<?php 

namespace Admin\Controller;
use Think\Controller;

class ExperimentController extends MyController{

	public function showExperiment(){
		$model=D('Experiment');
		$info=$model->show_Experiment();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
	}

	public function deleteExperimentById(){

		$model=D('Experiment');
		$experiment_id=I('experiment_id');

		$info=$model->delete_Experiment_By_Id($experiment_id);  //$info是 操作了多少个对象
		$this->redirect('showExperiment');
	}

	public function modifyExperimentById(){
		
		$model=D('Experiment');

		if(IS_POST){
			$post=I('post.');
			dump($post);
			$info=$model->modify_Experiment_By_Id($post);
			dump($info);
				if($info){
					$this->success('修改成功');
				}else{
					$this->error('修改失败');
				}
		}else{
			$experiment_id=I('get.experiment_id');
			$info=$model->find_Experiment_By_Id($experiment_id);
			$this->assign('datas',$info);
			$this->display('modifyExperiment');
		}
	}

	public function findExperimentByLike(){   
		$model=D('Experiment');
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=$model->find_Experiment_By_Like($search,$keywords);
		$count=$model->count_Experiment_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->assign('count',$count);
		$this->display('showExperiment');
	}

}