<?php

//直接修改数据库配置文件,无法正确运行,可以直接更改此配置信息(又出现脏数据),请在后台更改配置信息
//************************************************************************************
return array(
		'DOCKER_API_PORT'            => '2375' ,
		'Api_Or_Sdk'				 => 'DockerApi' ,
		'NOVNC_PORT'                 => '6080' ,
		'WEB_SSH_PORT'               => '8888' ,
		'COMPILE_C_PORT'             => '81'  ,
		'COMPILE_JAVA_PORT'          => '82' ,
		'COMPILE_PYTHON_PORT'        => '83',
		'COMPILE_PHP_PORT'           => '84',
		'SOURCE_UPLOAD_PATH'         => './Source/Uploads/',
		'SOURCE_CHAPTER_PATH'        => './Source/Uploads/',
		'SOURCE_COURSE_PATH'        =>  './Source/Course/',      
);