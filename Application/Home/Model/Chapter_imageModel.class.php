<?php 

namespace Home\Model;
use Think\Model;

class Chapter_imageModel extends Model{

	public function findImageNameById($image_id){
		return $this->where("Cid=$image_id")
					->field('to_imageName')
		 			 ->find()['to_imagename'];
	}

	public function find_Image_By_id($id){
		return $this->find($id)['to_imageid'];
	}


}