<?php 

namespace Home\Controller;
use Think\Controller;

class DockerApiController extends MyController{

    public function ceshi(){
        $dockerApi=new \Home\Controller\Entity\DockerApi();
        $dockerApi->runContainerByIdIp("950cddbcac8d","172.19.0.100");
    }

	public function getJsonInfoByApi($params,$method='get',$data=Null,$type='form-data'){

		$hostName =  \Home\Controller\Entity\Host::getHostName();
		$url="http://$hostName:2375$params";
		echo $url;
        
        $ch = curl_init();
        $headers = [
        'form-data' => ['Content-Type: multipart/form-data'],
        'json'      => ['Content-Type: application/json'],
    	];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers[$type]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        if($method=='get'){

        }else if($method=='post'){
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }else if($method=='delete'){
        	dump($data);
        	curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        	curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        }else if($method=='put'){
        	curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        }else{
        	$this->error("method错误");
        }
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);

        dump($result);
        return $result;

	}

	public function showAllImage(){

       	$info=$this->getJsonInfoByApi("/images/json",'get');
    }
    public function showContainerById(){
    	$info=$this->getJsonInfoByApi("/containers/bbbfc08772ab/json",'get');
    }

    public function startContainerById($containerId){

    	$info=$this->getJsonInfoByApi("/containers/$containerId/start",'post');

    }

    public function stopContainerById(){

    	$info=$this->getJsonInfoByApi("/containers/de0a0be85cb5/stop",'post');

    }

    public function deleteContainerById(){
    	$data=['force'=>true,'link'=>true,'v'=>true,];
    	$info=$this->getJsonInfoByApi("/containers/6b8052300208?force=true?link=true?v=true",'delete',$data);
    }
    public function showAllContainer(){
    	$info=$this->getJsonInfoByApi("/containers/json?all=true",'get');	
    }


    public  function runContainerById(){
    	$data=['Image'=>"950cddbcac8d",'NetworkingConfig'=>['EndpointsConfig'=>['myNet'=>['IPAMConfig'=>['IPv4Address'=>'172.19.0.100']]]]];
    	$data = json_encode($data);
    	dump($data);
		$info=$this->getJsonInfoByApi("/containers/create",'post',$data,'json');
		$containerId=$info['Id'];
		$this->startContainerById($containerId);
		return $containerId;
    }






}