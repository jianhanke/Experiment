<?php 

namespace Teacher\Model;
use Think\Model;

class ClassModel extends Model{

	public function addInfo($post){
		return $this->add($post);
	}

}