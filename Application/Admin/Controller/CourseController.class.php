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
			$upload = new \Think\Upload();
			$upload->rootPath = './Public/Course/';  // ./ 代表 项目的根目录
			$upload->exts      =     array('png','jpeg','jpg');
			$upload->maxSize= 10*1024*1024;
			$upload->replace=true;
			// $upload->saveName= 重命名，但是没有id所以，重命名也没办法
			$upload->autoSub  = false;    //禁止上传时候的时间目录
			$pictureInfo   =   $upload->uploadOne($_FILES['img']);
			if(!$pictureInfo) {// 上传错误提示错误信息
		        $this->error($upload->getError());
			}
		}catch(\Exception $e){
				$this->error('添加失败,图片上传错误');
			}

			$post['img']=$pictureInfo['savename'];

			$model=D('Course');
			$info=$model->add_Info($post);
			if($info){
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

		$model=new \Home\Model\View_coursetochapterModel();
		$info=$model->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];
		$upload = new \Think\Upload();
		$upload->rootPath = './Course/';  // ./ 代表 项目的根目录
		$upload->savePath  = $course_name.'/'.$chapter_name."/";
		$upload->exts      =     array('avi','wmv','mpeg','mp4');
		$upload->maxSize= 50*1024*1024;
		$upload->saveName = $new_name;
		$upload->replace=true;
		$upload->autoSub  = false;    //禁止上传时候的时间目录
		$info   =   $upload->uploadOne($_FILES['video']);
		if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息
		         $model=D('Chapter');
		         $model->add_Video_By_Id($info['savepath'].$info['savename'],$chapter_id);
		         if(!empty(I('post.chapter_id'))){
					$this->success('上传成功');
				}
		} 

	}

	public function uploadWord($chapter_id){
		
		if(empty($chapter_id)){
			$chapter_id=I('post.chapter_id');	
		}
		
		$model=new \Home\Model\View_coursetochapterModel();
		$model2=D('Chapter');
		$info=$model->find_Chapter_Course($chapter_id);
		$course_name=$info['cname'];
		$chapter_name=$info['name'];
		$new_name=$info['id'];

		$upload = new \Think\Upload();
		$upload->rootPath = './Course/';  // ./ 代表 项目的根目录
		$upload->savePath  = $course_name.'/'.$chapter_name."/";
		$upload->exts      =     array('docx','doc');
		$upload->saveName = $new_name;
		$upload->replace=true;
		$upload->maxSize= 10*1024*1024;
		$upload->autoSub  = false;    //禁止上传时候的时间目录

		$host=new \Admin\Controller\Entity\Host();
		  $courseRealPath=$host-> getCourseRealPath();
		$info   =   $upload->uploadOne($_FILES['word']);
		

		if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息
		         // echo $info['savepath'].$info['savename'];
		         $wordPath=$courseRealPath.$info['savepath'].$info['savename'];
		         $htmPath=$courseRealPath.$info['savepath'].$new_name.'.htm';
		         // $wordPath=str_replace('\\',"/",$wordPath);
		         // $htmPath=str_replace('\\',"/",$htmPath);	
		         $this->saveWordToHtm($wordPath,$htmPath);
		         $model2->add_WordPath_ById($info['savepath'].$new_name.'.htm',$chapter_id);
		         if(!empty(I('post.chapter_id'))){
					$this->success('上传成功');
				}

		} 
	}
	public function saveWordToHtm($wordPath,$htmPath){
		vendor('PHPOffice.autoload');
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

		$wordPath='/var/www/html/Experiment/Course/MySql/MySql第一章节/1.docx';
		$htmPath='/var/www/html/Experiment/Course/MySql/MySql第一章节/1.htm';
		$phpWord =   \PhpOffice\PhpWord\IOFactory::load($wordPath);
		dump($phpWord);
		$xmlWriter =   \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML");
		dump($xmlWriter);
		// touch($htmPath);
		// chmod($htmPath, 0777);
		$xmlWriter->save($htmPath);
		echo "成功";
	}
	


	




}