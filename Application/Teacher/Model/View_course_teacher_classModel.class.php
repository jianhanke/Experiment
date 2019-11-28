<?php 


namespace Teacher\Model;
use Think\Model;

class View_course_teacher_classModel extends Model{


	// public function show_MyClass_Info($teacher_id){
	
	// 	return $this->distinct(true)
	// 				->table('view_course_teacher_class as t1')
	// 				->join("join  view_classinfo as t2  on t1.class_id=t2.id  join course as t3 on t3.cid=t1.course_id ")
	// 				->select();
	// }

	public function show_MyClass_Info($teacher_id){
	
		return $this->table('view_course_teacher_class as t1,view_classwithdepartment as t2,course as t3')
					->where("t1.teacher_id=$teacher_id and t1.class_id=t2.id and t3.cid=t1.course_id ")
					->select();				
	}

	public function show_MyCourse_Info($teacherId){

		return $this->table('view_course_teacher_class as t1,course as t2')
					->where("t1.teacher_id=$teacherId and  t1.course_id=t2.cid")
					->select();
	}

	public function find_ClassId_ById($courseId,$teacherId){

		return $this->field('t2.id,t2.class_name')
					->table('view_course_teacher_class as t1,class as t2')
					->where("t1.course_id=$courseId and t1.teacher_id=$teacherId and t1.class_id=t2.id")
					->select();

	}


}
