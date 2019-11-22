<?php 

namespace Admin\Model;
use Think\Model;

class View_containerwithstuandexperModel extends Model{

	public function show_Info(){

		return $this->select();
	}

	public function count_Num(){
		return $this->count();
	}

	public function find_Container_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Container_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}

	public function find_Student_With_Container($student_id){
		
		return $this->where("student_id='$student_id' ")
					->select();
	}

	public function count_Student_With_Container($student_id){
		return $this->where("student_id='$student_id' ")
					->count();
	}


}