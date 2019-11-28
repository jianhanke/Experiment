<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>用户登录首页</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/Experiment5/Public/Home/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/Experiment5/Public/Home/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/Experiment5/Public/Home/css/app.css" type="text/css" />
</head>
<body background="/Experiment5/Public/Home/images/bodybg.jpg">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp ">
    <div class="container aside-xl" style="margin-top: 48px;">
        <a class="navbar-brand block"><span class="h1 font-bold" style="">软件技术虚拟在线实验平台</span></a>
        <section class="m-b-lg">
            <header class="wrapper text-center">
                <strong class="text-sucess">欢迎登录</strong>
            </header>
            
            <form action="/Experiment5/index.php/Home/Login/checkLogin" method="post" >
                <div class="form-group">
                    <input type="username" name="Sid" placeholder="用户名" class="form-control  input-lg text-center no-border" style="width: 400px;margin-left:-10%">
                </div>
                <div class="form-group">
                    <input type="password" name="Spwd" placeholder="密码" class="form-control  input-lg text-center no-border" id="passwork_text" style="width: 400px;margin-left:-10%">
                </div>
                <button type="submit" class="btn btn-lg btn-danger lt b-white b-2x btn-block" id="validate-submit" style="width: 400px;margin-left:-10%">
                    
                    <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg" onblur="if(this.value==''){document.getElementById('passwork_text').style,display='block';this.style.display='none'};" >登录</span></button>
            </form>
        </section>
        </form>
    </div>
</section>

<footer id="footer">
    <div class="text-center padder">

    </div>
</footer>
<!-- / footer -->
<br><br><br><br><br><br><br><br><br><br><br><br>
<div style="text-align:center;">
<p>版权|Data团队制作 2019</p>

</div>
</body>
</html>