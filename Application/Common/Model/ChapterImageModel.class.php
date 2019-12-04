<?php 

namespace Common\Model;
use Think\Model;

class ChapterImageModel extends Model{


	public function add_ChapterInfo($post){
		return $this->add($post);
	}

	public function show_All_Data(){
		return $this->select();
	}
	
}