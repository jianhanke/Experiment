<?php 

namespace MyUtils\CompileUtils;

class Php extends AbstractCompile
{	
	protected $name="Php";
	public function __construct(){
		parent::__construct();
		$this->port=C('COMPILE_PHP_PORT');
	}
}
