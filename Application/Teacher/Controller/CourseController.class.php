<?php 

namespace Teacher\Controller;
use Think\Controller;

class CourseController extends MyController{

	public function showMyCourse(){

		$teacherId=Session('teacher_id');

		$model1=new \Teacher\Model\Course_infoModel();
		$model2=D('Course');
			
		$info=$model1->find_My_CourseId($teacherId);
		$datas=$model2->show_MyCourse_Info($info);

		$this->assign('datas',$datas);
		$this->display();
	}

	public function editCourseById($id){
		
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($id);

		$this->assign('id',$id);
		$this->assign('datas',$info);
		$this->display();

	}

	public function deleteCourseById($id){

		$teacherId=Session('teacher_id');

		$model=new \Teacher\Model\Course_infoModel();
		$model->delete_Course_By_Id($id,$teacherId);
		$this->redirect('Course/showMyCourse');
	}




}