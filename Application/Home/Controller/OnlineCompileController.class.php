<?php 

namespace Home\Controller;


class OnlineCompileController extends MyController{

	public function showCompile(){

		$this->display();
	}

	public function startCompile(){

		$id=I('post.id');

		$myCode=I('post.myCode');

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
		dump ($out);
		
		if(!empty($out)){
			unlink($beforeFile);
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






}