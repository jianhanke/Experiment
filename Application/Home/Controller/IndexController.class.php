<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class IndexController extends BaseHomeController{

	public function index(){
		$user_id=session('user_id');
		$user_name=session('user_name');
		$this->assign('user_id',$user_id);
		$this->assign('user_name',$user_name);
		$this->display();
	}
	


	public function login(){
		$this->display('Login/login');
	}

	public function showCourse(){
		
		$info=D('Course')->show_All_Course();
		$this->assign('datas',$info);
		$this->display();

	}	

	public function showExperiment(){
		
		$info=D('Experiment')->show_Experiment();
		$user_id=session('user_id');
		
		$arr=array();
		for($i=0;$i<count($info);$i++){
			
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
	       // return  D("StudentExperiment")->if_Join_Experiment($user_id,$experimentId);
	}
	
	public function showCousrse(){
		$this->display();
	}

	public function startImage(){
		
		$docker_path=dirname(__FILE__).'\ControllerDocker\ceshiDocker.py';
		$info=exec("python.exe $docker_path faadsf 312312");
		dump($info);
	}

	public function showMyExperiment(){
		$user_id=session('user_id');

		$info=D('StudentExperiment')->show_My_Experiment($user_id);
		// $info=D('ViewStuContainerExperiment','Logic')->show_My_Experiment($user_id);
		// echo $model-> _sql();
		$this->assign('datas',$info);
		$this->display();
	}

	public function showStudentInfoById(){
		$user_id=session('user_id');
		
		$info=D('Student')->show_Student_Info_By_Id($user_id);
		$this->assign('datas',$info);
		$this->display('showStudentInfo');
	}

	public function serachKeyWord($keyword){

		$info=D('Experiment')->serach_Key_Wordl($keyword);
		$this->assign('datas',$info);
		$this->display('showExperiment');

	}

	public function showMyCourse(){

		$studentId=Session('user_id');
		$classId=D('Student')->find_MyClass_ById($studentId);
		if($classId){
			$datas=D('CourseClass')->find_MyCourse_ById($classId);	
		}else{
			echo "<script> alert('当前为空');  </script>";
		}
		$this->assign('datas',$datas);
		$this->display();
	}

	public function test05(){
		$info1=D('ViewStuContainerExperiment','Logic')->show_My_Experiment(1);
		$info2=D('StudentExperiment')->show_My_Experiment(1);
		echo  D("StudentExperiment")->if_Join_Experiment(1,1);
		echo "<br />";
		echo D('ViewStuContainerExperiment','Logic')->if_Join_Experiment(1,1);
		// dump($info1);
		// dump($info2);
	}

	public function test06(){
		$status=D('StuContainerExperiment')->student_Join_Experiment(1,1,1);
	}

	public function test01(){
		$upload=new \MyUtils\FileUtils\UploadFile();
		$excel=new \MyUtils\FileUtils\Excel();
		dump($upload);

		dump($excel);

		$upload=new \MyUtils\DockerUtils\NoVNC();
		dump($upload);

		$upload=new \MyUtils\DockerUtils\SdkOrApi();
		dump($upload);


		$upload=new \MyUtils\DockerUtils\Docker();
		dump($upload);

		$upload=new \MyUtils\DockerUtils\Ssh();
		dump($upload);

		echo \MyUtils\HostUtils\Host::getHostName();

		// $noVNC=new \MyUtils\HostUtils\Host();


		echo "ceshi";
		$ips=(new \MyUtils\DockerUtils\DockerApi())->getNewIp();

	}

	public function test02(){
		$datas=D('ExperimentImage')->getDataById(13);
		dump($datas);
	}

	public function test03(){
		$data=array('Container_id'=>1,
						'student_id'=>1,
						'ip'=>1,
						'Image_id'=>1,
						'to_experiment'=>1,
						'ip_num'=>1);
			
			$status=D('DockerContainer')->addData($data); //学生容器id 加入 docker_container
			dump($status);
	}

	public function test04(){
		$model=D('ViewStuContainerChapter','Logic');
		$model->test01();
		D('StuContainerExperiment')->test01();
	}

}