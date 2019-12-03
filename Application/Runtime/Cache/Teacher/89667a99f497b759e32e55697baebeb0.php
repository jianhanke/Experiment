<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/main.css"/>
</head>
<body>


      

            <div class="result-content">
                <form action="<?php echo U('Teacher/modifyPwd');?>/teacherId/<?php echo ($teacherId); ?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>新密码：</th>
                                <td><input class="common-text" name="newPwd1" size="30" value="" type="text"></td>
                            </tr>

                            <tr>
                                <th><i class="require-red">*</i>重复新密码：</th>
                                <td><input class="common-text" name="newPwd2" size="30" value="" type="text"></td>
                            </tr>
                              <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>

                        </tbody></table>
                </form>
            </div>


 
</body>
</html>