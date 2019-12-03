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
                <form action="<?php echo U('Class/addClassInfo');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                         <tr>
                                <th><i class="require-red">*</i>班名：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="class_name" size="15"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>年级：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="grade" size="15"  type="text">
                                </td>
                            </tr>
                             <tr>
                                <th width="200"><i class="require-red">*</i>系别：</th>
                                <td>
                                    <select name="department_id" class="required">
                                       <?php if(is_array($departments)): $i = 0; $__LIST__ = $departments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><option value="<?php echo ($department['id']); ?>"><?php echo ($department['department_name']); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>     
                                    </select>    
                                </td>
                            </tr>


                            
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                                    <!-- <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button"> -->
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
</body>
</html>