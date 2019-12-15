<?php 

namespace Common\Model;
use Think\Model;

class ExperimentModel extends Model{

	public function getAllDataIdName(){
		return $this->field('eid,ename')
					->select();
	}

	public function getImageById($id){
		return $this->where("Eid=$id")
					->select();
	}

	public function show_Experiment(){
		return $this->order("Eid desc")
					->select();
	}

	public function find_Experiment($experimentId){

		return $this->find($experimentId);

	}

	public function find_ImageId_By_experimentId($experimentId){
		return $this->find($experimentId)['image_id'];
	}

	public function find_ImageId_By_experimentName($experimentId){
		return $this->find($experimentId)['image_name'];
	}

	public function get_All_Id(){
		return $this->field('Eid')->select();
	}

	public function serach_Key_Wordl($keyword){
		$sql="select * from experiment where Ename like '%$keyword%' ";
		return $this->query($sql);
	}

	public function is_Desktop_ById($experimentId){
		return  $this->find($experimentId)['is_desktop'];
	}


	

	public function delete_Experiment_By_Id($experiment_id){

		return $this->where("Eid='$experiment_id' ")->delete();
	}

	public function modify_Experiment_By_Id($info){

		return $this->save($info);
	}
	public function find_Experiment_By_Id($experiment_id){

		return $this->find($experiment_id);
	}

	public function count_Num(){
		return $this->count();
	}
	public function find_Experiment_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Experiment_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}

	public function addExperiment($experimentInfo){
		return $this->add($experimentInfo);
	}
	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='Experiment' and table_schema = 'experiment' ";
		return $this->query($sql);
	}
	public function show_All_Data(){
		return $this->select();
	}
	public function add_Info($data){
		return $this->add($data);
	}
	
	
}