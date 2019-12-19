<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>	当前控制方式为: <font color="red" > <?php echo ($currentWay); ?> </font> </p> 


	<p>修改操作Docker方式(完成后,自行刷新)</p>
	<form  action="<?php echo U('Docker/dockerController');?>" method="post">
		<select name="value">
		  <option value="DockerApi" <?php echo ($currentWay== 'DockerApi' ? selected : ''); ?>  >DockerApi</option>
		  <option value="PythonSdk" <?php echo ($currentWay== 'PythonSdk' ? selected : ''); ?> >PythonSdk</option>
		</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="确定">
	</form>




</body>
</html>