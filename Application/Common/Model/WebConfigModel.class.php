<?php 

namespace Common\Model;
use Think\Model;

class WebConfigModel extends Model{


	public function getValueByName($name){
		return $this->field('value')
					->where(array('name'=>$name))
					->find()['value'];
	}

	public function ConfigUpdateToFile(){
		$config =   $this->getField('name,value');
		
		$strConfig="<?php

//直接修改数据库配置文件,无法正确运行,可以直接更改此配置信息(又出现脏数据),请在后台更改配置信息
//************************************************************************************
return array(
		'Api_Or_Sdk'				 => '{$config['Api_Or_Sdk']}' ,
		'NOVNC_PORT'                 => '{$config['NOVNC_PORT']}' ,
		'WEB_SSH_PORT'               => '{$config['WEB_SSH_PORT']}' ,
		'COMPILE_C_PORT'             => '{$config['COMPILE_C_PORT']}'  ,
		'COMPILE_JAVA_PORT'          => '{$config['COMPILE_JAVA_PORT']}' ,
		'COMPILE_PYTHON_PORT'        => '{$config['COMPILE_PYTHON_PORT']}',
		'COMPILE_PHP_PORT'           => '{$config['COMPILE_PHP_PORT']}',
		'Test'                       => '{$config['Test01']}',
);";
		file_put_contents('./Application/Common/Conf/webconfig.php',$strConfig);

	}

}