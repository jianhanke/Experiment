<?php


return array(
	//'配置项'=>'配置值'
	'URL_MODEL'             => 1,
	// 'URL_DENY_SUFFIX' => 'html',  禁止指定伪静态
	'URL_HTML_SUFFIX' => '',         //指定伪静态为空
	'TMPL_PARSE_STRING' =>array(
		'__ADMINS__'    =>    'adminceefsdfs',
		'__DOCKER__'    =>    's',
	),
	define('CONTROLLER_DOCKER_PATH','hujing2'),
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'experiment',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_CHARSET'            =>  'utf8', 
    //'DB_PREFIX'             =>  '',    // 数据库表前缀
);