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

	public function save_Info($post){
		$Tclass=$post['Tclass'];
		$Cid=$post['Cid'];
		$Tid=$post['Tid'];
		 $this->Tclass=$Tclass;
		return	$this->where("Cid=$Cid and Tid=$Tid")
					->save();
		// return $this->where("Cid=$post['Cid'] and Tid=$post['Tid']")
		// 			->save($post);
	}

	public function add_Info($post){
		return $this->add($post);
	}


	public function relate_To_MyCourse($info){
		return $this->add($info);
	}

	public function show_ClassId_ByCourseId($info){
		return $this->where($info)
					->select();
	}


}