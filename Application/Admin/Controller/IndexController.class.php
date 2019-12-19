<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class IndexController extends BaseAdminController{

	public function index(){
		
		$admin_name=session('admin_name');
		$this->assign('admin_name',$admin_name);
		$this->display();
	}
	public function test10(){

		$docker=\MyUtils\DockerUtils\DockerFactory::createControllerWay('Sd');
		dump($docker);
		$docker->seg();
		echo $docker->getName();

	}

	public function test11(){
		$dataName=C('DB_NAME');
        $sql="select column_name from information_schema.columns where table_name='student' and table_schema = '$dataName' ";
        $columnName=M('Student')->query($sql);
        dump($columnName);

        $result= array_reduce($columnName, function ($result, $value) {
			 return array_merge($result, array_values($value));
			}, array());
        
        $condition=array('like','%1%');
        $where=array();
        foreach ($result as $con ){
        	$where[$con]=$condition;
        }
        dump($where);
	}

	public function test12(){
		$datas=M('Student')->where(array('Sid'=>array('like','%1%')))->select();
		dump($datas);
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

	public function test02(){
		$where = array('like','%1%');
		$mail='hanke';
		$where['mail'] = array('like','%'."$mail".'%');
		dump($where);
		M('Student')->relation(true)->where($where)->select();
	}

}