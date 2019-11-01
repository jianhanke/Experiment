<?php 

namespace Home\Model;
use Think\Model;

class StudentModel extends Model{


	public function check_Login($post){
	   
            return $this-> where($post)->find();
       
	}
	public function show_Student_Info_By_Id($Sid){
		return $this->find($Sid);
	}
	
}