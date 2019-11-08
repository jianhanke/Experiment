<?php 


namespace Admin\Controller\Entity;

class Excel{

	public function outputExcel($modelName){
        vendor("PHPExcel.PHPExcel");
        $model=M($modelName);
        $fileName = $modelName.date('_Ymd_Hi');

        // $columnName=$model->show_ALL_Field();
        $sql="select column_name from information_schema.columns where table_name='$modelName' and table_schema = 'experiment' ";
        $columnName=$model->query($sql);


        $lowerColumnName=array();
        for($i=0;$i<count($columnName);$i++){
            $lowerColumnName[$i]=strtolower($columnName[$i]['column_name']);
        }

        // $data=$model->show_All_Data();
        $data=$model->select();

        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T');
        $objPHPExcel = new \PHPExcel();
        
        for($i=0;$i<count($columnName);$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $columnName[$i]['column_name']);
        }
        for($i=0;$i<count($data);$i++){
            for($j=0;$j<count($columnName);$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue( $cellName[$j].($i+2), $data[$i][$lowerColumnName[$j]]);
            }
        }
        // $objPHPExcel -> getActiveSheet() -> getColumnDimension('C') -> setAutoSize(true);  自动宽度，只对英文数字有效
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;');
        header("Content-Disposition:attachment;filename=$fileName.xls");
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function inputExcel($modelName,$filePath,$ext){

        vendor('PHPExcel.PHPExcel');
        
        $PHPExcel=new \PHPExcel();
        $PHPReader=null;
        if($ext=='xls'){
            Vendor('PHPExcel.PHPExcel.Reader.Excel5');
            $PHPReader=new \PHPExcel_Reader_Excel5();
        }else if($ext=='xlsx'){
            Vendor('PHPExcel.PHPExcel.Reader.Excel2007');
            $PHPReader=new \PHPExcel_Reader_Excel2007();
        }
        $PHPExcel=$PHPReader->load($filePath);
        $currentSheet=$PHPExcel->getSheet(0);
        $allRow=$currentSheet->getHighestRow();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T');
        $model=M($modelName);

        // $columnName=$model->show_ALL_Field();
        $sql="select column_name from information_schema.columns where table_name='$modelName' and table_schema = 'experiment' ";
        $columnName=$model->query($sql);


        $cellNum=count($columnName);
        for($i=2;$i<=$allRow;$i++){
            for($j=0;$j<$cellNum;$j++){
        $data[$columnName[$j]['column_name']]=$PHPExcel->getActiveSheet(0)->getCell($cellName[$j][0].$i )->getValue();
            }

            // $model->add_Info($data);
             $model->add($data);

        }
    }
}