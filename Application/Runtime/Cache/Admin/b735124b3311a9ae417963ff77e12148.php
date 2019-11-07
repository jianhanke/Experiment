<?php if (!defined('THINK_PATH')) exit();?>
<!-- 	
<form action="<?php echo U('Admin/Excel/uploadExcel');?> " method="post" enctype="multipart/form-data">
   <h2>上传Excel文件,请先下载格式，</h2>
   <input type="file" name="excelData">
   <button type="submit">提交</button>

</form>
 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>
    
        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>表</th>
                        <th>Excel导入</th>
                        <th>导出Excel</th>
                        
                        
                    </tr>
                 	
                    <tr>
                        <td> Chapter  </td>
                        
                        <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/Chapter');?> " method="post" enctype="multipart/form-data">
								   <input type="file" name="excelData">
								   <button type="submit">提交</button>
								</form> </td>
						<td> <a href="<?php echo U('Admin/Excel/outputExcel/modelName/Chapter');?> ">导出</a>   </td>
                        
                    </tr>
                    <tr>
                        <td> Admin  </td>
                        
                        <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/Admin');?> " method="post" enctype="multipart/form-data">
								   <input type="file" name="excelData">
								   <button type="submit">提交</button>
								</form> </td>
						<td> <a href="<?php echo U('Admin/Excel/outputExcel/modelName/Admin');?> ">导出</a>   </td>
                        
                    </tr>
                    <tr>
                        <td> Course  </td>
                        
                        <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/Course');?> " method="post" enctype="multipart/form-data">
								   <input type="file" name="excelData">
								   <button type="submit">提交</button>
								</form> </td>
						<td> <a href="<?php echo U('Admin/Excel/outputExcel/modelName/Course');?> ">导出</a>   </td>
                        
                    </tr>
             
                    <tr>
                        <td> Experiment  </td>
                        
                        <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/Experiment');?> " method="post" enctype="multipart/form-data">
								   <input type="file" name="excelData">
								   <button type="submit">提交</button>
								</form> </td>
						<td> <a href="<?php echo U('Admin/Excel/outputExcel/modelName/Experiment');?> ">导出</a>   </td>
                    </tr>
                    <tr>
                        <td> Docker_image  </td>
                        
                        <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/Docker_image');?> " method="post" enctype="multipart/form-data">
								   <input type="file" name="excelData">
								   <button type="submit">提交</button>
								</form> </td>
						<td> <a href="<?php echo U('Admin/Excel/outputExcel/modelName/Docker_image');?> ">导出</a>   </td>
                        
                    </tr>
                    <tr>
                        <td> Docker_container  </td>
                        
                        <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/Docker_container');?> " method="post" enctype="multipart/form-data">
								   <input type="file" name="excelData">
								   <button type="submit">提交</button>
								</form> </td>
						<td> <a href="<?php echo U('Admin/Excel/outputExcel/modelName/Docker_container');?> ">导出</a>   </td>
                        
                    </tr>

                 
                </table>
                <!-- <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div> -->
            </div>
        </div>
</body>
</html>