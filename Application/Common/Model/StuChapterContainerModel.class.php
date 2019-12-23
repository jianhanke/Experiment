<?php 

namespace Common\Model;
use Think\Model;

class StuChapterContainerModel extends Model{

	public function addDataByOrder($stu_chapter_key,$container_key){
		return $this->add(array('stu_chapter_key'=>$stu_chapter_key,'container_key'=>$container_key));
	}

	public function addData($arr){
		return $this->add($arr);
	}

}