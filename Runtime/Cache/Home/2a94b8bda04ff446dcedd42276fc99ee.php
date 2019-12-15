<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>数据实验平台</title>
</head>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
}


li a:hover {
    background-color: #111;
}
div{
  border: 0;
}

</style>
<body>
  <div style="height: 8%;  " >
  <ul>
    <li><a href="<?php echo U('Index/showExperiment');?>" target="iframe" >首页     </a></li>
    <!-- <li><a class="active"  href="<?php echo U('showCourse');?>" target="iframe">课程 </a></li> -->
    <!-- <li><a href="<?php echo U('Index/showExperiment');?>" target="iframe" >主机</a></li> -->
    <li><a href="<?php echo U('Index/showCourse');?>" target="iframe" >课程</a></li>
    <li><a href="<?php echo U('Index/showMyCourse');?> " target="iframe">我的课程</a></li>
    <li><a href="<?php echo U('Index/showMyExperiment');?>" target="iframe">我的主机</a></li>
    <li><a href="<?php echo U('OnlineCompile/showCompile');?> " target="iframe">在线编程</a></li>

   <li><a href="<?php echo U('Index/showStudentInfoById');?> " target="iframe">个人中心</a></li>
    <li><a href="#">用户:<?php echo ($user_name); ?> </a>  </li>
    <li>   <a href="<?php echo U('Login/logout');?> ">注销</a>       </li>
  </ul>
  </div>
   <div id="myIframe"  style="height: 89% "  >
        <iframe src="<?php echo U('Index/showExperiment');?> " name="iframe" scrolling="" width="100%" height="100%;" frameborder="0"></iframe>
    </div>
  
  

</body>
</html>