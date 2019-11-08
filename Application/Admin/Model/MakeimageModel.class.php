<?php 

namespace Admin\Model;
use Think\Model;

class MakeimageModel extends Model{


	public function addInfoById($post){
		$this->add($post);
	}

	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='Makeimage' and table_schema = 'experiment' ";
		return $this->query($sql);
	}
	public function show_All_Data(){
		return $this->select();
	}

}