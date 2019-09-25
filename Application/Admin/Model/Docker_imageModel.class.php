<?php 

namespace Admin\Model;
use Think\Model;


class Docker_imageModel extends Model{

	public function show_Image(){

		return $this->select();
	}
	public function count_Num(){
		return $this->count();
	}


	public function delete_Image_By_Id($image_id){
		$this->where("Image_id='$image_id'")->delete();
	}

	public function find_Image_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Image_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}

	public function add_Image_AndId($imageInfo){
		
		return  $this->add($imageInfo);	
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
	

}