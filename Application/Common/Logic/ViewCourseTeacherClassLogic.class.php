<?php 

namespace  Common\Logic;
use Think\Model;

class ViewCourseTeacherClassLogic extends Model{

	public function delTeacherToCourse($courseId,$teacherId){


		  
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