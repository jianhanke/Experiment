<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/Experiment/Public/Home/css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>账号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="required" value="<?php echo ($datas['sid']); ?> " 
                        autocomplete="off" class="layui-input">
                    </div>
                   
                </div>
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>姓名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" value="<?php echo ($datas['sname']); ?> " name="phone" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>年龄
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required="" lay-verify="email" value="<?php echo ($datas['sage']); ?> " 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>性别
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="required" value="<?php echo ($datas['ssex']); ?> " 
                        autocomplete="off" class="layui-input">
                    </div>
                   
                </div>
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>电话
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" value="<?php echo ($datas['stele']); ?> " name="phone" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required="" lay-verify="email" value="<?php echo ($datas['spwd']); ?> " 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
               
                
              
            </form>
        </div>
       
        
    </body>

</html>