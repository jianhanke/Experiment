<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>

<div class="search-wrap">
            <div class="search-content">
                
                    <table class="search-tab">
                        <tr>
                            <th></th>     <th></th><th></th><th></th>
                            <th>当前课程:</th>
                            <td>  <?php echo ($courseInfo['cname']); ?> </td>

                            <th width="120">当前班级:</th>
                            <td> <?php echo ($classInfo['class_name']); ?> </td>
                        </tr>

                    </table>
                
            </div>
        </div>

        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>学生Id</th>
                        <th>姓名</th>
                        <th>年龄</th>
                        <th>性别</th>
                        <th>手机号</th>


                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['sid']); ?>  </td>
                        <td> <?php echo ($data['sname']); ?>  </td>
                        <td>  <?php echo ($data['sage']); ?>  </td>
                        <td>   <?php echo ($data['ssex']); ?>  </td>
                        <td>  <?php echo ($data['stele']); ?> </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    <tr>
                </table>
                <!-- <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div> -->
            </div>
            
                


        </div>
</body>
</html>