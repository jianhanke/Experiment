<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/main.css"/>
</head>
<body>


      

            <div class="result-content">
                <form action="<?php echo U('Teacher/modifyInfo');?>/teacherId/<?php echo ($datas['tid']); ?> " method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <input type="hidden"  name="Tid" value="<?php echo ($datas['tid']); ?>" >
                                <th><i class="require-red">*</i>姓名：</th>
                                <td>
                                    <input class="common-text required" name="Tname" size="12" value="<?php echo ($datas['tname']); ?>" type="text">
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

                            <tr>
                                <th><i class="require-red">*</i>电话：</th>
                                <td><input class="common-text" name="Ttele" size="12" value="<?php echo ($datas['ttele']); ?>" type="text"></td>
                            </tr>
                            <!-- <tr>1
                                <th><i class="require-red">*</i>照片：</th>
                                <td><input name="smallimg" id="" type="file"><input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/></td>
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