<?php 

/**
 * @return array 运行容器时的ip地址和,ip_num
 */
function getNewIp(){
		$ip_num=D('DockerContainer') ->find_Max_Ip();
		$ip_num=(int)$ip_num+1;
		$ip_prefix=(int)($ip_num/256);
		$ip_num=$ip_num%256;
		$ip='172.19.'.$ip_prefix.'.'.$ip_num;
		return array('ip'=>$ip,'ip_num'=>$ip_num);
}

/**
 * @return String 操控docker的方法
 */
function getControllerDockerWay(){
	$way=C('Api_Or_Sdk');
	return \MyUtils\DockerUtils\DockerFactory::createControllerWay($way);
}

/**
 * 获取和设置配置参数 支持批量定义
 * @param string Docker镜像id
 * @param String  运行容器执行hostnmae,
 * @param Stinrg  需要连接的容器
 * @return array 返回此容器的id,ip地址,和ip地址的指定ip_num;
 */
function runContainerById($image_id,$hostName=Null,$link_Container=Null){
	
	$ips=getNewIp();
	$ip=$ips['ip'];
	$container_id=getControllerDockerWay()->runContainerByIdIp($image_id,$ip,$hostName=$hostName,$link_Container=$link_Container);    //具体docker中 run -it 
	$info['container_id']=$container_id;
	$info['ip']=$ip;
	$info['ip_num']=$ips['ip_num'];
	return $info;
}


/**
 *  更新上传章节对应的Video
 * 	@param string 对应章节id
 *  @return bool
 */
function uploadChapterToVideo($chapter_id){


		$info=D('ViewCoursetochapter','Logic')->find_Chapter_Course($chapter_id);
		$savePath=$info['cname'].'/'.$info['name']."/";
		
		$res=\MyUtils\FileUtils\UploadFile::uploadChapterVideo($savePath,$info['id']);
		if(!$res['status']) {                   // 上传错误提示错误信息
		        // $thiss->error($res['upload']->getError());
				// $thiss->error('上传失败,文件错误');
			return false;
		}else{                                 // 上传成功 获取上传文件信息
		   $status=D('Chapter')->editDataVideo($res['status']['savepath'].$res['status']['savename'],$chapter_id);
		      if($status)
		        return true;
		       return false;
		} 
}
/**
 *  更新上传章节对应的Word,并且将其转换为Html格式
 * 	@param string 对应章节id
 *  @return bool
 */
function uploadChapterToWord($chapter_id){
		
		$info=D('ViewCoursetochapter','Logic')->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$uploadFile=new \MyUtils\FileUtils\UploadFile();
		$savePath=$course_name.'/'.$chapter_name."/";
		
		$res=$uploadFile->uploadChapterWord($savePath,$new_name);

		if(!$res){
			return false;
		}

	    $wordPath=C('SOURCE_CHAPTER_PATH').$res['status']['savepath'].$res['status']['savename'];
	    $htmPath=C('SOURCE_CHAPTER_PATH').$res['status']['savepath'].$new_name.'.htm';
		         
		$uploadFile->saveWordToHtm($wordPath,$htmPath);
       
		$status=D('Chapter')->editDataWord($res['status']['savepath'].$new_name.'.htm',$chapter_id);
		if(!$status){
			return false;
		}
		return true;
}

