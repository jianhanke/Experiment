<?php 

namespace MyUtils\DockerUtils;

class DockerNull {

	public function __call($method,$arg){
		echo $method;
		dump($arg);
		echo "<script> alert('这是一个空的Docker控制方法') </script>";
	}
}