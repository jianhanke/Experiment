<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class NoVNCController extends BaseHomeController{


	public function showNoVNC($ip_num){
		// dump($ip_num);
		
		$hostName=(new \MyUtils\DockerUtils\Host())->getHostName();

		$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
		
		$info=D('DockerContainer')->find_Container_By_Ip($ip_num);
		$id=$info['id'];
		$myNote=$info['note'];
		$chapterId=$info['to_chapter'];
		$ip=$info['ip'];
		$myNote=htmlspecialchars_decode(html_entity_decode($myNote));  //将html 解码
		
		$chapterInfo=D('Chapter')->find_ChapterInfo_ById($chapterId);


		$videoPath=$chapterInfo['video'];
		$docPath=$chapterInfo['doc'];
		
		$viewOnly=U("Home/NoVNC/showViewOnly/ip_num/$ip_num");
		$viewOnly=$hostName.$viewOnly;
		$showShareOperate=U("Home/NoVNC/showShareOperate/ip_num/$ip_num");
		$showShareOperate=$hostName.$showShareOperate;

		$sshUrl=(new \MyUtils\DockerUtils\Ssh())->getSshUrl($ip);

		$ceshiUrl=(new \MyUtils\DockerUtils\NoVNC())->getUrlById($ip_num);

		$this->assign('ceshiUrl',$ceshiUrl);
		$this->assign('sshUrl',$sshUrl);
		$this->assign('viewOnly',$viewOnly);
		$this->assign('shareOperate',$showShareOperate);
		$this->assign('ip_num',$ip_num);
		$this->assign('video',$videoPath);
		$this->assign('doc',$docPath);
		$this->assign('datas',$info);
		$this->assign('id',$id);
		$this->assign('myNote',$myNote);
		$this->assign('url',$url);
		$this->display('NoVNC/showNoVNC');
	}
	
	public function saveNote(){
		$myNote=I('post.myNote');
		$id=I('post.id');
		D('DockerContainer')->save_Note($id,$myNote);
	}

	public function showViewOnly($ip_num){
		
		$hostName=(new \MyUtils\DockerUtils\Host())->getHostName();

		$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
		$this->assign('url',$url);
		$this->display();
	}

	public function showShareOperate($ip_num){
		
		$hostName=(new \MyUtils\DockerUtils\Host())->getHostName();

		$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
		$this->assign('url',$url);
		$this->display();
	}
	public function ceshi(){
		$url='http://localhost:8888/?hostname=172.19.0.100&username=root&password=123456';
		// $this->
		
		$data=array('1','321','421');
		$this->assign('datas',$data);
		$this->display();
	}


}