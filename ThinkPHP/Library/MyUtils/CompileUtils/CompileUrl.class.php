<?php 

namespace MyUtils\CompileUtils;

class CompileUrl
{

	public static function getCUrl(){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('COMPILE_C_PORT');
		return "http://$hostName:$port/compile.php";
	}

	public static function getPhpUrl(){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('COMPILE_PHP_PORT');
		return "http://$hostName:$port/compile.php";
	}
	public static function getJavaUrl(){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('COMPILE_JAVA_PORT');
		return "http://$hostName:$port/compile.php";
	}
	public static function getPythonUrl(){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('COMPILE_PYTHON_PORT');
		return "http://$hostName:$port/compile.php";
	}

}
