<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<title>用户登录</title>
<link href="/Experiment/Public/Home/css/Home_login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="login_box">
      <div class="login_l_img"><img src="/Experiment/Public/Home/images/login-img.png" /></div>
      <div class="login">
          <div class="login_logo"><a href="#"><img src="/Experiment/Public/Home/images/login_logo.png" /></a></div>
          <div class="login_name">
               <p>用户登录界面</p>
          </div>
          <form action="/Experiment/index.php/Home/Login/checkLogin" method="post">
            <input name="Sid" type="text"  value="用户名" onfocus="this.value=''" onblur="if(this.value==''){this.value='用户名'}">
              <span id="password_text" onclick="this.style.display='none';document.getElementById('password').style.display='block';document.getElementById('password').focus().select();" >密码</span>
        <input name="Spwd" type="password" id="password" style="display:none;" onblur="if(this.value==''){document.getElementById('password_text').style.display='block';this.style.display='none'};"/>
              <input value="登录" style="width:100%;" type="submit">
              <!-- <input type="submit" value="注册" onclick="window.open('register') " style="width:30%;float:right;color:green " >  -->
          </form>
      </div>
      
</div>
<div style="text-align:center;">

</div>
</body>
</html>