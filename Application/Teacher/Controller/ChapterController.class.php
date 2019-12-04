<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class ChapterController extends BaseTeacherController{

	public function ChapterRelateImage(){
		if(IS_POST){
			$post=I('post.');
			
			$data=D('ExperimentImage')->getAllImageIdById($post['to_imageId']);
			
			$chapterImageInfo=array();
			for($i=0;$i<count($data);$i++){
				$chapterImageInfo[$i]['to_imageId']=$data[$i];
				$chapterImageInfo[$i]['chapter_id']=$post['chapter_id'];
			}
			dump($chapterImageInfo);
			
			$status=D('ChapterImage')->addData($data);
			dump($status);
			
		}
	}

}