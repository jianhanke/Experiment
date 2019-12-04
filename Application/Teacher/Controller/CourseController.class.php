<?php 

namespace Teacher\Controller;
use Think\Controller;

class CourseController extends MyController{

	public function showMyCourse(){

	
		$model1=new \Teacher\Model\Course_teacherModel();
		$model2=D('Course');
			
		$info=$model1->find_My_CourseId(Session('teacher_id'));
		$datas=$model2->show_MyCourse_Info($info);

		 
		$model3=new \Teacher\Model\View_course_teacher_classModel();
		
		$teacherId=Session('teacher_id');
		for($i=0;$i<count($datas);$i++){
			$classIds=$model3->find_ClassId_ById($datas[$i]['cid'],$teacherId);
			$datas[$i]['classIds']=$classIds;
		}
		if(empty($datas)){
			// echo "<script>  javascript :history.back(-1); </script> ";
			echo "<script> alert('课程为空');   </script>";
		}

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

	public function cancelCourseById($id){

		$teacherId=Session('teacher_id');

		// $model=new \Teacher\Model\Course_teacherModel();
		// $model->delete_Course_By_Id($id,$teacherId);
		$status=D('ViewCourseTeacherClass','Logic')->delTeacherToCourse(1,1);
		$this->redirect('Course/showMyCourse');
	}

	public function addChapter($to_course){
		
		if(IS_POST){
			$post=I('post.');
			$model=D('Chapter');
			$chapter_id=$model->add_Info($post);

			$model2=new \Teacher\Model\Chapter_imageModel();
			$chapterInfo=array('Cid'=>$chapter_id,'to_imageId'=>$post['to_image'],'to_imageName'=>Null);
			$model2->add_ChapterInfo($chapterInfo);

			$this->uploadVideo($chapter_id);
			$this->uploadWord($chapter_id);
			
			$this->success('添加成功',U("Course/editCourseById",array('id'=>$to_course)));
		}else{
			// $to_course=I('get.to_course');
			$model=D('Course');
			$courseName=$model->find_Course_Name($to_course);
			
			$model2=new \Teacher\Model\Make_imageModel();
			$data=$model2->show_All_Data();
			$this->assign('datas',$data);
			$this->assign('id',$to_course);
			$this->assign('courseName',$courseName);
			$this->display();	
		}
	}
	public function uploadVideo($chapter_id){

		
		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}	
	
		$model=new \Admin\Model\View_coursetochapterModel();
		$info=$model->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$uploadFile=new \Admin\Controller\Entity\UploadFile();
		$res=$uploadFile->uploadChapterVideo($course_name,$chapter_name,$new_name);


		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{   // 上传成功 获取上传文件信息
		        $model=D('Chapter');
		        $model->add_Video_By_Id($res['status']['savepath'].$res['status']['savename'],$chapter_id);
				$this->success('上传成功');
		} 
	}

	public function uploadWord($chapter_id){

		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}
		
		$model=new \Admin\Model\View_coursetochapterModel();
		$info=$model->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$uploadFile=new \Admin\Controller\Entity\UploadFile();
		$res=$uploadFile->uploadChapterWord($course_name,$chapter_name,$new_name);

		if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
		}else{// 上传成功 获取上传文件信息
		         $host=new \Admin\Controller\Entity\Host();
				 $courseRealPath=$host-> getRootRealPath().'/Source/Chapter/';

		         $wordPath=$courseRealPath.$res['status']['savepath'].$res['status']['savename'];
		         $htmPath=$courseRealPath.$res['status']['savepath'].$new_name.'.htm';
		         $uploadFile->saveWordToHtm($wordPath,$htmPath);
		         
		         $model2=D('Chapter');
		         $model2->add_WordPath_ById($res['status']['savepath'].$new_name.'.htm',$chapter_id);
				$this->success('上传成功');
		} 
	}

	public function courseRelateClass(){

		if(IS_POST){

			if(empty(I('post.class_id'))){
				echo "<script>  alert('填写不完整')  </script>";
				echo "<script>  javascript :history.back(-1); </script> ";
				exit();
			}
			
			$post=I('post.');

			dump($post);
			$teacherId=Session('teacher_id');

			$Model = M();
			$Model->startTrans();
			
			$model=new \Teacher\Model\Class_teacherModel();
			$status=$model->add_Info(array('class_id'=>$post['class_id'],'teacher_id'=>$teacherId));

			$model2=new \Teacher\Model\Course_classModel();
			$status2=$model2->add_Info(array('course_id'=>$post['course_id'],'class_id'=>$post['class_id']));
			
			if($status && $status2){
				$this->success('修改成功');
				$Model->commit();
			}else{
				$Model->rollback();
				$this->error('添加失败');
			}

			// if($status){
			// 	echo " <script> alert('关联成功');  </script>";
			// 	$courseId=$post['Cid'];
			// 	$model=D('Department');
			// 	$departments=$model->show_AllDepartment_Info();
			// 	$model2=D('Course');
			// 	$datas=$model2->show_Course_ById($courseId);
			// 	$this->assign('datas',$datas);
			// 	$this->assign('departments',$departments);
			// 	$this->display();

			// }else if($status==0){
			// 	$this->error('请勿重复关联',U('Course/courseRelateClass',array('courseId'=>$post['Cid'])));
			// }else{
			// 	$this->error('关联失败');
			// }
		}else{
			$courseId=I('get.courseId');
			$model=D('Department');
			$departments=$model->show_AllDepartment_Info();
			$model2=D('Course');
			$datas=$model2->show_Course_ById($courseId);
			$this->assign('datas',$datas);
			$this->assign('departments',$departments);
			$this->display();
		}
	}


	public function getCurrentGrade($id){
		
		$model=new \Teacher\Model\View_classwithdepartmentModel();
		$grades=$model->show_AllGrade_ById($id);

		$data=array('status'=>0,'city'=>$grades);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	// public function get_district($departmentId,$grade){
	public function getCurrentClass($departmentId,$grade){

		$condition=array('department_id'=>$departmentId,'grade'=>$grade,'teacher_id'=>Session('teacher_id'));

		$model=new \Teacher\Model\View_classwithdepartmentModel();
		$class=$model->show_NoneSlect_class($condition);
		
		$data=array('status'=>0,'district'=>$class);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	public function test01(){

		$condition=array('department_id'=>1,'grade'=>17,'teacher_id'=>Session('teacher_id'));

		$model=new \Teacher\Model\View_classwithdepartmentModel();
		$class=$model->show_NoneSlect_class($condition);
		echo $model->_sql();
		dump($class);
	}

	public function otherCourse(){
		
		$teacherId=Session('teacher_id');
		$model2=new \Teacher\Model\Course_teacherModel();
		$myCourseIds=$model2->find_My_CourseId($teacherId);
		
		$model=D('Course');
		$datas=$model->none_myCourse($myCourseIds);	
		
		$this->assign('datas',$datas);
		$this->display();
	}

	public function relateMyCourse($courseId){

		$teacherId=Session('teacher_id');
		$model=new \Teacher\Model\Course_teacherModel();
		$info=array('teacher_id'=>$teacherId,'course_id'=>$courseId);
		$status=$model->relate_To_MyCourse($info);
		if($status){
			$this->success('关联成功',U('Course/showMyCourse'));
		}else{
			$this->error('关联失败');
		}
	}

	public function showCourseById($courseId){
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($courseId);
		$this->assign('datas',$info);
		$this->display();
	}

	

	public function addCourse(){
		if(IS_POST){
			$post=I('post.');
			if( empty($post['cname']) or empty($post['introduce']) or empty($_FILES['img']['tmp_name']) ){
				$this->error('填写不完整',U('Course/addCourse'),2);
			}
		try{
			$uploadFile=new \Admin\Controller\Entity\UploadFile();
			$res=$uploadFile->addCoursePicture();
			if(!$res['status']) {                // 上传错误提示错误信息
		        $this->error($res['upload']->getError());
			}
		}catch(\Exception $e){
			$this->error('添加失败,图片上传错误');
		}
			$post['img']=$res['status']['savename'];
			$model=D('Course');
			dump($post);
			$id=$model->add_Info($post);

			$courseAndTeacher=array('course_id'=>$id,'teacher_id'=>Session('teacher_id'));

			$model2=new \Teacher\Model\Course_teacherModel();
			$status=$model2->add_Info($courseAndTeacher);

			if($status){
				$this->success('添加成功',U('Course/showMyCourse'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$model=D('Teacher');
			$info=$model->show_Teacher();
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function downloadMyReport($reportId){

			$model=new \Home\Model\Chapter_reportModel();
			$path=$model->find_RepoartPath_ById($reportId);

			$arr=explode('/', $path);
			$showname=array_pop($arr);

			if(empty($path)){
				$this->error('下载失误');
				
			}
			 $filePath="./Source/Uploads/".$path;

			 try{
			 	$Http = new \Org\Net\Http();
		      	$Http::download($filePath, $showname);	
			 }catch(\Exception $e){
			 	echo "<script> alert('下载出错');  </script>";
			 	echo "<script>  javascript :history.back(-1); </script> ";
		    	exit();
		   	 
			 }
	}


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








}