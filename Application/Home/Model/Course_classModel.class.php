<?php 

namespace Home\Model;
use Think\Model;

class Course_classModel extends Model{


	public function find_MyCourse_ById($classId){

		return $this->table("course_class as t1,course as t2")
					->where("t1.class_id=$classId and t1.course_id=t2.cid")
					->select();
	}

}