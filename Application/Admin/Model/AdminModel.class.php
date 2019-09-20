<?php 

namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{

	public function check_Login($post){

		return $this->where($post)
			         ->find();

	}

}