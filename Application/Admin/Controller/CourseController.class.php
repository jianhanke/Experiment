<?php 
namespace Admin\Controller;
use Think\Controller;
class CourseController extends MyController{

	public function showCourse(){
		$model=D('Course');
		$info=$model->show_All_Course();
		$this->assign('datas',$info);
		$this->display();
	}
	public function addCourse(){
		if(IS_POST){
			$post=I('post.');
			if( empty($post['cname']) or empty($post['introduce']) or empty($post['to_teacher_id']) or empty($_FILES['img']['tmp_name']) ){
				$this->error('填写不完整',U('Course/addCourse'),2);
			}
		try{
			$uploadFile=new \Admin\Controller\Entity\UploadFile();
			$res=$uploadFile->addCoursePicture();
			if(!$res['status']) {// 上传错误提示错误信息
		        $this->error($res['upload']->getError());
			}

		}catch(\Exception $e){
			$this->error('添加失败,图片上传错误');
		}
			$post['img']=$res['status']['savename'];
			$model=D('Course');
			$id=$model->add_Info($post);

			$courseInfo=array('Cid'=>$id,'Tid'=>$post['to_teacher_id']);
			$model2=new \Admin\Model\Course_infoModel();
			$model2->addCourseInfo($courseInfo);

			if($id){
				$this->success('添加成功',U('Course/showCourse'));
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
	public function deleteCourseById($id){
		$model=D('Course');
		$model->delete_Course_By_Id($id);
		$this->redirect('Course/showCourse');
	}
	public function showChapterImage(){
		$model=new \Admin\Model\Chapter_imageModel();
		$info=$model->show_Image();
		$count=$model->count_Num();
		$this->assign('count',$count);
		$this->assign('datas',$info);
		$this->display();
	}
	public function editCourseById(){
		$id=I('get.id');
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($id);
		$this->assign('id',$id);
		$this->assign('datas',$info);
		$this->display();
	}
	public function addChapter($to_course){
		
		if(IS_POST){
			$post=I('post.');
			$model=D('Chapter');
			$chapter_id=$model->add_Info($post);
			$this->uploadVideo($chapter_id);
			$this->uploadWord($chapter_id);
			$this->success('添加成功',U("Admin/Course/editCourseById/id/$to_course"));
		}else{
			// $to_course=I('get.to_course');
			$model=D('Course');
			$courseName=$model->find_Course_Name($to_course);
			$model2=D('Makeimage');
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
		}else{// 上传成功 获取上传文件信息
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
		         $model2->add_WordPath_ById($res['status'].$new_name.'.htm',$chapter_id);
		        
				$this->success('上传成功');
		} 
	}


	public function test01(){
		$wordPath= "/home/jianhanke/Experiment/Course/MySql/MySql第一章节/1.docx";
	    $htmPath=   "/home/jianhanke/Experiment/Course/MySql/MySql第一章节/1.htm";

	    vendor('PHPOffice.autoload');
		echo "试试";
		$phpWord = \PhpOffice\PhpWord\IOFactory::load($wordPath);
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML");
		$xmlWriter->save($htmPath);	    
	}

	  // 使用python脚本，将word转化为htm
	// public function saveWordToHtm($wordPath,$htmPath){
	// 	dump($wordPath);
	// 	dump($htmPath);
	// 	$word=new \Admin\Controller\Entity\Word();
	// 	$word->saveWordToHtm($wordPath,$htmPath);
	// }
	public function ceshi(){
		$wordPath='E:\wamp\apache\library\Experiment/Course/MySql/MySql第一章节/1.doc';
		$htmPath='E:\wamp\apache\library\Experiment/Course/MySql/MySql第一章节/1.htm';
		$word=new \Admin\Controller\Entity\Word();
		$word->saveWordToHtm($wordPath,$htmPath);	
	}
	public function ceshi2(){
		vendor('PHPOffice.autoload');
		$wordPath='E:\wamp\apache\library\Experiment\Course\MySql\MySql的第二章节\2.doc';
		$htmPath='E:\wamp\apache\library\Experiment\Course\MySql\MySql的第二章节\3.html';
		$phpWord =   \PhpOffice\PhpWord\IOFactory::load($wordPath);
		dump($phpWord);
		$xmlWriter =   \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML");
		dump($xmlWriter);
		// touch($htmPath);
		// chmod($htmPath, 0777);
		$xmlWriter->save($htmPath);
		echo "成功";
	}
	public function ceshi3(){
		$wordPath='E:\wamp\apache\library\Experiment\Course\MySql\MySql的第二章节\2.doc';
		$htmPath='E:\wamp\apache\library\Experiment\Course\MySql\MySql的第二章节\2.htm';
		$word = new COM("word.application") or die("Unable to instanciate Word");  
		 $word->Visible = 1;  
		 $word->Documents->Open($wordPath);  
		 $word->Documents[1]->SaveAs($htmPath,8);  
		 $word->Quit();  
		 $word = null;  
		 unset($word); 
	}
	
	
}