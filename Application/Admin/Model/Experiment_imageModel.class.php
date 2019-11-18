<?php 

namespace Admin\Model;
use Think\Model;

class Experiment_imageModel extends Model{

	public function add_Info($info){
		return $this->add($info);
	}

	public function show_All_Info(){
		return $this->select();
	}

	public function delete_Image_By_Id($id){
		$this->where("Eid=$id")->delete();
	}

}