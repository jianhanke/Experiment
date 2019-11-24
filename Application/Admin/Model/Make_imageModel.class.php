<?php 

namespace Admin\Model;
use Think\Model;

class Make_imageModel extends Model{


	public function addInfoById($post){
		$this->add($post);
	}

	public function add_Image_AndId($imageInfo){
		
		return  $this->add($imageInfo);	
	}

	public function show_All_Data(){
		return $this->select();
	}

}