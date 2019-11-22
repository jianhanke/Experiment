<?php 

namespace Admin\Model;
use Think\Model;

class View_classinfoModel extends Model{

	public function show_ClassInfo_ById(){

		return $this->select();
	}

}