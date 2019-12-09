<?php 

namespace Common\Logic;
use Think\Model;

class ViewStuContainerExperimentLogic  extends Model{

	public function show_My_Experiment($stuId){
		return $this->table('view_stu_container_experiment as t1,experiment as t2')
					->group("t1.to_experimentid")
					->where("t1.student_id=$stuId and t1.to_experimentid=t2.Eid")
					->select();
	}


}