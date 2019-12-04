<?php 

namespace Teacher\Model;
use Think\Model;

class Chapter_reportModel extends Model{
	
	public function find_RepoartPath_ById($id){

		return $this->field('upload_path')
					->find($id)['upload_path'];
	}

}