<?php 

namespace Admin\Controller;
use Think\Controller;

class ExcelController extends MyController{


	public function showExcel(){
		
		$this->display();
	}

	public function uploadExcel(){
		$upload= new \Think\Upload();

		$upload->rootPath = './Excel/';  // ./ 代表 项目的根目录
		$upload->exts=array('xlsx','xls');

		$info   =   $upload->uploadOne($_FILES['excelData']);
		if(!$info) {// 上传错误提示错误信息
		      $this->error($upload->getError());
		}else{      // 上传成功 获取上传文件信息

		      echo $info['savepath'].$info['savename'];
		      $filePath=$upload->rootPath.$info['savepath'].$info['savename'];
		      $ext=$info['ext'];
		      $this->importDatabase($filePath,$ext);

		 }
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
	public function addStudent($data){
		dump($data);
		$model=D('Student');
		$model->add_Student($data);
	}









}