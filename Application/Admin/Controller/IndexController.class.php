<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class IndexController extends BaseAdminController{

	public function index(){
		
		$admin_name=session('admin_name');
		$this->assign('admin_name',$admin_name);
		$this->display();
	}

	public function test01(){
		echo $_SERVER['DOCUMENT_ROOT'].__ROOT__;
		$host=new \MyUtils\HostUtils\Host();
		echo $host->getHostName();

		$upload=new \MyUtils\FileUtils\UploadFile();
		$excel=new \MyUtils\FileUtils\Excel();
		dump($upload);

		dump($excel);

		$upload=new \MyUtils\DockerUtils\NoVNC();
		dump($upload);

		$upload=new \MyUtils\DockerUtils\SdkOrApi();
		dump($upload);


		$upload=new \MyUtils\DockerUtils\Docker();
		dump($upload);

	}

}