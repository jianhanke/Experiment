<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	 <form action="<?php echo U('Admin/Excel/uploadExcel');?> " method="post" enctype="multipart/form-data">
   
   <h2>上传Excel文件,请先下载格式，</h2>
   <input type="file" name="excelData">
   <button type="submit">提交</button>
   
   </form>

</body>
</html>