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


}