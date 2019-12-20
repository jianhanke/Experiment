<?php 

namespace MyUtils\FileUtils;

 class  UploadFile {


 	public static function uploadReport($savepath,$new_name){
			$upload = new \Think\Upload();
			$upload->rootPath = C("SOURCE_UPLOAD_PATH");  // ./ 代表 项目的根目录
			$upload->savePath  = $savepath;
			$upload->exts      =     array('doc','docx');
			$upload->saveName = $new_name;
			$upload->replace=true;
			$upload->autoSub  = false;    //禁止上传时候的时间目录
			$info   =   $upload->uploadOne($_FILES['file']);
			return array('status'=>$info,'upload'=>$upload);
	}



 	public static  function addCoursePicture(){

 		$upload = new \Think\Upload();
		$upload->rootPath = C('SOURCE_COURSE_PATH');  // ./ 代表 项目的根目录
		$upload->exts      =     array('png','jpeg','jpg');
		$upload->maxSize= 10*1024*1024;
		$upload->replace=true;
		// $upload->saveName= 重命名，但是没有id所以，重命名也没办法
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$status=   $upload->uploadOne($_FILES['img']);

		return array('status'=>$status,'upload'=>$upload);
 	}


 	public static function uploadChapterVideo($savePath,$new_name){

	
		$upload = new \Think\Upload();
		$upload->rootPath =C('SOURCE_CHAPTER_PATH')  ;  // ./ 代表 项目的根目录
		$upload->savePath  = $savePath ;
		$upload->exts      =     array('avi','wmv','mpeg','mp4');
		$upload->maxSize= 50*1024*1024;
		$upload->saveName = $new_name;
		$upload->replace=true;
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$status  =   $upload->uploadOne($_FILES['video']);

		$result=array('status'=>$status,'upload'=>$upload);
		return $result;
	}

	public static function uploadChapterWord($savePath,$new_name){
		
		$upload = new \Think\Upload();
		$upload->rootPath = C('SOURCE_CHAPTER_PATH');  // ./ 代表 项目的根目录
		$upload->savePath  = $savePath;
		$upload->exts      =     array('docx');
		$upload->saveName = $new_name;
		$upload->replace=true;
		$upload->maxSize= 10*1024*1024;
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$status   =   $upload->uploadOne($_FILES['word']);

		$res=array('status'=>$status,'upload'=>$upload);
		return 	$res;
	}
	public static function saveWordToHtm($wordPath,$htmPath){
		
		vendor('PHPOffice.autoload');

		$phpWord = \PhpOffice\PhpWord\IOFactory::load($wordPath);
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML");
		$xmlWriter->save($htmPath);
	}


 }