<?php 


namespace MyUtils\DockerUtils;

 class  SdkOrApi{


 	public static $controllerManner=null;

	public  static function setControllerManner($manner){
		self::$controllerManner=$manner;
	}

	public static function getControllerManner(){
		return self::$controllerManner;
	}	

}