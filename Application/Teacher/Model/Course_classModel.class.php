<?php 

namespace Teacher\Model;
use Think\Model;

class Course_classModel extends Model{

	



	public function add_Info($post){
		return $this->add($post);
	}

	
	public function show_ClassId_ByCourseId($info){
		return $this->where($info)
					->select();
	}


}