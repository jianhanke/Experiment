<?php 

namespace Admin\Model;
use Think\Model;

class View_classwithinfoModel extends Model{

	public function show_AllClass_Info(){
		return $this->select();
	}

	public function count_All_Class(){
		return $this->count();
	}

	public function show_ClassInfo_ById($classId){
		return $this->find($classId);
	}
}