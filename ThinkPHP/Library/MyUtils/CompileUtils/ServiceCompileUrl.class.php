<?php 

namespace MyUtils\CompileUtils;

class ServiceCompileUrl{

	private $compileTypes;
	private $decoration;

	public function __construct(){
		$this->decoration=new NullDecoration();
	}

	public function setDecoration($decoration){
		$this->decoration=$decoration;
	}

	public function setCompile($instance){
		$this->compileTypes[]=$instance;
	}

//************************************************************************************
	public  function getUrl(){
		$hostName=$this->compileTypes[0]->getHostName();
		$port=$this->compileTypes[0]->getPort();
		$name=$this->compileTypes[0]->getName();
		$url=$this->getSpecificUrl($hostName,$port);

		return $this->decoration->setDecoration($url,$name);
	}

	public function getUrls(){

		foreach ($this->compileTypes as $value) {
			$hostName=$value->getHostName();
			$port=$value->getPort();
			$name=$value->getName();
			$url=$this->getSpecificUrl($hostName,$port);
			$urls[]=$this->decoration->setDecoration($url,$name);
		}
		return $urls;
	}

	public  function getSpecificUrl($hostName,$port){
		return "http://$hostName:$port/compile.php";
	}

}