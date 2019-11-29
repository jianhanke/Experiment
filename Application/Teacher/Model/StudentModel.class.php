<?php 

namespace Teacher\Model;
use Think\Model;

class StudentModel extends Model{

	public function show_Student_ById($classId){

		return $this->field('sid,sname,sage,ssex,stele')
					->where("Class_id=$classId")
					->select();
	}

	public function addInfo($post){
		return $this->add($post);
	}


	public function find_Student_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}


}