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

	public function findImageNameById($image_id){
		return $this->where("Cid=$image_id")
					->field('to_imageName')
		 			 ->find()['to_imagename'];
	}

	public function find_Image_By_id($id){

		return $this->where("Cid=$id")
					->find()['to_imageid'];
	}


	public function show_Image(){

		return $this->select();
	}
	public function count_Num(){
		return $this->count();
	}

	public function delete_ChapterImage_ById($id){
		return $this->delete($id);
	}


	

	public function find_Image_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Image_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}

	
	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='docker_image' and table_schema = 'experiment' ";
		return $this->query($sql);
	}


	public function add_Info($data){
		return $this->add($data);
	}
	

	
}