<?php 

function getNewIp(){

		$ip_num=D('DockerContainer') ->find_Max_Ip();
		$ip_num=(int)$ip_num+1;
		$ip_prefix=(int)($ip_num/256);
		$ip_num=$ip_num%256;
		$ip='172.19.'.$ip_prefix.'.'.$ip_num;
		return array('ip'=>$ip,'ip_num'=>$ip_num);
}

// function getDockerWay(){
// 	return D('WebConfig')->getValueByName('Api_Or_Sdk');
// }

