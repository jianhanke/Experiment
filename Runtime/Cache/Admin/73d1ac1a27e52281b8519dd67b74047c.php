<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>员工管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>

            
                <form action="<?php echo U('Experiment/addExperiment');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>主机名字:</th>
                                <td>
                                    <input class="common-text required" name="Ename" size="25" value="" type="text">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>照片：</th>
                                <td><input name="outcome_model" id="" type="file">
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>镜像Id:</th>
                                <td>
                                    <input class="common-text required" name="image_id" size="30" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>镜像名字:</th>
                                <td>
                                    <input class="common-text required" name="name" size="30" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            
    


</body>
</html>