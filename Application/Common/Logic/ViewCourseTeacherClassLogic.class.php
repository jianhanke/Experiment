<?php 


namespace Common\Logic;
use Think\Model;

class ViewCourseTeacherClassLogic extends Model{


	// public function show_MyClass_Info($teacher_id){
	
	// 	return $this->distinct(true)
	// 				->table('view_course_teacher_class as t1')
	// 				->join("join  view_classinfo as t2  on t1.class_id=t2.id  join course as t3 on t3.cid=t1.course_id ")
	// 				->select();
	// }

	public function getClassToInfo($classId){
		return	 $this->table('view_course_teacher_class as t1,course as t2,teacher as t3')
					  ->where("t1.class_id=$classId and t1.course_id=t2.cid and t1.teacher_id=t3.Tid")
					   ->select();
	}

	public function show_MyClass_Info($teacher_id){
	
		return $this->table('view_course_teacher_class as t1,view_class_department as t2,course as t3')
					->where("t1.teacher_id=$teacher_id and t1.class_id=t2.id and t3.cid=t1.course_id ")
					->select();				
	}

	public function show_MyCourse_Info($teacherId){

		return $this->table('view_course_teacher_class as t1,course as t2')
					->where("t1.teacher_id=$teacherId and  t1.course_id=t2.cid")
					->select();
	}

	public function find_ClassId_ById($courseId,$teacherId){

		return $this->field('t2.id,t2.class_name')
					->table('view_course_teacher_class as t1,class as t2')
					->where("t1.course_id=$courseId and t1.teacher_id=$teacherId and t1.class_id=t2.id")
					->select();

	}

	public function deleteTeacherToCourseClass($courseId,$teacherId){
		 $datas=$this->field('class_id')
					->where(array('course_id'=>$courseId,'teacher_id'=>$teacherId))
					->select();
		
		

		$status=M('CourseTeacher')->where(array('course_id'=>$courseId,'teacher_id'=>$teacherId))->delete();

		if(empty($datas)){
			return true;
		}
		foreach ($datas as $key => &$value) {
			$value['teacher_id']=$teacherId;
		}
		$datas['_logic']='OR';
		$status=D('ClassTeacher')->where($datas)->delete();
		return true;
	}



	public function delTeacherToCourse($teacherId,$courseId){
			$array=$this->where(array('course_id'=>$courseId,'teacher_id'=>$teacherId))
			 		   ->select();
			
			$array2=$array;
			
			foreach ($array as &$arr)
			{
				unset($arr['course_id']);
			}
			foreach ($array2 as &$arr)
			{
				unset($arr['teacher_id']);
			}

			$status1=D('CourseTeacher')->delData(array('course_id'=>$courseId,'teacher_id'=>$teacherId));
			$status2=D('ClassTeacher')->delData($array);
			$status3=D('CourseClass')->delData($array2);
			return $status1;
	}



}
