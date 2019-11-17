<?php 

namespace Teacher\Model;
use Think\Model;

class CourseModel extends Model{

	public function show_MyCourse_Info($info){

		$info['_logic']="OR";
		return $this->where($info)
					->select();
	}

}