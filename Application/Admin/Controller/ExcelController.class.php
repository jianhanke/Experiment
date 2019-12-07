<?php 

namespace Admin\Controller;
use Common\Controller\BaseAdminController;

class ExcelController extends BaseAdminController{


	public function showExcel(){
        $model=D('Docker_container');
        $sql="select table_name from information_schema.tables where table_schema='experiment'";
        $info=$model->query($sql);
		$this->assign('datas',$info);
		$this->display();
	}

    

	public function uploadExcelAndInput($modelName){

            dump($modelName);
        
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
                $excel=new \MyUtils\FileUtils\Excel();
                $excel->inputExcel($modelName,$filePath,$ext);
                $this->success('导入成功');
              }catch(\Exception $e){
                $this->error('导入数据库出现错误');
              }
         }
   

	}
    

	


    public function outputExcel($modelName){
        $excel=new \MyUtils\FileUtils\Excel();
        $excel->outputExcel($modelName);
    }

        public function importDatabase($filename,$exts){
        vendor('PHPExcel.PHPExcel');

        $PHPExcel=new \PHPExcel();
        $PHPReader=null;
        if($exts=='xls'){
            Vendor('PHPExcel.PHPExcel.Reader.Excel5');
            $PHPReader=new \PHPExcel_Reader_Excel5();
        }else if($exts=='xlsx'){
            Vendor('PHPExcel.PHPExcel.Reader.Excel2007');
            $PHPReader=new \PHPExcel_Reader_Excel2007();
        }

        $PHPExcel=$PHPReader->load($filename);
        $currentSheet=$PHPExcel->getSheet(0);
        $allRow=$currentSheet->getHighestRow();
        $cellName=array(
            array('A','Sid'),
            array('B','Sname'),
            array('C','Sage'),
            array('D','Ssex'),
            array('E','Stele'),
            array('F','Spwd'),
         );
        $cellNum=count($cellName);

        for($i=2;$i<=$allRow;$i++){
            for($j=0;$j<$cellNum;$j++){
        $data[$cellName[$j][1]]=$PHPExcel->getActiveSheet(0)->getCell($cellName[$j][0].$i )->getValue();
            
            }
            $this->addStudent($data);
        }

    }










}