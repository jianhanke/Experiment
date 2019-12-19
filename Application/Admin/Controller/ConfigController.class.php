<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class ConfigController extends BaseAdminController{

	public function updateConfigToFile(){
		D('WebConfig')->ConfigUpdateToFile();
	}


}