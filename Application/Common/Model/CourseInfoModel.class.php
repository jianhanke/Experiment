<?php 

namespace Common\Model;
use Think\Model;

class CourseInfoModel extends Model{

	public function addCourseInfo($post){
		return $this->add($post);
	}

}