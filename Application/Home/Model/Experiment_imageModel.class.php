<?php 

namespace Home\Model;
use Think\Model;

class Experiment_imageModel extends Model{

	

	public function find_ImageId_By_experimentId($experimentId){
		$arr= $this->field('image_id')
					->where("Eid=$experimentId")
					->select();
		$result = array_reduce($arr, function ($result, $value) {
			 return array_merge($result, array_values($value));
			}, array());
		return $result;

	}

	public function find_ImageId_By_experimentName($experimentId){
		
		$arr= $this->field('image_name')
					->where("Eid=$experimentId")
					->select();
		$result = array_reduce($arr, function ($result, $value) {
			 return array_merge($result, array_values($value));
			}, array());
		return $result;
	}


	public function find_HostName_By_experimentId($experimentId){
		$arr= $this->field('hostName')
					->where("Eid=$experimentId")
					->select();
		$result = array_reduce($arr, function ($result, $value) {
			 return array_merge($result, array_values($value));
			}, array());
		return $result;
	}


	public function is_Have_More_Image($experimentId){

		return $info= $this->where("Eid=$experimentId")
			->count();

	}

	




}