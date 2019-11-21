<?php 

namespace Home\Model;
use Think\Model;


class View_coursetochapterModel extends Model{


	public function find_Chapter_Course($chapter_id){

		return $this->find($chapter_id);
	}
	
}