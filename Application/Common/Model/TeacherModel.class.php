<?php 

namespace Common\Model;
use Think\Model;

class TeacherModel extends Model{

	public function check_Login($post){

		return $this->where($post)
			         ->find();
	}

	public function find_Info_ById($teacherId){
		return $this->find($teacherId);
	}

	public function modify_Info($post){
		return $this->save($post);
	}

	public function show_Teacher(){

		return $this->select();
	}
	


}