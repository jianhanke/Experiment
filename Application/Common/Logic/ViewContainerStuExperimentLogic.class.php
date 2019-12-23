<?php 

namespace Common\Logic;
use Think\Model;

class ViewContainerStuExperimentLogic extends Model{

	
	public function getData($user_id,$experimentId){
			 $data=	$this->where(array('stu_id'=>$user_id,'experiment_id'=>$experimentId))
						      ->select();
			if(count($data)==1){
				return $data[0];
			}
			return $data;
	}

	public function countData(){
		return $this->count();
	}

	public function getAllData(){
		return $this->select();
	}


}