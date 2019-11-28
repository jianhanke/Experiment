<?php 

namespace Home\Model;
use Think\Model;

class Chapter_reportModel extends Model{

	public function add_Info($info){
		return $this->add($info);
	}

	public function save_Info($info){
		return $this->save($info);
	}

}