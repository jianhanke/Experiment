<?php 

namespace Common\Model;
use Think\Model;

class WebConfigModel extends Model{


	public function getValueByName($name){
		return $this->field('value')
					->where(array('name'=>$name))
					->find()['value'];
	}

}