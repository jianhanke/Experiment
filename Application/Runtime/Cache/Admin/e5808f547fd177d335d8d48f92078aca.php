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
                <form action="/Experiment/index.php/Admin/Docker/findContainerByLike" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="id">Id</option>
                                    <option value="Container_id">容器Id</option>
                                    <option value="student_id">学号</option>
                                    <option value="Sname">学生姓名</option>
                                    <option value="Image_id">容器Id   </option>
                                    <option value="Image_id">镜像Id</option>
                                    <option value="name">镜像名字  </option>
                                    <option value="Eid">所属实验Id</option>
                                    <option value="Ename">所属实验Name   </option>
                                    <option value="ip_num">Host_ip</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>Id</th>
                        <th>容器Id</th>
                        <th>学生id</th>
                        <th>学生姓名</th>
                        <th>Ip地址</th>
                        <th>镜像Id</th>
                        <th>镜像名字</th>
                        <th>所属实验Id</th>
                        <th>所属实验Name</th>
                        <th>Host_ip</th>
                        <th>修改</th>
                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['id']); ?>  </td>
                        <td> <?php echo ($data['container_id']); ?>  </td>
                        <td>  <?php echo ($data['student_id']); ?>  </td>
                        <td>   <?php echo ($data['sname']); ?>  </td>
                        <td>  <?php echo ($data['ip']); ?> </td>
                        <td>  <?php echo ($data['image_id']); ?>     </td>
                        <td>  <?php echo ($data['image_name']); ?>  </td>
                        <td>   <?php echo ($data['sid']); ?>  </td>
                        <td>   <?php echo ($data['ename']); ?>   </td>
                        <td>   <?php echo ($data['ip_num']); ?>  </td>
                        <td>
                            
                            <a class="link-del" href="/Experiment/index.php/Admin/Docker/deleteContainerById/container_id/<?php echo ($data['container_id']); ?>/eid/<?php echo ($data['eid']); ?>/user_id/<?php echo ($data['student_id']); ?>">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                
                </table>
                <div class="list-page"> 共 <?php echo ($count); ?> 条 </div>
            </div>
        </div>
</body>
</html>