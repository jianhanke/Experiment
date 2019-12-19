<?php 


namespace MyUtils\DockerUtils;

class DockerFactory{

	public static function createControllerWay($name){
		if($name=='Sdk'){
			return new \MyUtils\DockerUtils\DockerSdk();
		}else if($name=='Api'){
			return new \MyUtils\DockerUtils\DockerApi();	
		}
			return new \MyUtils\DockerUtils\DockerNull();
	}

}