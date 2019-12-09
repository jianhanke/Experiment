<?php 

namespace MyUtils\DockerUtils;


class NoVNC{
	
	public static function JumpUrlByIp($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
	}

	public function getUrlById($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		return "http://$hostName:6080/vnc.html?path=/websockify?token=host$ip_num";	
	}

}