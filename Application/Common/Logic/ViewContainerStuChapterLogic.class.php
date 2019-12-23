<?php 

namespace Common\Logic;
use Think\Model;

class ViewContainerStuChapterLogic  extends Model{

	public function getData($user_id,$chapter_id){
		$data= $this->where(array('stu_id'=>$user_id,'to_chapterid'=>$chapter_id))
					->select();
		if(count($data)==1){
				return $data[0];
			}
			return $data;
			
	}

}