<?php 

namespace Common\Model;
use Think\Model;

class ExperimentModel extends Model{

	public function getAllDataIdName(){
		return $this->field('eid,ename')
					->select();
	}

	public function getImageById($id){
		return $this->where("Eid=$id")
					->select();
	}
}