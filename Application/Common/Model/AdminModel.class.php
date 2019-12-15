<?php 

namespace Common\Model;
use Think\Model;

class AdminModel extends Model{

	public function check_Login($post){

		return $this->where($post)
			         ->find();
	}
	
	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='Admin' and table_schema = 'experiment' ";
		return $this->query($sql);
	}

	public function show_All_Data(){
		return $this->select();
	}
	public function add_Info($data){
		return $this->add($data);
	}

}