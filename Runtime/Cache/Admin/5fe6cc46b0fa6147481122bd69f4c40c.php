<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
  <p>请选择基础镜像</p>
  <form action="<?php echo U('Docker/makeImage');?>"  method="post" target="_blank" >
      <select  name="systemType" >
          <option value="aa0f8f0efbde">Ubuntu18.04</option>
          <option value="aa0f8f0efbde">Ubuntu16.04</option>
      </select>  
      <br><br><br><br><br>

      <input type="submit" value="确定" >
  </form>


</body>
</html>