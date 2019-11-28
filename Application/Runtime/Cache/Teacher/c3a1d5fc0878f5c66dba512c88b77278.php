<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment5/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment5/Public/Admin/css/main.css"/>
</head>
<body>
        

        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>

                        <th>年级</th>
                        <th>系别</th>
                        <th>所带班级</th>
                        <th>所带课程</th>
                        <th>班级学生</th>
                        
                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td>  <?php echo ($data['grade']); ?>  </td>
                        <td>   <?php echo ($data['department_name']); ?>  </td>
                        <td> <font color="red"> <?php echo ($data['class_name']); ?> </font>    </td>
                        <td> <font color="blue"> <?php echo ($data['cname']); ?> </font>    </td>
                        <td> <a class="link-update" href="<?php echo U('Teacher/showStudentById');?>/classId/<?php echo ($data['id']); ?>">查看 </a>   </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                </table>
                <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div>
            </div>
            
                
    

        </div>
        
</body>
</html>