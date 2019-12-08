<?php 

namespace Common\Logic;
use Think\Model;


class ViewCoursetochapterLogic extends Model{


	public function find_Chapter_Course($chapter_id){

		return $this->find($chapter_id);
	}
	
}