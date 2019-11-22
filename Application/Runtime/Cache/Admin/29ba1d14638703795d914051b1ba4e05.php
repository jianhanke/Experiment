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
                <form action="<?php echo U('Department/modifyDepartmentInfoById');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <input hidden name="id" value="<?php echo ($datas['id']); ?> " > 
                            <tr>
                                <th><i class="require-red">*</i>系名：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="department_name" size="20" value="<?php echo ($datas['department_name']); ?>" type="text">
                                </td>
                            </tr>
                       
       
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <a href="<?php echo U('Department/showAllDepartmentInfo');?> "><input class="btn btn6"  value="返回" type="button"> </a>  
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
</body>
</html>