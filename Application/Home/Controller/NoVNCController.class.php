<?php 

namespace Home\Controller;

class NoVNCController extends MyController{


	public function showNoVNC($ip_num){
		// dump($ip_num);
		$noVNC=new \Home\Controller\Entity\Host();
		$hostName=$noVNC->getHostName();

		$url='ws://'.$hostName.':6080/websockify?token=host'.$ip_num;
		
		$model=new \Home\Model\Docker_containerModel();
		$info=$model->find_Container_By_Ip($ip_num);
		$id=$info['id'];
		$myNote=$info['note'];
		$myNote=htmlspecialchars_decode(html_entity_decode($myNote));  //将html 解码
		
		
		if($info['doc']==Null){
			$info['doc']='2.htm';
		}

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