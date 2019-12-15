<?php 

namespace Common\Model;
use Think\Model;

class DepartmentModel extends Model{

	
	public function show_AllDepartment_Info(){
		return $this->select();
	}

	public function show_OtherDepartment_Info($departmentId){
		return $this->where("id !=$departmentId")
					->select();
	}


	public function save_ExperimentInfo_ById($info){

		return $this->save($info);
	}

	public function delete_Department_ById($id){
		return $this->delete($id);
	}

	public function add_Department_Info($info){
		return $this->add($info);
	}

	public function show_DepartmentInfo_ById($id){
		return $this->find($id);
	}


}