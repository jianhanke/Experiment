<?php 

namespace Home\Model;
use Think\Model;

class ChapterModel extends Model{


	public function find_Chapter_By_Course_Id($id){

		return $this->where("to_course=$id")->select();
	}
	public function find_Image_By_id($id){
		return $this->field('to_image')
		 			 ->find($id)['to_image'];
	}


}