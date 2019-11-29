<?php 

namespace Teacher\Controller;
use Think\Controller;

class StudentController extends MyController{

	public function courseToClassProgress($courseId,$classId){


		// $model=D('Student');
		// $stuDatas=$model->find_Student_WithReport($classId);
		
		$model=D('Chapter');
		$chapterInfo=$model->find_Chapter_Info();
		$model2=new \Teacher\Model\View_classwithdepartmentModel();
		$classInfo=$model2->show_ClassInfo_ById($classId);

		$model3=D('Course');
		$courseInfo=$model3->find_Course_ById($courseId);

		$this->assign('chapterInfo',$chapterInfo);
		$this->assign('courseInfo',$courseInfo);
		$this->assign('classInfo',$classInfo);
		// $this->assign('datas',$stuDatas);
		$this->display();
	}


	public function showClassToStudent($classId){
		$model=D('Student');
		$datas=$model->show_Student_ById($classId);
		$this->assign('classId',$classId);
		$this->assign("datas",$datas);
		$this->display();
	}

	public function findStudentByLike(){  
		
		$model=D('Student');
		$search=I('post.search-sort');
		$keywords=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$info=$model->find_Student_By_Like($search,$keywords);
		$this->assign('datas',$info);
		$this->display('Student/showClassToStudent');
	}

	public function addClassToStudent(){

		if(IS_POST){
			$post=I('post.');
			$model=D('Student');
			$status=$model->addInfo($post);
			if($status){
				$this->success('添加成功',U('Student/showClassToStudent',array('classId'=>$post['Class_id'])));
			}else{
				$this->error('添加失败');
			}
		}else{
			$classId=I('get.classId');
			$this->assign('classId',$classId);
			$this->display();
		}
	}

}