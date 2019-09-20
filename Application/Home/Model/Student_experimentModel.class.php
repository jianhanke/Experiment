<?php 

namespace Home\Model;
use Think\Model;

class Student_experimentModel extends Model{

	public function if_Join_Experiment($Sid,$Eid){

		
		$is_exist=$this->where("Sid='$Sid' and Eid='$Eid'")->find();
		if(!empty($is_exist)){
			return true;
		}else{
			return false;
		}
		
	}
	public function student_Join_Experiment($Sid,$Eid){

		$this->Sid=$Sid;
		$this->Eid=$Eid;
		$this->add();

	}
	public function show_My_Experiment($user_id){
		return $this->table('student_experiment as t1,experiment as t2')
					->where("t1.Sid=$user_id and t1.Eid=t2.Eid")
					->select();
	}

}