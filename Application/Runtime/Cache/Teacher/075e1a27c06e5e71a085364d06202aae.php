<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>教师端</title>
	<link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/admin_login.css"/>
</head>
<body>
<div class="admin_login_wrap">
    <h1>教师端</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="<?php echo U('Teacher/Login/login');?> " method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">账号：</label>
                        <input type="text" name="Tid" value="" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="Tpwd" value="" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" autofocus="autofocus"/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    </div>
</body>
</html>