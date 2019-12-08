<?php 

$id='3131';
$docker_path=dirname(__FILE__).'\ControllerDocker\ceshi2.py';

exec("/usr/bin/python2.7 /var/www/html/Experiment/Application/Home/Controller/ControllerDocker/ceshiDocker.py 2>&1",$result,$info);

$infos=exec("/usr/bin/python /var/www/html/Experiment/Application/Home/Controller/ControllerDocker/ceshiDocker.py 2>&1");
var_dump($result);
var_dump($info);
var_dump($infos);
var_dump(strlen('<docker.client.DockerClient object at 0x7f5d83b3e490>'));


