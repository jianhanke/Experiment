<?php 


namespace Home\Controller\Entity;

class Docker{

	/*
		docker run -d 运行一个新容器，返回容器id
	 */
	public function runContainerByIdIp($image_id,$ip){
		
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/runContainerById.py';
		$container_id=exec("/usr/bin/python $docker_path $image_id $ip");
		return $container_id;
	}
	public function ceshi(){
		$image_id='92f7bf669a99';
		$ip='172.19.0.100';
		$docker_path=dirname(__FILE__).'/ControllerDocker/runContainerById.py';
		$container_id=exec("/usr/bin/python $docker_path $image_id $ip");
		dump($container_id);
	}

	/**
	 * docker stop 
	 */
	public function stopContainerById($container_id){

		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/stopContainerById.py'; //关机
		exec("/usr/bin/python $docker_path $container_id");  
	}

	/*
		docker restart 
	 */
	public function restartContainerById($container_id){
	
		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/restartContainerById.py'; //重启
		exec("/usr/bin/python $docker_path $container_id");   
	}
	/*
		docker start ....  启动一个已经停止的容器
	 */
	public function startContainerById($container_id){

		$docker_path=dirname(dirname(__FILE__)).'/ControllerDocker/startContainerById.py';
		exec("/usr/bin/python $docker_path $container_id");   //启动
	}



	/**
	 * 得到一个新的ip地址,
	 */

	public function getNewIp(){

		$model=new \Home\Model\Docker_containerModel();

		$ip_num=$model->find_Max_Ip();
		$ip_num=(int)$ip_num+1;
		$ip_prefix=(int)($ip_num/256);
		$ip_num=$ip_num%256;
		$ip='172.19.'.$ip_prefix.'.'.$ip_num;
		return array('ip'=>$ip,'ip_num'=>$ip_num);
	}



	




}