<?php 

namespace Common\Model;
use Think\Model;

class ExperimentImageModel extends Model{

	public function getAllImageIdById($id){
		$arr=$this->field('image_id')
					->where("Eid=$id")
					->select();
		return array_reduce($arr, function ($result, $value) {
			 return array_merge($result, array_values($value));
			}, array());
	}

}