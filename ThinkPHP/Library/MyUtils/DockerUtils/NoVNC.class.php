<?php 

namespace MyUtils\DockerUtils;


class NoVNC{
	
	public static function JumpUrlByIp($ip_num){

		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('NOVNC_PORT');
		echo "<script> top.location.href='http://$hostName:$port/vnc.html?path=/websockify?token=host$ip_num' </script> ";
	}

	public static function getUrlById($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('NOVNC_PORT');
		return "http://$hostName:$port/vnc.html?path=/websockify?token=host$ip_num";	
	}

	public static function getWsUrlByIp($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$port=C('NOVNC_PORT');
		return "ws://$hostName:$port/websockify?token=host$ip_num";
	}
	
	public static function getOnlyViewUrl($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$viewOnly=U("Home/NoVNC/showOnlyView/ip_num/$ip_num");

		return $hostName.$viewOnly;
	}

	public static function getShareOperateUrl($ip_num){
		$hostName = \MyUtils\HostUtils\Host::getHostName();
		$showShareOperate=U("Home/NoVNC/showShareOperate/ip_num/$ip_num");
		return $hostName.$showShareOperate;
	}
	

	

}