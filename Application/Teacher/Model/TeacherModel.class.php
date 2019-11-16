<?php 

namespace Teacher\Model;
use Think\Model;

class TeacherModel extends Model{

	public function check_Login($post){

		return $this->where($post)
			         ->find();
	}

	public function find_Info_ById($teacherId){
		return $this->find($teacherId);
	}

}