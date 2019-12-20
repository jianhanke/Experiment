<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class OnlineCompileController extends BaseHomeController{

	public function showCompile(){

		$serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl();
		
		$serviceUrl->setDecoration(new \MyUtils\CompileUtils\OptionDecoration());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\C());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Java());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Php());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Python());
		$datas=$serviceUrl->getUrls();

		$this->assign('datas',$datas);
		$this->display();
	}


}