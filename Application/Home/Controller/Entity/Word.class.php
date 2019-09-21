<?php 

namespace Home\Controller\Entity;

class Word{

	public function saveWordToHtm($wordPath,$htmPath){

		$controller_path=dirname(dirname(__FILE__)).'/Py/saveHtm.py';
		dump($wordPath);
		dump($htmPath);
		
		$controller_path=str_replace('\\',"/",$controller_path);
		dump($controller_path);

		exec("G:/python-3.7.2/python.exe  $controller_path  2>&1",$result,$info  );
		for($i=0;$i<count($result);$i++){
			dump($result[$i]);
		}
		dump($info);
	}

}