<?php 

namespace Teacher\Model;
use Think\Model;

class Class_teacherModel extends Model{


	public function add_info($post){

		return $this->add($post);
		
	}

}