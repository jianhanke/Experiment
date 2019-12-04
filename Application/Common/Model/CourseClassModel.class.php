<?php 

namespace Common\Model;
use Think\Model;

class CourseClassModel extends Model{
	
	public function delCourseToClass($condition){
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
	

}