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


	public function editCourseById(){

		$id=I('get.id');
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($id);
		// dump($info);
		$this->assign('datas',$info);
		$this->display();
	}

	public function uploadVideo(){
		$chapter_id=I('post.chapter_id');
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
		         echo $info['savepath'].$info['savename'];
		         $model=D('Chapter');
		         $model->add_Video_By_Id($info['savepath'].$info['savename'],$chapter_id);
		}   
	}

	public function uploadWord(){
		$chapter_id=I('post.chapter_id');
		dump($chapter_id);

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
		         echo $info['savepath'].$info['savename'];
		         $wordPath=$courseRealPath.$info['savepath'].$info['savename'];
		         $htmPath=$courseRealPath.$info['savepath'].$new_name.'.htm';
		         // $wordPath=str_replace('\\',"/",$wordPath);
		         // $htmPath=str_replace('\\',"/",$htmPath);	
		         $this->saveWordToHtm($wordPath,$htmPath);
		         $model2->add_WordPath_ById($info['savepath'].$new_name.'.htm',$chapter_id);
		} 
	}
	public function saveWordToHtm($wordPath,$htmPath){
		vendor('PHPOffice.autoload');
		dump($wordPath);
		dump($htmPath);
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