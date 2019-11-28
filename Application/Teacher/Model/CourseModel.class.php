<?php 

namespace Teacher\Model;
use Think\Model;

class CourseModel extends Model{

	public function show_MyCourse_Info($info){

		if(empty($info)){
			return null;
		}

		$info['_logic']="OR";
		return $this->where($info)
					->select();
	}

	public function find_Course_ById($courseId){
		return $this->find($courseId);
	}

	public function find_Course_Name($courseId){
		return $this->find($courseId)['cname'];
	}

	public function show_Course_ById($courseId){
		return $this->find($courseId);
	}
	public function none_myCourse($info){

		for($i=0;$i<count($info);$i++){
			$info[$i]['cid']=array('neq',$info[$i]['cid']);
		}
		return $this->where($info)
					->select();
	}

	public function add_Info($post){
		return $this->add($post);
	}

}