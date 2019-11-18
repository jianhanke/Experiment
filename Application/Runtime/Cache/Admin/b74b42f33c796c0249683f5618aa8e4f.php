<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>

            <div class="result-content">
                <form action="/Experiment/index.php/Admin/Experiment/modifyExperimentById" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <input hidden name="Eid" value="<?php echo ($datas['eid']); ?> " > 

                            </tr> 
                            
                            <tr>
                                <th><i class="require-red">*</i>实验名字：</th>
                                <!-- <th><i class="require-red">*</i>年龄：</th> -->
                                <td>
                                    <input class="common-text required" name="Ename" size="30" value="<?php echo ($datas['ename']); ?>" type="text">
                                </td>
                            </tr>
                            
                          <!--   <tr>
                                <td>
                                    <input class="common-text required" name="birthdate" size="12" value="2016-03-18" type="text">
                                </td>
                            </tr> -->
                            <tr>
                                <th><i class="require-red">*</i>目标:</th>
                                <td><input class="common-text" name="goal" size="50" value="<?php echo ($datas['goal']); ?>" type="text"></td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>理论:</th>
                                <td><input class="common-text" name="theory" size="50" value="<?php echo ($datas['theory']); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>环境:</th>
                                <td><input class="common-text" name="environment" size="30" value="<?php echo ($datas['environment']); ?>" type="text"></td>
                            </tr>
                          <!--    <tr>
                                <th><i class="require-red">*</i>所需镜像Id:</th>
                                <td><input class="common-text" name="image_id" size="12" value="<?php echo ($datas['name']); ?>" type="text"></td>
                            </tr> -->
                            <tr>
                                <th><i class="require-red">*</i>图片地址:</th>
                                <td><img src="/Experiment/Source/Experiment/<?php echo ($datas['outcome_model']); ?>" width="250" height="200" >
                                <input name="outcome_model"  type="file">
                                </td>
                            </tr>
                            
                          <!--   <tr>
                                <th>备注：</th>
                                <td><textarea name="remarks" class="common-textarea" cols="30" style="width: 98%;" rows="10"> <?php  echo $data['remarks'] ?></textarea></td>
                            </tr> -->
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>

</body>
</html>