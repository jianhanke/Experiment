<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class IndexController extends BaseHomeController{

	public function index(){
		$user_id=session('user_id');
		$user_name=session('user_name');
		$this->assign('user_id',$user_id);
		$this->assign('user_name',$user_name);
		$this->display();
	}

	public function Test01(){
		$java=new \MyUtils\CompileUtils\Java();
		dump($java);
		$java=new \MyUtils\CompileUtils\Php();
		dump($java);
		$java=new \MyUtils\CompileUtils\C();
		dump($java);
		$java=new \MyUtils\CompileUtils\Python();
		dump($java);

		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\Python());
		// dump($serviceUrl->getUrl());


		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\Java());
		// dump($serviceUrl->getUrl());

		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\Php());
		// dump($serviceUrl->getUrl());

		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\C());
		// dump($serviceUrl->getUrl());

		$serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl();
		
		$serviceUrl->setDecoration(new \MyUtils\CompileUtils\OptionDecoration());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\C());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Java());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Php());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Python());
		dump($serviceUrl->getUrls());

		dump(new \MyUtils\CompileUtils\NullDecoration());
	}

}