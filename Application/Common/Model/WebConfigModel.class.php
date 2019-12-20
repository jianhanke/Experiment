<?php 

namespace Common\Model;
use Think\Model;

class WebConfigModel extends Model{


	public function getValueByName($name){
		return $this->field('value')
					->where(array('name'=>$name))
					->find()['value'];
	}

	public function getCount(){
		return $this->count();
	}


	public function editData($id,$value){
		return $this->where(array('id'=>$id))
					->save(array('value'=>$value));
	}

	public function addData($name,$value){
		return $this->add(array('name'=>$name,'value'=>$value));
	}

	public function getData($id){
		return $this->find()[0];
	}

	public function getDataAll(){
		return $this->select();
	}

	public function deleteData($id){
		return $this->delete($id);
	}

	public function ConfigUpdateToFile(){

	try{
		$config =   $this->getField('name,value');
		$strConfig="<?php

//直接修改数据库配置文件,无法正确运行,可以直接更改此配置信息(又出现脏数据),请在后台更改配置信息
//************************************************************************************
return array(
		'DOCKER_API_PORT'            => '{$config['DOCKER_API_PORT']}' ,
		'Api_Or_Sdk'				 => '{$config['Api_Or_Sdk']}' ,
		'NOVNC_PORT'                 => '{$config['NOVNC_PORT']}' ,
		'WEB_SSH_PORT'               => '{$config['WEB_SSH_PORT']}' ,
		'COMPILE_C_PORT'             => '{$config['COMPILE_C_PORT']}'  ,
		'COMPILE_JAVA_PORT'          => '{$config['COMPILE_JAVA_PORT']}' ,
		'COMPILE_PYTHON_PORT'        => '{$config['COMPILE_PYTHON_PORT']}',
		'COMPILE_PHP_PORT'           => '{$config['COMPILE_PHP_PORT']}',
		'SOURCE_UPLOAD_PATH'         => '{$config['SOURCE_UPLOAD_PATH']}',
		'SOURCE_CHAPTER_PATH'        => '{$config['SOURCE_UPLOAD_PATH']}',
		'SOURCE_COURSE_PATH'        =>  '{$config['SOURCE_COURSE_PATH']}',      
);";
		file_put_contents('./Application/Common/Conf/webconfig.php',$strConfig);
			return true;
		}catch(\Exception $e){
			return false;
		}

	}

}