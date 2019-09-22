<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>实验平台管理</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('Home/Index/index');?> ">前端首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo ($admin_name); ?></a></li>
                <li><a href="<?php echo U('Login/logout');?> ">退出 </a></li>
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
                    <a href="#"><i class="iconfont">&#xe641;</i>Docker管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Docker/showContainer');?>" target="iframe" ><i class="iconfont">&#xe660;</i>容器清单</a></li>
                        <li><a href="<?php echo U("Docker/handleContainer");?>" target="iframe"  ><i class="iconfont">&#xe602;</i>主机管理</a></li>
                        <li><a href="<?php echo U("Docker/showImage");?>" target="iframe"  ><i class="iconfont">&#xe602;</i>镜像管理</a></li>


                    </ul>
                </li>

                <li>
                    <a href="#"><i class="iconfont">&#xe603;</i>学生管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Student/showStudent');?>" target="iframe" ><i class="iconfont">&#xe61c;</i>学生信息</a></li>
                        <!-- <li><a href="#"><i class="iconfont">&#xe678;</i>实验管理</a></li> -->
                    </ul>
                </li>

                <li>
					<a href="#"><i class="iconfont">&#xe603;</i>主机管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Experiment/showExperiment');?>" target="iframe" ><i class="iconfont">&#xe61c;</i>实验信息</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="iconfont">&#xe603;</i>Excel</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Excel/showExcel');?>" target="iframe" ><i class="iconfont">&#xe61c;</i>Excel导入</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="iconfont">&#xe603;</i>课程管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Course/showCourse');?>" target="iframe" ><i class="iconfont">&#xe61c;</i>
                        所有课程</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap"  >
	
   	
       <iframe src="/Experiment/index.php/Admin/Index/home" name="iframe" scrolling="" width="100%" height="650px;" frameborder="0"></iframe>
 	
      
    </div>
    <!--/main-->
</div>
</body>
</html>