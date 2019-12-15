<?php 

namespace Common\Model;
use Think\Model;

class TeacherModel extends Model{

	public function check_Login($post){

		return $this->where($post)
			         ->find();
	}

	public function find_Info_ById($teacherId){
		return $this->find($teacherId);
	}

	public function modify_Info($post){
		return $this->save($post);
	}

	public function show_Teacher(){

		return $this->select();
	}

	public function count_Num(){
		return $this->count();
	}

	public function modify_Teacher_By_Id($info){
		return $this->save($info);
		
	}
	public function find_Teacher_By_Id($teacher_id){
		return $this->find($teacher_id);
	}
	public function find_Teacher_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Teacher_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}

	public function add_Info($data){
		return $this->add($data);
	}
	public function add_Teacher($post){

		try{
			return $this->add($post);	
		}catch(\Exception $e){
			return 0;
		}
		
	}

	public function delete_Teacher_By_Id($teacher_id){
		return $this->delete($teacher_id);
	}
	


}