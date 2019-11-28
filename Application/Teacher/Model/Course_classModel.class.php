<?php 

namespace Teacher\Model;
use Think\Model;

class Course_classModel extends Model{

	



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