<?php 

namespace Admin\Model;
use Think\Model;

class CourseModel extends Model{


	public function show_All_Course(){

		return $this->select();
	}

	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='course' and table_schema = 'experiment' ";
		// $sql="show full columns from course";
		return $this->query($sql);
	}
	public function show_All_Data(){
		return $this->select();
	}
	public function add_Info($data){
		return $this->add($data);
	}

	public function delete_Course_By_Id($id){
		return $this->delete($id);	
	}

	
}