<?php 

namespace Home\Model;
use Think\Model;

class ExperimentModel extends Model{

	public function show_Experiment(){
		return $this->select();
	}

	public function find_Experiment($experimentId){

		return $this->find($experimentId);

	}

	public function find_ImageId_By_experimentId($experimentId){
		return $this->find($experimentId)['image_id'];
	}

	public function get_All_Id(){
		return $this->field('Eid')->select();
	}

	public function serach_Key_Wordl($keyword){
		$sql="select * from experiment where Ename like '%$keyword%' ";
		return $this->query($sql);
	}


}