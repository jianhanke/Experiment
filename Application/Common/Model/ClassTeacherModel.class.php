<?php 

namespace Common\Model;
use Think\Model;

class ClassTeacherModel extends Model{

	public function delClassToTeacher($condition){
		$condition['_logic']='OR';
	    return 	$this->where($condition)
			         ->delete();
	}

}