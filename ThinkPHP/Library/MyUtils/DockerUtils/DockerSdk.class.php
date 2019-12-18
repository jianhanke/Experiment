<?php 

namespace MyUtils\DockerUtils;

class DockerSdk implements Docker{

	private $basPath=null;

	public function __construct(){
		$this->basPath=dirname(dirname(__FILE__)).'/ControllerDocker/';
	}

	public function showAllImage(){}

    public function showContainerById($container_id){}

    public function showContainerStatus($container_id){}
    

    public function deleteContainerById($container_id){}

    public function runContainerByIdIp($image_id,$ip,$hostName=Null,$link_Container=Null){}


    public function commitContainerById($container_id){}
	
	public function pullImageByName($imageName){
		$docker_path=$this->basPath.'pullImageByName.py'; 
		return exec("/usr/bin/python $docker_path $imageName"); 
	}

	public function getContainerStatus($container_id){
		$docker_path=$this->basPath.'getContainerStatus.py'; 
		return exec("/usr/bin/python $docker_path $container_id"); 
	}

	public function showAllContainer(){

		$docker_path=$this->basPath.'showAllContainerStatus.py'; 
		return exec("/usr/bin/python $docker_path"); 
	}

	public function restartContainerById($container_id){   //后台重启容器

		
	
		$docker_path=$this->basPath.'restartContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		
	}

	public function startContainerById($container_id){  //启动容器
		
		
		$docker_path=$this->basPath.'startContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		
	}

	public function stopContainerById($container_id){   //关机
			
		$docker_path=$this->basPath.'stopContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
	}

}