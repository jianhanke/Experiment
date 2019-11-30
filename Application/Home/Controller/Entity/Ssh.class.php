<?php 

namespace Home\Controller\Entity;

class Ssh{


	public static  function getSshUrl($ip){
		$hostName =  \Home\Controller\Entity\Host::getHostName();
		$url="http://$hostName:8888/?hostname=$ip&username=root&password=MTIzNDU2";
		return $url;
	}

	public static function jumpSshUrlByIP($ip){
		$hostName =  \Home\Controller\Entity\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:8888/?hostname=$ip&username=root&password=MTIzNDU2' </script> ";
	}

}