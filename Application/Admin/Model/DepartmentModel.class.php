<?php 

namespace Admin\Model;
use Think\Model;

class DepartmentModel extends Model{

	public function show_AllDepartment_Info(){
		return $this->select();
	}

	public function show_OtherDepartment_Info($departmentId){
		return $this->where("id !=$departmentId")
					->select();
	}

}