<?php 

namespace Teacher\Model;
use Think\Model;

class Course_infoModel extends Model{

	public function find_My_CourseId($teacherId){
		$arr= $this->field('Cid')
					->where("Tid=$teacherId")
					->select();
		// return  array_reduce($arr, function ($result, $value) {
		// 	 return array_merge($result, array_values($value));
		// 	}, array());
		return $arr;
	}

}