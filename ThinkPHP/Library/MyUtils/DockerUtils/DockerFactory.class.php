<?php 


namespace MyUtils\DockerUtils;

class DockerFactory{

	public static function createControllerWay($name){
		if($name=='Sdk'){
			return new \MyUtils\DockerUtils\DockerSdk();
		}
		return new \MyUtils\DockerUtils\DockerApi();
	}

}