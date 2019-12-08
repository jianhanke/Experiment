<?php 

namespace MyUtils\DockerUtils;

class Ssh{

	public static  function getSshUrl($ip){
		$hostName =  \MyUtils\HostUtils\Host::getHostName();
		$url="http://$hostName:8888/?hostname=$ip&username=root&password=MTIzNDU2";
		return $url;
	}

	public static function jumpSshUrlByIP($ip){
		$hostName =  \MyUtils\HostUtils\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:8888/?hostname=$ip&username=root&password=MTIzNDU2' </script> ";
	}

}