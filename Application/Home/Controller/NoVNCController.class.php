<?php 

namespace Home\Controller;

class NoVNCController extends MyController{


	public function showNoVNC($ip_num){
		// dump($ip_num);
		$noVNC=new \Home\Controller\Entity\Host();
		$hostName=$noVNC->getHostName();

		$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
		
		$model=new \Home\Model\Docker_containerModel();
		$model2=D('Chapter');
		$model3=new \Home\Model\View_coursetochapterModel();


		$info=$model->find_Container_By_Ip($ip_num);
		$id=$info['id'];
		$myNote=$info['note'];
		$chapterId=$info['to_chapter'];
		$myNote=htmlspecialchars_decode(html_entity_decode($myNote));  //将html 解码
		
		$chapterInfo=$model2->find_ChapterInfo_ById($chapterId);
		// if($chapterInfochapterInfo['doc']==Null){
		// 	$chapterInfo['doc']='2.htm';
		// }
		$chapterPath=$model3->find_Chapter_Course($chapterId);
		$basePath=$chapterPath['cname'].'/'.$chapterPath['name'];
		$videoPath=$basePath.'/'.$chapterInfo['video'];
		$docPath=$basePath.'/'.$chapterInfo['doc'];
		dump($docPath);

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
		// dump($myNote);
		// dump($id);

		$model=new \Home\Model\Docker_containerModel();
		$model->save_Note($id,$myNote);
	}


}