<?php 

namespace Admin\Model;
use Think\Model;

class ExperimentModel extends Model{

	// public function show_Experiment(){

	// 	return $this->table("experiment as t1,docker_image as t2")
	// 				->field("t1.*,t2.name")
	// 				->where("t1.image_id=t2.Image_id")
	// 				->order("eid asc")
	// 				->select();
	// }
	 public function show_Experiment(){
	 	return $this->select();
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