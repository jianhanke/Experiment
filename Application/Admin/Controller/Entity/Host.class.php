<?php 


namespace Admin\Controller\Entity;

class Host{

	public static function getHostName(){
		return $_SERVER['SERVER_NAME'];
	}

	public static function getRootRealPath(){
		return dirname(dirname(dirname(dirname(dirname(__FILE__)))));
	}

}