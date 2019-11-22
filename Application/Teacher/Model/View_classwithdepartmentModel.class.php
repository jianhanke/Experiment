<?php 

namespace Teacher\Model;
use Think\Model;

class View_classwithdepartmentModel extends Model{

	public function show_ClassInfo_ById($classId){
		return $this->find($classId);
	}

	public function show_MyClass_Info($teacher_id){
		

		return $this->table('view_classwithdepartment as t1')
					->join("join  view_classinfo as t2  on t1.id=t2.id")
					->where("t2.Tid = $teacher_id")
					->select();
	}
}