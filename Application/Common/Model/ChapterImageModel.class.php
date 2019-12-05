<?php 

namespace Common\Model;
use Think\Model;

class ChapterImageModel extends Model{



	public function add_ChapterInfo($info){
		return $this->add($info);
	}

	public function show_All_Data(){
		return $this->select();
	}

	public function addData($data){
		return $this->addAll($data);
	}

	public function delData($data){
		return $this->where($data)
					->delete();
	}

	public function delChapterImage($chapterId){
		return $this->where("Cid=$chapterId")
					->delete();
	}
	
}