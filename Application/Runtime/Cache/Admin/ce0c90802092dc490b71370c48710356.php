<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Admin/css/main.css"/>
</head>
<body>
      <div class="search-wrap">
            <div class="search-content">
                <form action="/Experiment/index.php/Admin/Class/findStudentByLike" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="Sid">Id</option>
                                    <option value="Sname">班名</option>
                                    <option value="Sage">年级</option>
                                    <option value="Ssex">系别</option>

                                </select>   
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                </form>

                            <td>  <a href="<?php echo U('Class/addClassInfo');?>"> <input type="button" value="手动添加" > </a>   </td>
                            <td>  <a href="<?php echo U('Admin/Excel/outputExcel/modelName/class');?>"> <input type="button" value="下载模板" > </a>   </td>
                            <td> <form action="<?php echo U('Admin/Excel/uploadExcelAndInput/modelName/class');?> " method="post" enctype="multipart/form-data">
                                   <input type="file" name="excelData">
                                   <button type="submit">导入</button>
                                </form> </td>
                        </tr>

                    </table>
                
            </div>
        </div>

        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>班级Id</th>
                        <th>班名</th>
                        <th>年级</th>
                        <th>系别</th>
                        <th>详细信息</th>
                        <th>操作</th>
                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['id']); ?>  </td>
                        <td> <?php echo ($data['class_name']); ?>  </td>
                        <td>  <?php echo ($data['grade']); ?>  </td>
                        <td>   <?php echo ($data['department_name']); ?>  </td>
                        <td> <a class="link-update" href="<?php echo U('Class/showClassInfoById');?>/id/<?php echo ($data['id']); ?>">查看</a>   </td>
                        <td>  

                            <a class="link-update" href="<?php echo U('Class/modifyClassInfoById');?>/id/<?php echo ($data['id']); ?>">修改</a>
                            &nbsp&nbsp&nbsp
                            <a class="link-update" href="<?php echo U('Class/deleteClassById');?>/classId/<?php echo ($data['id']); ?>">删除</a>
                            
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                </table>
                <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div>
            </div>
            
                
    

        </div>
        
</body>
</html>