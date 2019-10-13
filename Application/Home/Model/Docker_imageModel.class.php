<?php 

namespace Home\Model;
use Think\Model;

class Docker_imageModel extends Model{

	public function findImageNameById($image_id){
		return $this->find($image_id)['name'];
	}

}