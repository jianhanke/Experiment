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
                            <td> <a href="<?php echo U('Course/editCourseById');?>/id/<?php echo ($courseInfo['cid']); ?>"><?php echo ($courseInfo['cname']); ?></a> </td>
                            
                            <th>当前章节:</th>
                            <td><?php echo ($courseInfo['name']); ?></td>

                            <th width="120">当前班级测试:</th>
                            <td>  <a href="<?php echo U('Class/showClassToStudent');?>/classId/<?php echo ($classInfo['id']); ?> "><?php echo ($classInfo['department_name']); ?> —— <?php echo ($classInfo['class_name']); ?> </a>  </td>




                        </tr>

                    </table>
                
            </div>
        </div>

        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>报告情况 </th>


                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['sid']); ?>  </td>
                        <td> <?php echo ($data['sname']); ?>  </td>
                        <td>  
                        <?php if($data['id'] != NULL ): ?><a href="<?php echo U('Course/downloadReportById');?>/reportId/<?php echo ($data['id']); ?>"  type="doc" >
                        <img src="/Experiment/Public/Teacher/images/icon_doc.gif">下载</a>
                           </td>
                        <?php else: ?>
                            暂无<?php endif; ?>

                        
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    <tr>
                </table>
                <!-- <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div> -->
            </div>
            
                


        </div>
</body>
</html>