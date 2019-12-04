<?php 

namespace Common\Model;
use Think\Model;

class ClassTeacherModel extends Model{

	public function delData($condition){
		$condition['_logic']='OR';
	    return 	$this->where($condition)
			         ->delete();
	}


	public function add_info($post){

		return $this->add($post);
		
	}

}