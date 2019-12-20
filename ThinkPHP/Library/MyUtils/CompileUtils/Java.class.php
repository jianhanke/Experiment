<?php 

namespace MyUtils\CompileUtils;

class Java extends AbstractCompile
{	
	protected $name="Java";
	public function __construct(){
		parent::__construct();
		$this->port=C('COMPILE_JAVA_PORT');
	}
}
