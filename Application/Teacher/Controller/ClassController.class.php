<?php 

namespace Teacher\Controller;
use Think\Controller;

class ClassController extends MyController{

	public function showChapterToClassReport($chapterId,$classId){

		$model=D('Chapter');
		$data=$model->find_Student_WithReport($chapterId,$classId);
		// dump($data);
		$model2=D('Course');
		$courseInfo=$model2->find_Course_ByChapterId($chapterId);
		// dump($courseInfo);

		$model3=new \Teacher\Model\View_classwithdepartmentModel();
		$classInfo=$model3->show_ClassInfo_ById($classId);
		// dump($classInfo);
		
		$this->assign('classInfo',$classInfo);
		$this->assign('courseInfo',$courseInfo);
		$this->assign('datas',$data);
		$this->display();
	}

	

}