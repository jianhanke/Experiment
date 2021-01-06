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
                        <th>Id</th>
                        <th>配置名</th>
                        <th>配置值</th>
                        <th>提交</th>
                    </tr>
            
                 <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                      <form  method="post"  action="<?php echo U('WebConfig/editConfig');?>" >
                        <td> <input type="hidden" name="id" value="<?php echo ($data['id']); ?>"  > <?php echo ($data['id']); ?> </td>
                        <td> <?php echo ($data['name']); ?>  </td>
                        <td>  <input type="text" name="value" value="<?php echo ($data['value']); ?>">   </td>
                        <td> <input  value="更改" type="submit">    </td>
                      </form>   
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                </table>
                <div class="list-page">共 <?php echo ($count); ?> 条 1/1 页</div>
            </div>
            
        </div>
</body>
</html>