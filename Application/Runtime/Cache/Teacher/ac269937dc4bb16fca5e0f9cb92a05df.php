<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>员工管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">教师:<?php echo ($teacher_name); ?></a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="iconfont">&#xe641;</i>个人中心</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Teacher/showInfo');?>/teacherId/<?php echo ($teacher_id); ?>" target="iframe"><i class="iconfont">&#xe660;</i>个人中心</a></li>
                        <li><a href="<?php echo U('Teacher/modifyPwd');?>" target="iframe"><i class="iconfont">&#xe612;</i>修改密码</a></li>
                       <!--  <li><a href="design.html"><i class="iconfont">&#xe602;</i>部门管理</a></li>
                        <li><a href="design.html"><i class="iconfont">&#xe612;</i>用户管理</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="iconfont">&#xe603;</i>课程管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Course/showMyCourse');?>" target="iframe"><i class="iconfont">&#xe61c;</i>所带课程</a></li>
                        <li><a href="<?php echo U('Teacher/showMyClass');?>" target="iframe"><i class="iconfont">&#xe678;</i>所带班级</a></li>
                        <li><a href="<?php echo U('Course/otherCourse');?>" target="iframe"><i class="iconfont">&#xe61c;</i>其他课程</a></li>
                        <li><a href="system.html"><i class="iconfont">&#xe639;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    

     <div class="main-wrap"  >
    
       <iframe src="<?php echo U('Index/home');?> " name="iframe" scrolling="" width="100%" height="650px;" frameborder="0"></iframe>  
    </div>


</div>
</body>
</html>