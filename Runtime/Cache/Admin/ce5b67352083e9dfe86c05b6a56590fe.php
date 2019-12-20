<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>
        
       <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>班级Id</th>
                        <th>班名</th>
                        <th>年级</th>
                        <th>系别</th>
                      
                    </tr>
                    <tr>
                        <td> <?php echo ($class['id']); ?>  </td>
                        <td> <?php echo ($class['class_name']); ?>  </td>
                        <td>  <?php echo ($class['grade']); ?>  </td>
                        <td>   <?php echo ($class['department_name']); ?>  </td>
                    </tr>

                    <tr>
                </table>
               
            </div>
            
            <font color="red" ><p>班级信息</p> </font>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>所上课程名</th>
                        <th>授课教师</th>
                        <th>教师Id</th>

                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['cname']); ?>  </td>
                        <td>  <?php echo ($data['tname']); ?>  </td>
                        <td>  <?php echo ($data['tid']); ?>  </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    
                
                </table>
                
            </div>
            <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">        
        </div>

</body>
</html>