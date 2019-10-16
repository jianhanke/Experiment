<?php 

namespace Home\Controller;


class OnlineCompileController extends MyController{

	public function showCompile(){

		$this->display();
	}

	public function startCompile(){

		$id=I('post.id');
		dump($id);
		$myCode=I('post.myCode');
		dump($myCode);
		$myCode=htmlspecialchars_decode($myCode);

		echo $myCode;

		$time=time();
		dump($time);
		$rootPath="/ceshi/";
		$beforeFile=$rootPath.$id.'_'.$time.'.c';
		$afterFile=$rootPath.$id.'_'.$time;

		dump($beforeFile);
		dump($afterFile);

		exec("touch $beforeFile 2>&1",$out,$status);

		dump("echo  \"$myCode\" >> $beforeFile 2>&1");

		exec("echo  '$myCode' >> $beforeFile 2>&1" ,$out,$status);

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