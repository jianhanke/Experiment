<?php 

namespace Common\Model;
use Think\Model;

class ChapterReportModel extends Model{
	
	public function find_RepoartPath_ById($id){

		return $this->field('upload_path')
					->find($id)['upload_path'];
	}

	public function add_Info($info){
		return $this->add($info);
	}

	public function save_Info($info){
		return $this->save($info);
	}

}