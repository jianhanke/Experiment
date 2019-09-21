<?php 

namespace Admin\Controller\Entity;

class Word{

	public function saveWordToHtm($wordPath,$htmPath){

		$controller_path=dirname(dirname(__FILE__)).'/Py/saveHtm.py';
		dump($wordPath);
		dump($htmPath);
		
		$controller_path=str_replace('\\',"/",$controller_path);
		dump($controller_path);

		exec("/usr/bin/python  $controller_path  2>&1",$result,$info  );
		for($i=0;$i<count($result);$i++){
			dump($result[$i]);
		}
		dump($info);
	}

}