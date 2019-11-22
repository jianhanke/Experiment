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

	public function delete_Course_By_Id($courseId,$teacherId){

		return $this->where("Cid=$courseId and Tid=$teacherId")
					->delete();
	}

	public function show_ClassId_ById($teacher_id){

		return  $this->field('cid as id')
					->where("Tid=$teacher_id")
					->select();


	}

}