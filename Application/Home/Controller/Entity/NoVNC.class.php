<?php 

namespace Home\Controller\Entity;

class NoVNC{
	
	public static function JumpUrlByIp($ip_num){
		$hostName =  \Home\Controller\Entity\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
	}

}