<?php 


namespace Admin\Controller\Entity;


 class  UploadFile {



 	public function addCoursePicture(){

 		$upload = new \Think\Upload();
		$upload->rootPath = './Source/Course/';  // ./ 代表 项目的根目录
		$upload->exts      =     array('png','jpeg','jpg');
		$upload->maxSize= 10*1024*1024;
		$upload->replace=true;
		// $upload->saveName= 重命名，但是没有id所以，重命名也没办法
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$status=   $upload->uploadOne($_FILES['img']);

		return array('status'=>$status,'upload'=>$upload);
 	}


 	public function uploadChapterVideo($course_name,$chapter_name,$new_name){

	
		$upload = new \Think\Upload();
		$upload->rootPath = './Source/Chapter/';  // ./ 代表 项目的根目录
		$upload->savePath  = $course_name.'/'.$chapter_name."/";
		$upload->exts      =     array('avi','wmv','mpeg','mp4');
		$upload->maxSize= 50*1024*1024;
		$upload->saveName = $new_name;
		$upload->replace=true;
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$status  =   $upload->uploadOne($_FILES['video']);

		$result=array('status'=>$status,'upload'=>$upload);
		return $result;
	}

	public function uploadChapterWord($course_name,$chapter_name,$new_name){
		
		$upload = new \Think\Upload();
		$upload->rootPath = './Source/Chapter/';  // ./ 代表 项目的根目录
		$upload->savePath  = $course_name.'/'.$chapter_name."/";
		$upload->exts      =     array('docx','doc');
		$upload->saveName = $new_name;
		$upload->replace=true;
		$upload->maxSize= 10*1024*1024;
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$status   =   $upload->uploadOne($_FILES['word']);

		$res=array('status'=>$status,'upload'=>$upload);
		return 	$res;
	}
	public function saveWordToHtm($wordPath,$htmPath){
		
		vendor('PHPOffice.autoload');

		$phpWord = \PhpOffice\PhpWord\IOFactory::load($wordPath);
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML");
		$xmlWriter->save($htmPath);
	}


 }