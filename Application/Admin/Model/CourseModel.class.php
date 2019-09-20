<?php 

namespace Admin\Model;
use Think\Model;

class CourseModel extends Model{


	public function show_All_Course(){

		return $this->select();
	}

	
}