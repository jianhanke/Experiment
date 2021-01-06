<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>员工管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Experiment10/Public/Teacher/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment10/Public/Teacher/css/main.css"/>
</head>
<body>


        <div class="result-wrap">
            <div class="result-content">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th>工号:</th>
                                <td><?php echo ($datas['tid']); ?> </td>
                            </tr>
                            <tr>
                                <th>照片：</th>
                                <td><img src="/Experiment10/Public/Teacher/images/default.jpg" width="150"></td>
                            </tr>
                            <tr>
                                <th>姓名：</th>
                                <td><?php echo ($datas['tname']); ?> </td>
                            </tr>
                            <tr>
                                <th width="120">性别：</th>
                                <td><?php echo ($datas['tsex']); ?> </td>
                            </tr>
                            
                            <tr>
                                <th>电话：</th>
                                <td><?php echo ($datas['ttele']); ?> </td>
                            </tr>
                            <tr>
                                <th>密码：</th>
                                <td>********* </td>
                            </tr>
                             <tr>
                                <th></th>
                                <td>
                               <a href="<?php echo U('Teacher/modifyInfo');?>/teacherId/<?php echo ($datas['tid']); ?>" > <input class="btn btn-primary btn6 mr10" value="修改" type="submit"> </a>  
                                </td>
                            </tr>


                        </tbody>
                    </table>
            </div>
        </div>


</body>
</html>