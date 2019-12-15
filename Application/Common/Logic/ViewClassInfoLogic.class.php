<?php 

namespace Common\Logic;
use Think\Model;

class ViewClassInfoLogic extends Model{

	public function show_ClassInfo_ById(){

		return $this->select();
	}

}