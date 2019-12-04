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

			$status1=D('CourseTeacher')->delCourseToTeacher(array('course_id'=>$courseId,'teacher_id'=>$teacherId));
			$status2=D('ClassTeacher')->delClassToTeacher($array);
			$status3=D('CourseClass')->delCourseToClass($array2);
			return $status1;
	}

	

}