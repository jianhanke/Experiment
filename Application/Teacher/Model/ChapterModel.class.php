<?php 

namespace Teacher\Model;
use Think\Model;

class ChapterModel extends Model{


	public function find_Chapter_By_Course_Id($id){

		return $this->where("to_course=$id")->select();
	}
	public function find_Image_By_id($id){
		return $this->field('to_image')
		 			 ->find($id)['to_image'];
	}

	public function add_Video_By_Id($videoName,$id){
			$this->video=$videoName;
			$this->where("id=$id")
				 ->save();
	}

	public function add_WordPath_ById($wordPath,$id){
		$this->doc=$wordPath;
		$this->where("id=$id")
				 ->save();
	}
	public function add_Info($data){
		return $this->add($data);
	}

	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='chapter' and table_schema = 'experiment' ";
		return $this->query($sql);
	}
	public function show_All_Data(){
		return $this->select();
	}


}