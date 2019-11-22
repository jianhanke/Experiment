<?php 

namespace Home\Controller;
use Think\Controller;

class IndexController extends MyController{

	public function index(){
		$user_id=session('user_id');
		$user_name=session('user_name');
		$this->assign('user_id',$user_id);
		$this->assign('user_name',$user_name);
		$this->display();
	}
	

	public function test034(){
			
	}

	public function login(){
		$this->display('Login/login');
	}

	public function showCourse(){
		$model=D('Course');
		$info=$model->show_All_Course();
		// dump($info);
		$this->assign('datas',$info);
		$this->display();

	}	

	public function showExperiment(){
		// $model=new \Home\Model\ExperimentModel();
		$model=D('Experiment');
		$info=$model->show_Experiment();
		$user_id=session('user_id');
		$all_Id=$model->get_All_Id();
		$arr=array();
		for($i=0;$i<count($info);$i++){
			// array_push($arr,$info[$i]['eid']);
			$experiment_id=$info[$i]['eid'];
			$is_Join=$this->isJoinExperimentById($user_id,$experiment_id);
			$info[$i]['is_Join']=$is_Join;
		}
		$this->assign('datas',$info);
		$this->display();
	}

	public function isJoinExperimentById($user_id,$experiment_id){
		$model=new \Home\Model\Student_experimentModel();
		return $model->if_Join_Experiment($user_id,$experiment_id);
	}
	
	public function showCousrse(){
		$this->display();
	}

	public function startImage(){
		
		$docker_path=dirname(__FILE__).'\ControllerDocker\ceshiDocker.py';
		$info=exec("python.exe $docker_path faadsf 312312");
		dump($info);
	}

	public function showMyCourse(){
		$model=new \Home\Model\Student_experimentModel();

		$user_id=session('user_id');

		$info=$model->show_My_Experiment($user_id);
		// echo $model-> _sql();
		$this->assign('datas',$info);
		$this->display();
	}

	public function ceshi(){
		$info="ceshi";
		dump($info);
		dump(__EXT__);
	}

	public function showStudentInfoById(){
		$user_id=session('user_id');
		$model=D('Student');
		$info=$model->show_Student_Info_By_Id($user_id);
		$this->assign('datas',$info);
		$this->display('showStudentInfo');
	}

	public function serachKeyWord(){

		$keyword=I('get.keyword');
		$model=D('Experiment');
		$info=$model->serach_Key_Wordl($keyword);
		$this->assign('datas',$info);
		$this->display('showExperiment');

	}


}