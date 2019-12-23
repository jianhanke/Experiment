<?php 

namespace Common\Model;
use Think\Model;

class StudentChapterModel extends Model{

	
	public function getData($user_id,$chapter_id){
		$data=$this->where(array('stu_id'=>$user_id,'to_chapterid'=>$chapter_id))
				   ->select();
		if(count($data)==1){
			return $data[0];
		}
		   return $data;
	}

	public function saveNoteById($student_id,$chapterId,$myNote){
		return $this->where(array('stu_id'=>$student_id,'to_chapterid'=>$chapterId))
					 ->save(array('note'=>$myNote));
	}

	public function addDataByOrder($stu_id,$to_chapterid){
		return $this->add(array('stu_id'=>$stu_id,'to_chapterid'=>$to_chapterid));
	}

	public function addData($arr){
		return $this->add($arr);
	}

	public function countDataByChapterId($chapter_id){
		return $this->where(array('to_chapterid'=>$chapter_id))
					->count();
	}

	public function getDataByChapterId($chapterId,$classId){
		return $this->field('t2.sid,t2.sname,t2.sage,t2.ssex,t2.stele')
					->table('student_chapter as t1')
					->join("student as t2 on t1.stu_id=t2.Sid and t1.to_chapterid=$chapterId and t2.Class_id=$classId")
					->select();
	}


	


}