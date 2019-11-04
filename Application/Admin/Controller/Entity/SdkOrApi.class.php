<?php 


namespace Admin\Controller\Entity;

 class  SdkOrApi{


 	public static $controllerManner=null;

	public  static function setControllerManner($manner){
		self::$controllerManner=$manner;
	}

	public static function getControllerManner(){
		return self::$controllerManner;
	}	

}