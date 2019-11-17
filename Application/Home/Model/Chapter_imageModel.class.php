<?php 

namespace Home\Model;
use Think\Model;

class Docker_imageModel extends Model{

	public function findImageNameById($image_id){
		return $this->where("to_imageId=$image_id")
					->find()['to_imageName'];
	}

	public function find_Image_By_id($id){
		return $this->field('to_imageName')
		 			 ->find($id)['to_imageName'];
	}


}