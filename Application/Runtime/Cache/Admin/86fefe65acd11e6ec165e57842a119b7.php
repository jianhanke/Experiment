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
                <form action="/Experiment/index.php/Admin/Course/findImageByLike" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="image_id">镜像Id   </option>
                                    <option value="name">镜像名字 </option>
                                    <option value="time"> pull时间</option>
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
                        <th>id</th>
                        <th>镜像Id</th>
                        <th>镜像名字</th>
                
                        <th>状态</th>
                        <th>操作</th>

                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td>  <?php echo ($data['cid']); ?>   </td>
                        <td> <?php echo ($data['to_imageid']); ?>  </td>
                        <td> <?php echo ($data['to_imagename']); ?>  </td>
                        <td>   <?php echo ($data['status']==1? '可用' : '不可用'); ?>  </td>
                        <td>
                            <a class="link-del" href="/Experiment/index.php/Admin/Course/deleteChapterImageById/id/<?php echo ($data['cid']); ?>">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                
                </table>
                <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div>
            </div>
        </div>
</body>
</html>