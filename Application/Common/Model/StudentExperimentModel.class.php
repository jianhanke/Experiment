<?php 

namespace Common\Model;
use Think\Model;

class StudentExperimentModel extends Model{

	public function show_My_Experiment($user_id){
		return $this->table('student_experiment as t1,experiment as t2')
					->where("t1.stu_id=$user_id and t1.experiment_id=t2.Eid")
					->select();
	}

	public function if_Join_Experiment($stu_id,$experiment_id){

		
		$is_exist=$this->where("stu_id='$stu_id' and experiment_id='$experiment_id'")->find();
		if(!empty($is_exist)){
			return true;
		}else{
			return false;
		}
		
	}
	public function student_Join_Experiment($stu_id,$experiment_id){

		$this->stu_id=$stu_id;
		$this->experiment_id=$experiment_id;
		return $this->add();

	}

}