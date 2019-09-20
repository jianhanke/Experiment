<?php 

namespace Home\Model;
use Think\Model;

class CourseModel extends Model{


	public function show_All_Course(){

		return $this->select();
	}

	// public function joinChapterById(){

	// 	$id=I('get.id');
	// 	$model=D('chapter');
	// 	$image_id=$model->find_Image_By_id($id);

	// }
}