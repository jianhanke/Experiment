<?php 

namespace MyUtils\CompileUtils;

class Python extends AbstractCompile
{	
	protected $name="Python3.7";
	public function __construct(){
		parent::__construct();
		$this->port=C('COMPILE_PYTHON_PORT');
	}
}
