<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Experiment10/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment10/Public/Admin/css/main.css"/>
</head>
<body>
      <div class="search-wrap">
            <div class="search-content">
                <form action="/Experiment10/index.php/Admin/Experiment/findExperimentByLike" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="Eid">ID</option>
                                    <option value="Ename">实验名字</option>
                                    <option value="goal">实验目的</option>
                                    <option value="theory">实验理论</option>
                                    <option value="environment">环境</option>
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
                        <th>ID</th>
                        <th>实验名字</th>
                        <th>实验目的</th>
                        <th>实验理论</th>
                        <th>环境</th>
                        <th>图片地址</th>
                        <td>操作</td>
                    </tr>
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td> <?php echo ($data['eid']); ?>  </td>
                        <td> <?php echo ($data['ename']); ?>  </td>
                        <td>  <?php echo ($data['goal']); ?>  </td>
                        <td>   <?php echo ($data['theory']); ?>  </td>
                        <td>  <?php echo ($data['environment']); ?> </td>
                        <td>   <?php echo ($data['outcome_model']); ?>  </td>
                        <td>
                        <a class="link-update" href="/Experiment10/index.php/Admin/Experiment/modifyExperimentById/experiment_id/<?php echo ($data['eid']); ?>">修改</a>
                     <a class="link-del" href="/Experiment10/index.php/Admin/Experiment/deleteExperimentById/experiment_id/<?php echo ($data['eid']); ?> ">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    <tr>
                
                </table>
                <div class="list-page"> <?php echo ($count); ?> 条 1/1 页</div>
            </div>
        </div>
</body>
</html>