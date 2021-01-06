<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment10/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment10/Public/Admin/css/main.css"/>
</head>
<body>
   
        <div class="result-wrap">
           
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>id</th>
                        <th>容器Id</th>
                        <th>所属镜像</th>
                        <th>Ip地址</th>
                        <td>状态</td>
                        <th>操作</th>
                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['id']); ?>  </td>
                        <td> <?php echo ($data['container_id']); ?>  </td>
                        <td> <?php echo ($data['image_id']); ?>  </td>
                        <td>  <?php echo ($data['ip']); ?>  </td>
                        <td>  <?php echo ($data['ip_num']); ?>  </td>
                        <td> <?php if(($data['status'] == 'running')): ?><font color="green" > 运行中 </font> 
                                <td>
                           
                            <a class="link-del" href="/Experiment10/index.php/Admin/Docker/stopContainerById/container_id/<?php echo ($data['container_id']); ?>">关机</a>&nbsp;&nbsp;

                             <a class="link-del" href="/Experiment10/index.php/Admin/Docker/restartContainerById/container_id/<?php echo ($data['container_id']); ?>">重启</a>
                        </td>
                            <?php elseif(($data['status'] == '')): ?>不存在
                            <?php else: ?> <font color="red" >  关机 </font>
                            <td>
                            <a class="link-del" href="/Experiment10/index.php/Admin/Docker/startContainerById/container_id/<?php echo ($data['container_id']); ?>">开机</a>&nbsp;&nbsp;
                           
                            
                        </td><?php endif; ?> </td>

                        
                        
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                
                </table>
                <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div>
            </div>
        </div>
</body>
</html>