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
                <form action="/Experiment/index.php/Admin/Docker/findOnlyContainerByLike" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="id">Id</option>
                                    <option value="Container_id">容器Id</option>
                                    <option value="ip">ip地址</option>
                                    <option value="ip_num">Ip_num</option>
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
                        <th>ip地址</th>
                        <th>Ip_num</th>
                        <td>状态</td>
                        <th>操作</th>
                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['id']); ?>  </td>
                        <td> <?php echo ($data['container_id']); ?>  </td>
                        <td>  <?php echo ($data['ip']); ?>  </td>
                        <td>  <?php echo ($data['ip_num']); ?>  </td>
                        <td>   <?php echo ($data['status']=='exited'? '<font color="green" > 运行中 </font> ' : ' <font color="red" >  关机 </font>  '); ?>   </td>
                        <td>
                            <a class="link-del" href="/Experiment/index.php/Admin/Docker/startContainerById/container_id/<?php echo ($data['container_id']); ?>">开机</a>&nbsp;&nbsp;
                           
                            <a class="link-del" href="/Experiment/index.php/Admin/Docker/shutdownContainerById/container_id/<?php echo ($data['container_id']); ?>">关机</a>&nbsp;&nbsp;

                             <a class="link-del" href="/Experiment/index.php/Admin/Docker/restartContainerById/container_id/<?php echo ($data['container_id']); ?>">重启</a>


                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                
                </table>
                <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div>
            </div>
        </div>
</body>
</html>