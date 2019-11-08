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
                <form action="/Experiment/index.php/Admin/Student/findStudentByLike" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="Sid">学生Id</option>
                                    <option value="Sname">姓名</option>
                                    <option value="Sage">年龄</option>
                                    <option value="Ssex">性别</option>
                                     <option value="Stele">手机号</option>
                                    <option value="Spwd">密码</option>
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
                        <th>学生Id</th>
                        <th>姓名</th>
                        <th>年龄</th>
                        <th>性别</th>
                        <th>手机号</th>
                        <th>密码</th>
                    </tr>
                    <tr>
                        <td> <?php echo ($student['sid']); ?>  </td>
                        <td> <?php echo ($student['sname']); ?>  </td>
                        <td>  <?php echo ($student['sage']); ?>  </td>
                        <td>   <?php echo ($student['ssex']); ?>  </td>
                        <td>  <?php echo ($student['stele']); ?> </td>
                        <td>   <?php echo ($student['spwd']); ?>  </td>
                        <td>
                           
                            
                        </td>
                    </tr>
                    <tr>
                
                </table>
            </div>
            <p>此学生所用容器</p>

            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>Id</th>
                        <th>容器Id</th>
                        <th>ip地址</th>
                        <th>Ip_num</th>
                        <td>镜像id</td>
                        <td>镜像name</td>
                        <td>实验id</td>
                        <td>实验name</td>
                        <th>操作</th>

                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['id']); ?>  </td>
                        <td> <?php echo ($data['container_id']); ?>  </td>
                        <td>  <?php echo ($data['ip']); ?>  </td>
                        <td>  <?php echo ($data['ip_num']); ?>  </td>
                        <td> <?php echo ($data['image_id']); ?>  </td>
                        <td> <?php echo ($data['name']); ?>  </td>
                        <td>  <?php echo ($data['eid']); ?>  </td>
                        <td>  <?php echo ($data['ename']); ?>  </td>
                          <td>
                            <a class="link-del" href="<?php echo U("Docker/startContainerById");?>/container_id/<?php echo ($data['container_id']); ?>">开机</a>
                            &nbsp;&nbsp;
                            <a class="link-del" href="<?php echo U("Docker/shutdownContainerById");?>/container_id/<?php echo ($data['container_id']); ?>">关机</a>
                            &nbsp;&nbsp;
                            <a class="link-del" href="<?php echo U("Docker/restartdownContainerById");?>/container_id/<?php echo ($data['container_id']); ?>">重启</a>
                            &nbsp;&nbsp;
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    
                
                </table>
                
            </div>
                
        </div>
</body>
</html>