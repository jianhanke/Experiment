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


	


}