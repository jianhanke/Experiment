<?php 

namespace MyUtils\DockerUtils;

class DockerNull {
	const NAME='空对象';

	public function __call($method,$arg){
		
		echo "<script> alert('这是一个空的Docker控制方法') </script>";
	}

	public function getName(){
        return self::NAME;
    }
}