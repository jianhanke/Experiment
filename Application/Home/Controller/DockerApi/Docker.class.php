<?php 

namespace Home\Controller\DockerApi;

class Docker(){

	$host =new \Home\Controller\Entity\Host();
	$hostName=$host->getHostName();
	private  $hostAndPort="http://$hostName:2375";

	public function showAllContainer(){

	}

}