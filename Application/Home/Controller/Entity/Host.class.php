<?php 


namespace Home\Controller\Entity;

class Host{

	public static function getHostName(){
		return $_SERVER['SERVER_NAME'];
	}

	public static function getCourseRealPath(){
		return dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/Course/"  ;
	}

}