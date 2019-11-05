<?php 

namespace Home\Controller\Entity;

class DockerApi{

   public $hostAndPort=null;

	public function __construct(){
		$hostName =  \Home\Controller\Entity\Host::getHostName();
		$this->hostAndPort="http://$hostName:2375";
	}

	

	public function getJsonInfoByApi($params,$method='get',$data=Null,$type='form-data'){

		
		$url=$this->hostAndPort."$params";
		// dump($url);
		
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

        // dump($result);
        return $result;

	}

	// public function showAllImage(){

 //       	$info=$this->getJsonInfoByApi("/images/json",'get');
 //    }
 //    public function showContainerById(){
 //    	$info=$this->getJsonInfoByApi("/containers/bbbfc08772ab/json",'get');
 //    }
 //    
 	 // public function showAllContainer(){
   //  	$info=$this->getJsonInfoByApi("/containers/json?all=true",'get');	
   //  }

    public function startContainerById($container_id){

    	$info=$this->getJsonInfoByApi("/containers/$container_id/start",'post');

    }

    public function stopContainerById($container_id){

    	$info=$this->getJsonInfoByApi("/containers/$container_id/stop",'post');

    }

    public function deleteContainerById($container_id){
    	$data=['force'=>true,'v'=>true];
    	$info=$this->getJsonInfoByApi("/containers/$container_id?force=true?link=true?v=true",'delete',$data);
    }

    public function runContainerByIdIp($image_id,$ip){
    	$data=['Image'=>"$image_id",'NetworkingConfig'=>['EndpointsConfig'=>['myNet'=>['IPAMConfig'=>['IPv4Address'=>"$ip"]]]]];
    	$data = json_encode($data);
    	// dump($data);
		$info=$this->getJsonInfoByApi("/containers/create",'post',$data,'json');
        // dump($info);
		$containerId=substr($info['Id'], 0,10);
        // dump($containerId);
		$this->startContainerById($containerId);
        return $containerId;
    }

    public function restartContainerById($container_id){
    	$info=$this->getJsonInfoByApi("/containers/$container_id/restart",'post');
    }


    public function commitContainerById($container_id){

        $data=['container'=>"$container_id"];
        $data = json_encode($data);

        $info=$this->getJsonInfoByApi("/commit?container=$container_id",'post',$data,'json');
        
        $image_id=str_replace("sha256:","",$info['Id']);
        
        $image_id=substr($image_id, 0,12);  //从0开始截取12个
        
        return $image_id;
    }

    public function getNewIp(){

		$model=new \Home\Model\Docker_containerModel();
		$ip_num=$model->find_Max_Ip();
		$ip_num=(int)$ip_num+1;
		$ip_prefix=(int)($ip_num/256);
		$ip_num=$ip_num%256;
		$ip='172.19.'.$ip_prefix.'.'.$ip_num;
		return array('ip'=>$ip,'ip_num'=>$ip_num);
	}

}