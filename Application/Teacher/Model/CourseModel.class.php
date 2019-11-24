<?php 

namespace Teacher\Model;
use Think\Model;

class CourseModel extends Model{

	public function show_MyCourse_Info($info){

		$info['_logic']="OR";
		return $this->where($info)
					->select();
	}

	public function find_Course_Name($courseId){
		return $this->find($courseId)['cname'];
	}

	public function delete_Course_By_Id($id){

	}

}