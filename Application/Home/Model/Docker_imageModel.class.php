<?php 

namespace Home\Model;
use Think\Model;

class Chapter_imageModel extends Model{

	public function findImageNameById($image_id){
		return $this->where("to_imageId=$image_id")
					->find()['name'];
	}

}