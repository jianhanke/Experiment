<?php 

namespace MyUtils\CompileUtils;

abstract class AbstractCompile
{
	protected $hostName;
	protected $port;
	protected $name;

	public function __construct(){
		$this->hostName=\MyUtils\HostUtils\Host::getHostName();
	}

	public function getHostName(){
		return $this->hostName;
	}
	public function getPort(){
		return $this->port;
	}

	public function getName(){
		return $this->name;
	}
}
