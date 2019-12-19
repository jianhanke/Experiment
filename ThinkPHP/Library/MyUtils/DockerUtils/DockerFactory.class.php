<?php 


namespace MyUtils\DockerUtils;

class DockerFactory{

	public static function createControllerWay($name){
		if($name=='PythonSdk'){
			return new \MyUtils\DockerUtils\DockerSdk();
		}else if($name=='DockerApi'){
			return new \MyUtils\DockerUtils\DockerApi();	
		}
			return new \MyUtils\DockerUtils\DockerNull();
	}

}