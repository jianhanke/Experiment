<?php 

namespace Common\Model;
use Think\Model;

class ChapterReportModel extends Model{
	
	public function find_RepoartPath_ById($id){

		return $this->field('upload_path')
					->find($id)['upload_path'];
	}

}