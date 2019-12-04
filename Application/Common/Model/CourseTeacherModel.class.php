<?php 

namespace Common\Model;
use Think\Model;

class CourseTeacherModel extends Model{

	public function delData($condition){
		return $this->where($condition)
					->delete();
	}

	public function find_My_CourseId($teacherId){
		return $this->field('course_id  as cid')
					->where("teacher_id=$teacherId")
					->select();
		
	}

	public function delete_Course_By_Id($courseId,$teacherId){

		return $this->where("course_id=$courseId and teacher_id=$teacherId")
					->delete();
	}

	public function show_ClassId_ById($teacher_id){

		return  $this->field('cid as id')
					->where("$teacher_id=$teacher_id")
					->select();
	}

	
	public function add_Info($post){
		return $this->add($post);	
	}

	public function relate_To_MyCourse($info){
		return $this->add($info);
	}

	public function show_ClassId_ByCourseId($info){
		return $this->where($info)
					->select();
	}


}