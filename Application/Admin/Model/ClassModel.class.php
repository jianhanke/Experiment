<?php 

namespace Admin\Model;
use Think\Model;

class ClassModel extends Model{



	

	public function save_ClassInfo_ById($info){

		return $this->save($info);
	}

	public function delete_Class_ById($classId){
		return $this->delete($classId);
	}

	public function add_Class_Info($info){
		return $this->add($info);
	}

}