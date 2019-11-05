<?php 

namespace Admin\Model;
use Think\Model;

class MakeimageModel extends Model{


	public function addInfoById($post){
		$this->add($post);
	}

}