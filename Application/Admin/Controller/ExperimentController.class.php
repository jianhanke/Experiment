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

	public function addExperiment(){

		if(IS_POST){
			$post=I('post.');
			if( empty($post['Ename']) or empty($post['image_id']) or empty($post['name']) or empty($_FILES['outcome_model']['tmp_name']) ){
				$this->error('填写不完整',U('Experiment/addExperiment'),2);
			}
			$upload = new \Think\Upload();
			$upload->rootPath = './Public/Experiment/';  // ./ 代表 项目的根目录
			$upload->exts      =     array('png','jpeg','jpg');
			$upload->maxSize= 10*1024*1024;
			$upload->replace=true;
			$upload->autoSub  = false;    //禁止上传时候的时间目录
			$pictureInfo   =   $upload->uploadOne($_FILES['outcome_model']);
			if(!$pictureInfo) {// 上传错误提示错误信息
		        $this->error($upload->getError());
			}
			dump($pictureInfo);
			echo $pictureInfo['savename'];
			$model=D('Experiment');
			$model2=new \Admin\Model\Docker_imageModel();
			$Model = M();
			$Model->startTrans();

			$experimentInfo=array('Ename'=>$post['Ename'],'image_id'=>$post['image_id'],'outcome_model'=>$pictureInfo['savename']);
			$imageInfo=array('Image_id'=>$post['image_id'],'name'=>$post['name']);
			try{
				$experimentRes=$model->addExperiment($experimentInfo);
				dump($experimentRes);
				$imageRes=$model2->add_Image_AndId($imageInfo);
				if($experimentRes && $imageRes){       //事务处理
					$Model->commit();
				}else{
					$Model->rollback();
				}	
			}catch(\Exception $e){
				$this->error('数据库添加失败');
			}
			
			
		}else{
			$this->display();
		}
	}
	


}