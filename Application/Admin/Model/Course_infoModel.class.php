<?php 

namespace Admin\Model;
use Think\Model;

class Course_infoModel extends Model{

	public function addCourseInfo($post){
		return $this->add($post);
	}

}