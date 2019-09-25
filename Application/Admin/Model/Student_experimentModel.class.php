<?php 

namespace Admin\Model;
use Think\Model;

class Student_experimentModel extends Model{

	
	public function delete_Experiment_By_Id($user_id,$eid){

		$this->where("Sid='$user_id' and Eid='$eid' ")->delete();

	}
	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='Student_experiment' and table_schema = 'experiment' ";
		return $this->query($sql);
	}
	public function show_All_Data(){
		return $this->select();
	}
	public function add_Info($data){
		return $this->add($data);
	}


}