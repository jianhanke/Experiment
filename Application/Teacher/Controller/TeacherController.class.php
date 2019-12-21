<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class TeacherController extends BaseTeacherController{

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

	public function showInfo($teacherId){

		$info=D('Teacher')->find_Info_ById($teacherId);
		$this->assign('datas',$info);
		$this->display();
	}

	public function modifyInfo($teacherId){
		if(IS_POST){
			$post=I('post.');
			$info=D('Teacher')->modify_Info($post);

			if($info !== false){
				$this->redirect("Teacher/showInfo",array('teacherId'=>$post['Tid']));
			}else{
				$this->error('修改失败');
			}
		}else{
			$info=D('Teacher')->find_Info_ById($teacherId);
			$this->assign('datas',$info);
			$this->display();
		}
	}

	public function modifyPwd(){

		if(IS_POST){
			$teacherId=Session('teacher_id');
			$post=I('post.');

			if($post['newPwd1']==$post['newPwd2']){
				$info['Tid']=$teacherId;
				$info['Tpwd']=md5($post['newPwd1']);
				$status=D('Teacher')->modify_Info($info);	
				if($status !== false){
					echo "<script> alert('修改成功');  </script>";
				}else{
					$this->error('修改失败');
				}

			}else{
				echo "<script> alert('密码不一致,请重新输入');  </script> ";
			}

		}
			$this->display();		
	}


	public function relateToMyCourse($courseId){

		$teacherId=Session('teacher_id');
		// $model=new \Teacher\Model\Course_teacherModel();
		$info=array('teacher_id'=>$teacherId,'course_id'=>$courseId);
		$status=D('CourseTeacher')->relate_To_MyCourse($info);
		if($status){
			$this->success('关联成功',U('Teacher/showMyCourse'));
		}else{
			$this->error('关联失败');
		}
	}

	public function relieveMyCourseById($id){

		$teacherId=Session('teacher_id');
		D('ViewCourseTeacherClass','Logic')->deleteTeacherToCourseClass($id,$teacherId);
		// $status=D('CourseTeacher')->delete_Course_By_Id($id,$teacherId);
		// $this->redirect('Teacher/showMyCourse');
	}




}