<?php 

namespace MyUtils\CompileUtils;

class C extends AbstractCompile
{
	protected $name="C";
	public function __construct(){
		parent::__construct();
		$this->port=C('COMPILE_C_PORT');
	}
}
