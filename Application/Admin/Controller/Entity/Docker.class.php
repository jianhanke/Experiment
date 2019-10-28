<?php 


namespace Admin\Controller\Entity;

class Docker{

	
	public function pullImageByName($imageName){
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/pullImageByName.py'; 
		return exec("/usr/bin/python $docker_path $imageName"); 
	}

	public function getContainerStatus($container_id){
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/getContainerStatus.py'; 
		return exec("/usr/bin/python $docker_path $container_id"); 
	}

	public function getAllContainerStatus(){

		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/showAllContainerStatus.py'; 
		return exec("/usr/bin/python $docker_path"); 
	}

	public function restartContainerById($container_id){   //后台重启容器

		
	
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/restartContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		
	}

	public function startContainerById($container_id){  //启动容器
		
		
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/startContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
		
	}

	public function shutdownContainerById($container_id){   //关机
			
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/stopContainerById.py'; 
		exec("/usr/bin/python $docker_path $container_id"); 
	}

	




}