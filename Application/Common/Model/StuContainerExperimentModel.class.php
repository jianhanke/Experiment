<?php 

namespace Common\Model;
use Think\Model;

class StuContainerExperimentModel extends Model{

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

}