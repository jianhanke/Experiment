<?php 

namespace Common\Model;
use Think\Model;

class DepartmentModel extends Model{

	public function show_AllDepartment_Info(){
		return $this->select();
	}


}