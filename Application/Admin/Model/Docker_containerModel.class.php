<?php 

namespace Admin\Model;
use Think\Model;

class Docker_containerModel extends Model{

	// public function show_Container(){   //可以使用，被视图给替代了

	// 	return $this->table("docker_container as t1,student as t2,docker_image as t3,experiment as t4  ")
	// 				->field("t1.*,t2.Sid,t2.Sname,t3.name,t4.Eid,t4.Ename")
	// 				->where("t1.student_id=t2.Sid and t1.Image_id=t3.Image_id and t1.Image_id=t4.image_id")
	// 				->select();
	// }

	public function show_Image(){

		return $this->select();
	}

	public function delete_Container_By_Id($container_id){

		$this->where("Container_id='$container_id'")->delete();
	}
	
	public function show_All_Container(){

		return $this->order("id desc")   //降序，和Docker容器保持一致,最新的放在上面
					->select();
	}
	public function count_Num(){
		return $this->count();
	}
	
	public function find_Container_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->select();
	}
	public function count_Container_By_Like($search,$keywords){
		return $this->where("$search like '%$keywords%'")->count();
	}
	
}