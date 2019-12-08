<?php 

namespace Common\Model;
use Think\Model;

class CourseClassModel extends Model{
	
	public function delData($condition){
		$condition['_logic']='OR';
		return $this->where($condition)
					->delete();
	}


	public function add_Info($post){
		return $this->add($post);
	}

	
	public function show_ClassId_ByCourseId($info){
		$arr= $this->field('class_id')
					->distinct(true)
					->where($info)
					->select();

		return array_reduce($arr, function ($result, $value) {
			 return array_merge($result, array_values($value));
			}, array());
		
	}
	
	public function find_MyCourse_ById($classId){

		return $this->table("course_class as t1,course as t2")
					->where("t1.class_id=$classId and t1.course_id=t2.cid")
					->select();
	}

}