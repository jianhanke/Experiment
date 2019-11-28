<?php 

namespace Home\Model;
use Think\Model;

class ChapterModel extends Model{


	public function find_Chapter_By_Course_Id($id){

		return $this->where("to_course=$id")->select();
	}
	

	public function find_ChapterInfo_ById($chapterId){

		return $this->field('doc,video')
					->find($chapterId);
	}

	public function show_MyChapterInfo_ById($chapterId,$studentId){

		return $this->field('t1.*,t2.id as upload_id')
					->table('chapter as t1')
					->join("left join chapter_report as t2 on t1.id=t2.chapter_id and t2.student_id=$studentId")
					->where("t1.to_course=$chapterId ")
					->select();
	}


}