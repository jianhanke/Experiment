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
                            <td><a href="<?php echo U('Course/editCourseById');?>/id/<?php echo ($courseInfo['cid']); ?>"><?php echo ($courseInfo['cname']); ?> </a></td>

                            <th width="120">当前班级:</th>
                            <td> <a href="<?php echo U('Class/showClassToStudent');?>/classId/<?php echo ($classInfo['id']); ?> "><?php echo ($classInfo['class_name']); ?></a>   </td>
                        </tr>

                    </table>
                
            </div>
        </div>

        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>章节名</th>
                        <th>正在学习人数(点击查看)</th>
                        <th>所占比例</th>
                        <th>报告上传数(点击查看)</th>
                        <th>所占比例</th>

                    </tr>
                 <?php if(is_array($chapterInfo)): $i = 0; $__LIST__ = $chapterInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['name']); ?>  </td>
                        <td>  <a href="<?php echo U('Class/showChapterToClassStudent');?>/chapterId/<?php echo ($data['id']); ?>/classId/<?php echo ($classInfo['id']); ?>"> <?php echo ($data['join_nums']); ?></a>     </td>
                        <td>   <?php echo ($data['join_rate']); ?>        </td>
                        <td>  <a href="<?php echo U('Class/showChapterToClassReport');?>/chapterId/<?php echo ($data['id']); ?>/classId/<?php echo ($classInfo['id']); ?>"><?php echo ($data['report_nums']); ?> </a>  </td>
                        <td> <?php echo ($data['report_rate']); ?>  </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    <tr>
                </table>
                <!-- <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div> -->
            </div>
            
                


        </div>
</body>
</html>