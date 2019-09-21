<?php 

namespace Home\Model;
use Think\Model;

class StudentModel extends Model{


	public function check_Login(){


	   if(IS_POST){
            
            $post=I('post.');
            return $this-> where($post)->find();

       }

	}

	public function show_Student_Info_By_Id($Sid){

		return $this->find($Sid);
	}
	
}