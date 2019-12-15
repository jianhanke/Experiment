<?php 

namespace Common\Model;
use Think\Model;

class DockerContainerModel extends Model{

	public function show_Tests(){

		return $this->select();
		
	}
	public function findContainerById($id){
		return $this->find($id);
	}
	public function show_All_Container(){

		return $this->order("id desc")   //降序，和Docker容器保持一致,最新的放在上面
					->select();
	}


	public function find_ContainerId_By_ImageId($user_id,$image_id,$chapter_id){
		$info=$this->where(" student_id='$user_id' and  Image_id='$image_id' and to_chapter='$chapter_id'")->find();
		return $info['container_id'];
	}
	public function find_Container_By_UserId($user_id,$image_id){
		return $this->where("student_id='$user_id' and Image_id='$image_id'")->find()['container_id'];
	}

	public function findDataById($user_id,$image_id){
		return $this->where("student_id='$user_id' and Image_id='$image_id'")->find();	
	}

	public function find_Container_Info($condition){
		return $this->where($condition)->find();
	}

	public function find_Id_By_Ip($ip_num){
		return $this->where("ip_num=$ip_num")->find()['id'];
	}

	// public function find_Ip_id($user_id,$image_id){
	// 	$info=$this->where("student_id='$user_id' and Image_id='$image_id'")->find();
	// 	return $info['ip_num'];	
	// }
	   public function find_Ip_id($container_id){
	   		return $this->where("Container_id='$container_id'")->find()['ip_num'];
	   }
	

	// public function add_Container($user_id,$container_id,$image_id,$ip,$ip_num){
	// 	$this->Container_id=$container_id;
	// 	$this->student_id=$user_id;
	// 	$this->Image_id=$image_id;
	// 	$this->ip=$ip;
	// 	$this->ip_num=$ip_num;
	// 	return $this->add();
	// }

	public function addData($info){
		return $this->add($info);
	}

	public function addAllData($info){
		return $this->addAll($info);	
	}


	public function find_Max_Ip(){
		return $this->max('ip_num');
	}

	public function find_Ip_Prefix(){
		return $this->max('ip_prefix');
	}

	public function find_ContainerId_By_Ip($ip_num){

		return $this->where("ip_num='$ip_num'")->find()['container_id'];
		

	}

	public function if_Join_Chapter($user_id,$image_id,$to_chapter){
		$is_exist=$this->where("student_id='$user_id' and Image_id='$image_id' and to_chapter='$to_chapter'")->find();
		if(!empty($is_exist)){
			return true;
		}else{
			return false;
		}
	}

	public function add_Container_To_Chapter($user_id,$container_id,$image_id,$ip,$ip_num,$to_chapter){
		$this->Container_id=$container_id;
		$this->student_id=$user_id;
		$this->Image_id=$image_id;
		$this->ip=$ip;
		$this->ip_num=$ip_num;
		$this->to_chapter=$to_chapter;
		return $this->add();

	}

	public function save_Note($id,$myNote){
		dump($id);
		dump($myNote);
		$this->note=$myNote;

		$this->id=$id;
		$this->save();
	}

	public function find_Container_By_Ip($ip_num){
		return $this->where("ip_num=$ip_num")
					->find();
	}

	public function find_Ip_By_Chapter($user_id,$image_id,$chapter_id){

		$info=$this->where("student_id='$user_id' and Image_id='$image_id' and to_chapter='$chapter_id' ")->find();
		return $info['ip_num'];
	}

	public function updateContainerId($id,$container_id){

		$this->where("id=$id");
		$this->Container_id=$container_id;
		return $this->save();
	}



	
}