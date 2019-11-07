<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<p>	当前控制方式为: <font color="red" ><?php echo ($currentManner); ?></font> </p> 

	<form  action="<?php echo U('Docker/dockerController');?>" method="post">
		<select name="select">
		  <option value="DockerApi" <?php echo ($currentManner=='DockerApi' ? selected : ''); ?>  >DockerApi</option>
		  <option value="PythonSdk" <?php echo ($currentManner=='PythonSdk' ? selected : ''); ?> >PythonSdk</option>
		</select>
		<input type="submit" name="确定">
	</form>




</body>
</html>