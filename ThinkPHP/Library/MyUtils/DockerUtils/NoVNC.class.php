<?php 

namespace MyUtils\DockerUtils;


class NoVNC{
	
	public static function JumpUrlByIp($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
	}

	public static function jumpSshUrlByIP($ip){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:8888/?hostname=$ip&username=root&password=MTIzNDU2' </script> ";
	}

}