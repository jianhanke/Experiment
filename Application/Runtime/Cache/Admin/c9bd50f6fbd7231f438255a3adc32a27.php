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
                <form action="/Experiment/index.php/Admin/Teacher/modifyTeacherById " method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <input hidden name="Tid" value="<?php echo ($datas['tid']); ?> " > 
                            <tr>
                                <th><i class="require-red">*</i>姓名：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="Tname" size="15" value="<?php echo ($datas['tname']); ?> " type="text">
                                </td>
                            </tr>
                      
                            <tr>
                                <th width="120"><i class="require-red">*</i>性别：</th>
                                <td>
                                    <select name="Tsex" class="required">
                                        <option value="">请选择</option>
                                        <option value="男" <?php echo ($datas['tsex']=='男' ? 'selected' : ''); ?>   >男</option>
                                        <option value="女" <?php echo ($datas['tsex']=='女' ? 'selected' : ''); ?>     >女</option>
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
                                <td><input class="common-text" name="Ttele" size="25" value="<?php echo ($datas['ttele']); ?>" type="text"></td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>密码:</th>
                                <td><input class="common-text" name="Tpwd" size="25" value="<?php echo ($datas['tpwd']); ?>" type="text"></td>
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