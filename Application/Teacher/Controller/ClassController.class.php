<?php 

namespace Teacher\Controller;
use Think\Controller;

class ClassController extends MyController{


	public function showMyClass(){

		$teacher_id=Session('teacher_id');
		$model2=new \Teacher\Model\View_course_teacher_classModel();
		$datas=$model2->show_MyClass_Info($teacher_id);
		// dump($datas);
		// $model=new \Teacher\Model\Course_classModel();		
		// $classIds=$model->show_ClassId_ByCourseId(array('course_id'=>$courseId));
		// $this->assign('classIds',$classIds);
		$this->assign('datas',$datas);
		$this->display();
	}

	public function showChapterToClassReport($chapterId,$classId){

		$model=D('Chapter');
		$data=$model->find_Student_WithReport($chapterId,$classId);
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
		$this->display('Class/showClassToStudent');
	}

	public function addClassToStudent(){

		if(IS_POST){
			$post=I('post.');
			$model=D('Student');
			$status=$model->addInfo($post);
			if($status){
				$this->success('添加成功',U('Class/showClassToStudent',array('classId'=>$post['Class_id'])));
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