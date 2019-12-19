<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body{
            width: 100%;
            height: 100%;
        }
        .big_d{
            position: relative;
        }
        .big_dleft{
            width: 150px;
            height: 80%;
            float:left;


        }
        ul{
            width: 100px;
            height: 500px;
            background-color: #7396b0;
            border:2px solid #99aebe;
            white-space: nowrap;
            cursor: pointer;
        }
        li{
            width:140px;
            line-height: 50px;
            list-style: none;
            color:white;
            font-size: 15px;
            border:2px solid #5b6c79;
            border-top: none;
            border-left: none;
            border-right: none;
            margin-left: -41px;
            text-align: center;

            /*margin:0; */
        }
        li:hover{
            color: #5f6a73;
        }
        .big_dmid{
            width: 80%;
            height: 500px;
            float: left;
            /*margin-left: 30px;*/
            margin-top: 16px;
            position: absolute;
            margin-left: 160px;
            background:#7f92a1;
            
        }
        
        .x-red{
            color:#1760c3;
            font-size: 20px;
        }
        .layui-form-item{
            margin-left: 10px;
            margin-bottom: 10px;
            margin-top: 10px;

        }
        .layui-form-label{
            font-size: 14px;
            color:#e6e6e6;
        }
        .layui-input{
            border:1px solid #7f92a1;
            width: 25%;
            height: 25px;
            border-radius: 5px;
            
            /*font-color:white;*/

        }
    </style>
</head>



<body>
    <div class="big_d"> 
        <!--左边导航栏-->
        <div class="big_dleft">
            <ul>
                <li><a href="<?php echo U('Index/showStudentInfoById');?>"></a>我的信息</li>
                <li>所选课程</li>
            </ul>
        </div>
        <!--左边导航栏-->
        <!--中间展示部分-->
        <div class="big_dmid" style="border:1px solid #7f92a1">
            <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>姓名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" value="<?php echo ($datas['sname']); ?> " name="phone" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input" >
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>年龄
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required="" lay-verify="email" value="<?php echo ($datas['sage']); ?> " 
                        autocomplete="off" class="layui-input" >
                    </div>
                </div>
                
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>性别
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="required" value="<?php echo ($datas['ssex']); ?> " 
                        autocomplete="off" class="layui-input" >
                    </div>
                   
                </div>
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>电话
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" value="<?php echo ($datas['stele']); ?> " name="phone" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input" >
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required="" lay-verify="email" value="<?php echo ($datas['spwd']); ?> " 
                        autocomplete="off" class="layui-input" >
                    </div>
                </div>
        </div>
        <!--中间展示部分-->
    </div>

</body>
</html>