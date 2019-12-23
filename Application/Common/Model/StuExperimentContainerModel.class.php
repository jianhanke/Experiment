<?php 

namespace Common\Model;
use Think\Model;

class StuExperimentContainerModel extends Model{

	public function student_Join_Experiment($stuId,$container_id,$expId){

		return $this->add(array('stu_id'=>$stuId,'container_id'=>$container_id,'to_experimentid'=>$expId));

	}

	public function if_Join_Experiment($stuId,$expId){
		$is_exist=$this->where("stu_id=$stuId and to_experimentid=$expId")->find();
		if(!empty($is_exist)){
			return true;
		}else{
			return false;
		}
	}

	public function addData($arr){
		return $this->addAll($arr);
	}
	
	public function addDataByOrder($user_id,$stu_experiment_key,$container_key){
		return $this->add(array('stu_id'=>$user_id,'stu_experiment_key'=>$stu_experiment_key,'container_key'=>$container_key));
	}

}