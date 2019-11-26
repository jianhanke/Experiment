<?php 

namespace Admin\Model;
use Think\Model;


class Chapter_imageModel extends Model{

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
	public function show_All_Data(){
		return $this->select();
	}
	public function add_Info($data){
		return $this->add($data);
	}
	
	public function add_ChapterInfo($post){
		return $this->add($post);
	}

	
	

}