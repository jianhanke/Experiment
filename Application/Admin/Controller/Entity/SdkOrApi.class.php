<?php 


namespace Admin\Controller\Entity;

class SdkOrApi{

	static $controllerManner='DockerApi';

	public function setControllerManner($manner){
		self::$controllerManner=$manner;
	}

	public function getControllerManner(){
		return self::$controllerManner;
	}	

}