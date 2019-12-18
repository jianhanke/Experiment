<?php 

namespace MyUtils\DockerUtils;

class Ssh{

	public static  function getSshUrl($ip){
		$hostName =  \MyUtils\HostUtils\Host::getHostName();
		$port=C('WEB_SSH_PORT');
		$url="http://$hostName:$port/?hostname=$ip&username=root&password=MTIzNDU2";
		return $url;
	}

	public static function jumpSshUrlByIP($ip){
		$hostName =  \MyUtils\HostUtils\Host::getHostName();
		$port=C('WEB_SSH_PORT');
		echo "<script> top.location.href='http://$hostName:$port/?hostname=$ip&username=root&password=MTIzNDU2' </script> ";
	}

}