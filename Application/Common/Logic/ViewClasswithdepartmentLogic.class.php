<?php 

namespace Common\Logic;
use Think\Model;

class ViewClasswithdepartmentLogic extends Model{

	public function show_ClassInfo_ById($classId){
		return $this->find($classId);
	}

	public function show_MyClass_Info($teacher_id){
		

		return $this->table('view_classwithdepartment as t1')
					->join("join  view_classinfo as t2  on t1.id=t2.id")
					->where("t2.Tid = $teacher_id")
					->select();
	}

	public function show_AllGrade_ById($id){

		$arr= $this->distinct(true)
					->field('grade')
					->where("department_id=$id")
					->select();
		// return array_column($arr,'grade');
		return $arr;

	}

	public function show_AllClass_ById($condition){
		return $this->field('class_name,id')
					->where($condition)
					->select();
	}

	public function show_NoneSlect_class($condition){
		
		$department_id=$condition['department_id'];
		$teacher_id=$condition['teacher_id'];
		$grade=$condition['grade'];
		return $this->field('t1.*,t2.teacher_id')
					->table("view_classwithdepartment AS t1")
					->join("left join view_course_teacher_class as t2  on (t1.id = t2.class_id and t2.teacher_id =$teacher_id )")
					->where("t1.department_id=$department_id and  t1.grade =$grade")
					->select();
	
	}

}