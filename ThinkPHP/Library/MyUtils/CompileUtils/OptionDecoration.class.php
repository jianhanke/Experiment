<?php 

namespace MyUtils\CompileUtils;

class OptionDecoration implements InterfaceDecoration
{	
	public function setDecoration($url,$name){
		return "<option value='$url'> $name </option>";
	}
}