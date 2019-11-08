<?php 

namespace Admin\Model;
use Think\Model;

class Student_experimentModel extends Model{

	
	public function delete_Experiment_By_Id($user_id,$eid){

		$this->where("Sid='$user_id' and Eid='$eid' ")->delete();

	}
	
	


}