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
				$chapterImageInfo[$i]['Cid']=$post['chapter_id'];
			}
			D('ChapterImage')->delData(array('Cid'=>$post['chapter_id']));
			$status=D('ChapterImage')->addData($chapterImageInfo);
			if($status){
				echo "<script>  alert('添加成功') </script>";
			}else{
				echo "<script>  alert('添加失败') </script>";
			}

			$experimentInfo=D('Experiment')->getAllDataIdName();	
			$info=D('Chapter')->find_Chapter_By_Course_Id($post['courseId']);
			
			$this->assign('experimentInfo',$experimentInfo);
			$this->assign('id',$post['courseId']);
			$this->assign('datas',$info);
			$this->display('Course/editCourseById',array('id'=>$post['courseId']));
		}

	}

	


}