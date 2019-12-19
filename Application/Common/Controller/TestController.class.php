<?php 

namespace Common\Controller;
use Think\Controller;


class TestController extends Controller{


	
	/*  纯PHP上传文件
	public function uploadFile(){
		

		$student_id=session('user_id');

		$chapter_id=I('post.chapter_id');
		$postfix=strrchr($_FILES['file']['name'], '.');
		$uploadPath='E:/wamp/apache/library/Experiment/Public/Upload/';
		$new_name=$student_id.'_'.$chapter_id.$postfix;
		$newPath=$uploadPath.$new_name;
		$ROOT = $_SERVER['DOCUMENT_ROOT'];
		move_uploaded_file($_FILES['file']['tmp_name'],$newPath);
	}
		*/
	
}