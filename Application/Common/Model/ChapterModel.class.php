<?php 

namespace Common\Model;
use Think\Model;

class ChapterModel extends Model{


	public function find_Chapter_By_Course_Id($id){

		return $this->where("to_course=$id")->select();
	}
	public function find_Image_By_id($id){
		return $this->field('to_image')
		 			 ->find($id)['to_image'];
	}

	public function add_Video_By_Id($videoName,$id){
			$this->video=$videoName;
			$this->where("id=$id")
				 ->save();
	}

	public function editDataVideo($videoName,$id){
		 $status=$this->save(array('video'=>$videoName,'id'=>$id));
		 if($status>=0)
		 	return true;
		 return false;
	}

	public function editDataWord($wordName,$id){
		 $status=$this->save(array('doc'=>$wordName,'id'=>$id));
		 if($status>=0)
		 	return true;
		 return false;
	}


	public function add_WordPath_ById($wordPath,$id){
		$this->doc=$wordPath;
		$this->where("id=$id")
				 ->save();
	}
	public function add_Info($data){
		return $this->add($data);
	}

	public function show_ALL_Field(){
		$sql="select column_name from information_schema.columns where table_name='chapter' and table_schema = 'experiment' ";
		return $this->query($sql);
	}
	public function show_All_Data(){
		return $this->select();
	}



	public function getChapterRelateInfo($courseId){
	  	return $this->field('t1.*,(select count(*) from chapter_report where chapter_id = t1.id ) as report_nums,
	 	                 (select count(*) from student_chapter where to_chapterid = t1.id ) as join_nums ')
					 ->table('chapter as t1')
					 ->where("t1.to_course=$courseId")
					 ->select();
	}

	public function find_Student_WithReport($classId,$chapterId){

		return $this->table('student as t1')
					->join("left join chapter_report as t2 on (t1.Sid=t2.student_id and t2.chapter_id=$chapterId)")
					->where("t1.Class_id=$classId")
					->select();
	}

	public function delChapterById($chapterId){
		return $this->delete($chapterId);
	}

	public function find_ChapterInfo_ById($chapterId){

		return $this->field('doc,video')
					->find($chapterId);
	}

	public function show_MyChapterInfo_ById($chapterId,$studentId){

		return $this->field('t1.*,t2.id as upload_id')
					->table('chapter as t1')
					->join("left join chapter_report as t2 on t1.id=t2.chapter_id and t2.student_id=$studentId")
					->where("t1.to_course=$chapterId ")
					->select();
	}


}