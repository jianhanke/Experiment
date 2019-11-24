<?php 

namespace Teacher\Model;
use Think\Model;

class Chapter_imageModel extends Model{


	public function add_ChapterInfo($post){
		return $this->add($post);
	}

	public function show_All_Data(){
		return $this->select();
	}
	
}