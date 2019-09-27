<?php 

namespace Home\Controller\Entity;

class Ssh{


	public function getSshUrl($ip){
		$hostName =  \Home\Controller\Entity\Host::getHostName();
		$url="http://$hostName:8888/?hostname=$ip&username=root&password=MTIzNDU2";
		return $url;
	}

}