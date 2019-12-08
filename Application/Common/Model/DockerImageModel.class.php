<?php 

namespace Common\Model;
use Think\Model;

class ChapterImageModel extends Model{

	public function findImageNameById($image_id){
		return $this->where("to_imageId=$image_id")
					->find()['name'];
	}

}