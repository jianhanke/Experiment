<?php 

namespace Home\Controller;
use \Common\Controller\BaseHomeController;

class NoVNCController extends BaseHomeController{


	public function showNoVNC($ip_num,$chapterId,$myNote){

		$info=D('DockerContainer')->find_Container_By_Ip($ip_num);
		
		
		$myNote=htmlspecialchars_decode(html_entity_decode($myNote));  //将html 解码
		
		$chapterInfo=D('Chapter')->find_ChapterInfo_ById($info['to_chapter']);

		$url=\MyUtils\DockerUtils\NoVNC::getWsUrlByIp($ip_num);
		$onlyView=\MyUtils\DockerUtils\NoVNC::getOnlyViewUrl($ip_num);
		$showShareOperate=\MyUtils\DockerUtils\NoVNC::getShareOperateUrl($ip_num);
		$sshUrl= \MyUtils\DockerUtils\Ssh::getSshUrl($info['ip']);
		$ceshiUrl= \MyUtils\DockerUtils\NoVNC::getUrlById($ip_num);

		$this->assign('ceshiUrl',$ceshiUrl);
		$this->assign('sshUrl',$sshUrl);
		$this->assign('onlyView',$onlyView);
		$this->assign('shareOperate',$showShareOperate);
		$this->assign('ip_num',$ip_num);
		$this->assign('video',$chapterInfo['video']);
		$this->assign('doc',$chapterInfo['doc']);
		$this->assign('chapterId',$chapterId);
		$this->assign('myNote',$myNote);
		$this->assign('url',$url);
		$this->display('NoVNC/showNoVNC');
	}
	


	public function showOnlyView($ip_num){
		
		$url= \MyUtils\DockerUtils\NoVNC::getWsUrlByIp($ip_num);
		$this->assign('url',$url);
		$this->display();
	}

	public function showShareOperate($ip_num){

		$url= \MyUtils\DockerUtils\NoVNC::getWsUrlByIp($ip_num);
		$this->assign('url',$url);
		$this->display();
	}


}