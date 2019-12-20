<?php 

namespace MyUtils\CompileUtils;

class NullDecoration implements InterfaceDecoration
{	
	public function setDecoration($url,$name){
		return $url;
	}

}