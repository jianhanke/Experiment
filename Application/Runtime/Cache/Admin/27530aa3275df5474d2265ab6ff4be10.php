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
                <form action="<?php echo U('Student/addStudent');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                         <tr>
                                <th><i class="require-red">*</i>学号：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="Sid" size="15"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>姓名：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="Sname" size="15"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>年龄：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="Sage" size="30"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>性别：</th>
                                <td>
                                    <select name="Ssex" class="required">
                                        <option value="">请选择</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>    
                                </td>
                            </tr>
                          <!--   <tr>
                                <td>
                                    <input class="common-text required" name="birthdate" size="12" value="2016-03-18" type="text">
                                </td>
                            </tr> -->
                            <tr>
                                <th><i class="require-red">*</i>电话:</th>
                                <td><input class="common-text" name="Stele" size="30"  type="text"></td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>密码:</th>
                                <td><input class="common-text" name="Spwd" size="30"  type="text"></td>
                            </tr>
                          <!--   <tr>
                                <th>备注：</th>
                                <td><textarea name="remarks" class="common-textarea" cols="30" style="width: 98%;" rows="10"> <?php  echo $data['remarks'] ?></textarea></td>
                            </tr> -->
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