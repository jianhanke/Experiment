<?php 


namespace MyUtils\HostUtils;

class Host{

	public static function getHostName(){
		return $_SERVER['SERVER_NAME'];
	}

	public static function getRootRealPath(){
		return $_SERVER['DOCUMENT_ROOT'].__ROOT__;
	}

}