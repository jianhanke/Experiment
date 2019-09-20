<?php 

namespace Admin\Model;
use Think\Model;

class StudentModel extends Model{


	public function show_Student(){

		return $this->select();
	}

	public function modify_Student_By_Id($info){
		return $this->save($info);
		
	}
	public function find_Student_By_Id(){
		return $this->find($user_id);
	}

	public function count_Num(){
		return $this->count();
	}

	public function find_Student_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Student_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}

	public function add_Student($data){
		dump($this->add($data));
	}


}