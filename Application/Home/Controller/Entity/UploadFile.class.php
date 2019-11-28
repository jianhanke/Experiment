<?php 

namespace Home\Controller\Entity;

class UploadFile{

		public function uploadReport($savepath,$new_name){
			$upload = new \Think\Upload();
			$upload->rootPath = './Source/Uploads/';  // ./ 代表 项目的根目录
			$upload->savePath  = $savepath;
			$upload->exts      =     array('doc','docx');
			$upload->saveName = $new_name;
			$upload->replace=true;
			$upload->autoSub  = false;    //禁止上传时候的时间目录
			$info   =   $upload->uploadOne($_FILES['file']);
			return array('status'=>$info,'upload'=>$upload);
		}

}