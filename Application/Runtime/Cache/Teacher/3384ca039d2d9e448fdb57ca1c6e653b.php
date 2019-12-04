<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>员工管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>
                <br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                当前课程为: <font color="red"><?php echo ($courseName); ?></font>  </p>
                <br>
               
                <br>
           

                <form action="<?php echo U('Course/addChapter');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <input type="hidden" name="to_course" value="<?php echo ($id); ?>" >
                          <tr>
                                <th><i class="require-red">*</i>章节名称:</th>
                                <td>
                                    <input class="common-text required" name="name" size="25" value="" type="text">
                                </td>
                            </tr>
                        <tr>  
                            <th><i class="require-red">*</i>上传指导书:</th>
                                     <td>
                                    
                        <input type="file"  name="word" >
                        <!-- <input type="texhiddetn"  name="chapter_name"  value="<?php echo ($data['name']); ?> -->
                  
                                </td>
                         </tr>
                         <tr>
                            <th><i class="require-red">*</i>上传实验视频</th>
                            <td>
                               
                        <input type="file"  name="video" >

                            </td>
                         </tr>
                          
             

                            <tr>
                                <th><i class="require-red">*</i>所需镜像:</th>
                                 <td>
                                    <select name="to_image" class="required">
                                        <option value="">请选择</option>
                                    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data['image_id']); ?>"><?php echo ($data['name']); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>    
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <a href="<?php echo U('Course/editCourseById');?>/id/<?php echo ($id); ?>"> <input class="btn btn6" value="返回" type="button"> </a>
                                </td>
                            </tr>
                        </tbody></table>
                </form>

</body>
</html>