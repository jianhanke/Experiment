<?php 

namespace Common\Model;
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

	public function find_Course_ByChapterId($chapterId){
		return $this->table('course as t1,chapter as t2')
					->where("t2.id=$chapterId and  t2.to_course=t1.cid")
					->select()[0];
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

	public function show_All_Course(){

		return $this->select();
	}

}