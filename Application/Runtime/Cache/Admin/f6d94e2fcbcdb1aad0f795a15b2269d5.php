<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>
	<div class="main-wrap">

        	
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('Class/modifyClassInfoById');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <input hidden name="id" value="<?php echo ($datas['id']); ?> " > 
                            <tr>
                                <th><i class="require-red">*</i>班名：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="class_name" size="20" value="<?php echo ($datas['class_name']); ?> " type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>年级:</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="grade" size="20" value="<?php echo ($datas['grade']); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th width="200"><i class="require-red">*</i>系别：</th>
                                <td>
                                    <select name="department_id" class="required">
                                        <option value="<?php echo ($datas['department_id']); ?>"><?php echo ($datas['department_name']); ?></option>
                                       <?php if(is_array($departments)): $i = 0; $__LIST__ = $departments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><option value="<?php echo ($department['department_id']); ?>"><?php echo ($department['department_name']); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>     

                                    </select>    
                                </td>
                            </tr>
       
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                                    <a href="<?php echo U('Class/showAllClassInfo');?> "><input class="btn btn6"  value="返回" type="button"> </a>  
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
</body>
</html>