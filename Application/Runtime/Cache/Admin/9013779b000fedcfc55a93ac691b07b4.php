<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<p>选择前端控制Docker的方式</p>

	<form  action="<?php echo U('Docker/dockerController');?>" >
		<select id="select">
		  <option value ="volvo">DockerApi</option>
		  <option value ="saab">PythonSdk</option>
		</select>
		<input type="submit" name="确定">
	</form>



</body>
</html>