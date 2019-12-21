<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class CourseController extends BaseTeacherController{

	public function showMyCourse(){

		
		$info=D('CourseTeacher')->find_My_CourseId(Session('teacher_id'));
		$datas=D('Course')->show_MyCourse_Info($info);

		$teacherId=Session('teacher_id');
		for($i=0;$i<count($datas);$i++){
			$classIds=D('ViewCourseTeacherClass','Logic')->find_ClassId_ById($datas[$i]['cid'],$teacherId);
			$datas[$i]['classIds']=$classIds;
		}
		if(empty($datas)){
			// echo "<script>  javascript :history.back(-1); </script> ";
			echo "<script> alert('课程为空'); </script>";
		}

		$this->assign('datas',$datas);
		$this->display();
	}

	public function deleteChapterById($chapterId){
		$status=D('Chapter')->dedChapterById($chapterId);
		echo "<script> alert('删除成功'); </script>";
	}

	public function editCourseById($id){

		$experimentInfo=D('Experiment')->getAllDataIdName();	
		$info=D('Chapter')->find_Chapter_By_Course_Id($id);
		$this->assign('experimentInfo',$experimentInfo);
		$this->assign('id',$id);
		$this->assign('datas',$info);
		$this->display();
	}

	public function cancelCourseById($id){

		$teacherId=Session('teacher_id');
		$status=D('ViewCourseTeacherClass','Logic')->delTeacherToCourse($teacherId,$id);
		$this->redirect('Course/showMyCourse');
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
		        D('Chapter')->add_Video_By_Id($res['status']['savepath'].$res['status']['savename'],$chapter_id);
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
		         
		         D('Chapter')->add_WordPath_ById($res['status']['savepath'].$new_name.'.htm',$chapter_id);
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
			
			// $model=new \Teacher\Model\Class_teacherModel();
			$status=D('ClassTeacher')->add_Info(array('class_id'=>$post['class_id'],'teacher_id'=>$teacherId));

			// $model2=new \Teacher\Model\Course_classModel();

		   $status2=D('CourseClass')->add_Info(array('course_id'=>$post['course_id'],'class_id'=>$post['class_id']));
			
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
			
			$departments=D('Department')->show_AllDepartment_Info();
			
			$datas=D('Course')->show_Course_ById($courseId);
			$this->assign('datas',$datas);
			$this->assign('departments',$departments);
			$this->display();
		}
	}


	public function getCurrentGrade($id){

		$grades=D('ViewClassDepartment','Logic')->show_AllGrade_ById($id);

		$data=array('status'=>0,'city'=>$grades);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	// public function get_district($departmentId,$grade){
	public function getCurrentClass($departmentId,$grade){

		$condition=array('department_id'=>$departmentId,'grade'=>$grade,'teacher_id'=>Session('teacher_id'));

		
		$class=D('ViewClassDepartment','Logic')->show_NoneSlect_class($condition);
		
		$data=array('status'=>0,'district'=>$class);
		header("Content-type: application/json");
		exit(json_encode($data));
	}

	public function test01(){

		$condition=array('department_id'=>1,'grade'=>17,'teacher_id'=>Session('teacher_id'));

		
		$class=D('ViewClassDepartment','Logic')->show_NoneSlect_class($condition);
		echo $model->_sql();
		dump($class);
	}

	public function otherCourse(){
		
		$teacherId=Session('teacher_id');
		$myCourseIds=D('CourseTeacher')->find_My_CourseId($teacherId);
		
		$datas=D('Course')->none_myCourse($myCourseIds);	
		
		$this->assign('datas',$datas);
		$this->display();
	}

	public function relateMyCourse($courseId){

		$teacherId=Session('teacher_id');
		// $model=new \Teacher\Model\Course_teacherModel();
		$info=array('teacher_id'=>$teacherId,'course_id'=>$courseId);
		$status=D('CourseTeacher')->relate_To_MyCourse($info);
		if($status){
			$this->success('关联成功',U('Course/showMyCourse'));
		}else{
			$this->error('关联失败');
		}
	}

	public function showCourseById($courseId){
		
		$info=D('Chapter')->find_Chapter_By_Course_Id($courseId);
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
			$res=\MyUtils\FileUtils\UploadFile::addCoursePicture();
			if(!$res['status']) {                // 上传错误提示错误信息
		        $this->error($res['upload']->getError());
			}
		}catch(\Exception $e){
			$this->error('添加失败,图片上传错误');
		}
			$post['img']=$res['status']['savename'];
			
			$id=D('Course')->add_Info($post);

			$courseAndTeacher=array('course_id'=>$id,'teacher_id'=>Session('teacher_id'));

			$status=D('CourseTeacher')->add_Info($courseAndTeacher);

			if($status){
				$this->success('添加成功',U('Course/showMyCourse'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$info=D('Teacher')->show_Teacher();
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function downloadReportById($reportId){

			$path=D('ChapterReport')->find_RepoartPath_ById($reportId);
			$showname=array_pop(explode('/', $path));

			if(empty($path)){
				$this->error('下载失误');
			}

			 $filePath=C("SOURCE_UPLOAD_PATH").$path;
			 try{
		      	\Org\Net\Http::download($filePath, $showname);	
			 }catch(\Exception $e){
			 	echo "<script> alert('下载出错');  </script>";
			 	echo "<script>  javascript :history.back(-1); </script> ";
		    	exit();
			 }
	}


	public function courseToClassProgress($courseId,$classId){


		// $model=D('Student');
		// $stuDatas=$model->find_Student_WithReport($classId);
		
		$chapterInfo=D('Chapter')->find_Chapter_Info();

		$classInfo=D('ViewClassDepartment','Logic')->show_ClassInfo_ById($classId);
		$courseInfo=D('Course')->find_Course_ById($courseId);

		$this->assign('chapterInfo',$chapterInfo);
		$this->assign('courseInfo',$courseInfo);
		$this->assign('classInfo',$classInfo);
		// $this->assign('datas',$stuDatas);
		$this->display();
	}








}