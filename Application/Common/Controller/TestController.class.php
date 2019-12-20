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
	public function startCompile(){

		$id=I('post.id');

		$myCode=I('post.myCode');
		dump($myCode);

		$myCode=htmlspecialchars_decode(html_entity_decode($myCode));

		$myCode=str_replace("<p>","",$myCode);
		$myCode=str_replace("</p>","\n",$myCode);
		$myCode=str_replace("&nbsp; ",' ',$myCode);
		$myCode=str_replace("<br/>","\n",$myCode);
		$myCode=str_replace("&nbsp;"," ",$myCode);
		dump($myCode);

		$time=time();

		$rootPath="/ceshi/";
		$beforeFile=$rootPath.$id.'_'.$time.'.c';
		$afterFile=$rootPath.$id.'_'.$time;

		dump($beforeFile);
		dump($afterFile);


		$myfile = fopen("$beforeFile", "w");
		fwrite($myfile, $myCode);
		fclose($myfile);

		exec("gcc $beforeFile -o $afterFile 2>&1",$out,$status);
		for($i=0;$i<count($out);$i++){
			$out[$i]=str_replace("$beforeFile:","",$out[$i]);
		}
		
		if(!empty($out)){

			echo "不为空";
			dump ($out);
			unlink($beforeFile);
			unlink($afterFile);
			return 0;
		}
		exec("$afterFile  2>&1",$out2,$status2);
		dump($out2);
		unlink($beforeFile);
		unlink($afterFile);
		return 0;

	}
	public function ceshi(){

		$id=I('post.id');

		$ceshi=I('post.ceshi');
		dump($ceshi);


		$hidden=I('post.hidden');
		dump($hidden);

		dump($id);
		$myCode=I('post.myCode');

		$myCode=htmlspecialchars_decode(html_entity_decode($myCode));
		$hidden=htmlspecialchars_decode(html_entity_decode($hidden));


		$myCode=str_replace("<p>","",$myCode);
		$myCode=str_replace("</p>","\n",$myCode);
		$myCode=str_replace("&nbsp; ",' ',$myCode);
		$myCode=str_replace("<br/>","\n",$myCode);
		$myCode=str_replace("&nbsp;"," ",$myCode);
		// $myCode=str_replace("\\n","\\\n",$myCode);
		dump($myCode);

		$time=time();

		$rootPath="/ceshi/";
		$beforeFile=$rootPath.$id.'_'.$time.'.c';
		$afterFile=$rootPath.$id.'_'.$time;

		dump($beforeFile);
		dump($afterFile);

		exec("touch $beforeFile 2>&1",$out,$status);

		// dump("echo  '$myCode' >> $beforeFile");
		// $info="echo"." '$myCode' "." >> $beforeFile";
		// echo $info;

		$myfile = fopen("$beforeFile", "w");
		fwrite($myfile, $myCode);
		fclose($myfile);

		$myfile = fopen('/ceshi/testfile.txt', "w");
		fwrite($myfile, $hidden);
		fclose($myfile);





		// exec('echo  \'#include <stdio.h>
  //           int main() {
	 //        printf("Hello World !");
	 //        return 0;
  //            }\' >> '."$beforeFile 2>&1" ,$out,$status);
	

		// exec("gcc $beforeFile -o $afterFile 2>&1",$out,$status);
		// for($i=0;$i<count($out);$i++){
		// 	$out[$i]=str_replace("$beforeFile:","",$out[$i]);
		// }
		// dump ($out);
		
		// // exec("rm -rf $beforeFile");

		// if(!empty($out)){
		// 	return 0;
		// }
		// exec("$afterFile  2>&1",$out2,$status2);
		// dump($out2);
		

		// // exec("rm -rf $beforeFile $afterFile");
		// return 0;

	}

	public function Test01(){
		$java=new \MyUtils\CompileUtils\Java();
		dump($java);
		$java=new \MyUtils\CompileUtils\Php();
		dump($java);
		$java=new \MyUtils\CompileUtils\C();
		dump($java);
		$java=new \MyUtils\CompileUtils\Python();
		dump($java);

		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\Python());
		// dump($serviceUrl->getUrl());


		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\Java());
		// dump($serviceUrl->getUrl());

		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\Php());
		// dump($serviceUrl->getUrl());

		// $serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl(new \MyUtils\CompileUtils\C());
		// dump($serviceUrl->getUrl());

		$serviceUrl=new \MyUtils\CompileUtils\ServiceCompileUrl();
		
		$serviceUrl->setDecoration(new \MyUtils\CompileUtils\OptionDecoration());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\C());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Java());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Php());
		$serviceUrl->setCompile(new \MyUtils\CompileUtils\Python());
		dump($serviceUrl->getUrls());

		dump(new \MyUtils\CompileUtils\NullDecoration());
	}
	
}