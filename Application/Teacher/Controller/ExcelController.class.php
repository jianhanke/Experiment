<?php 

namespace Teacher\Controller;
use Common\Controller\BaseTeacherController;

class ExcelController extends BaseTeacherController{


	public function uploadExcelAndInput($modelName){

        
            $upload= new \Think\Upload();
            $upload->rootPath = './Source/Excel/';  // ./ 代表 从.index开始算起
            $upload->exts=array('xlsx','xls');
            $info   =   $upload->uploadOne($_FILES['excelData']);
            if(!$info) {// 上传错误提示错误信息
                  $this->error($upload->getError());
            }else{      // 上传成功 获取上传文件信息
              $filePath=$upload->rootPath.$info['savepath'].$info['savename'];
              $ext=$info['ext'];
              try{
                $excel=new \Admin\Controller\Entity\Excel();
                $excel->inputExcel($modelName,$filePath,$ext);
                $this->success('导入成功');
              }catch(\Exception $e){
                $this->error('导入数据库出现错误');
              }
         }
	}
    
    public function outputExcel($modelName){
        $excel=new \Admin\Controller\Entity\Excel();
        $excel->outputExcel($modelName);
    }












}