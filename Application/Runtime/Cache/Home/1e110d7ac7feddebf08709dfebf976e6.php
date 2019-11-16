<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style type="text/css">
        .point{
            float: left;
            list-style: none;
        }
        .point li{
            margin-bottom: 10px;
        }
        .box{
            float: right;
            margin-right: 500px;
        }
        .box div{
            width: 1000px;
            height: 1000px;
            border: 1px solid green;
            display: none;
        }
        .box .con0{
            display: block;
        }
        x
    </style>
<body>

开始
<br>

 <?php if(is_array($datas)): $k = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k; echo ($k-1); ?> <br /><?php endforeach; endif; else: echo "" ;endif; ?>
    

        
    </body>
</html>
<script src="/Experiment/Public/Home/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript">
      
		var opts = {
		  hostname: '172.19.0.5',
		  port: '22',
		  username: 'root',
		  password: '123456',
		}
		wssh.connect(opts);
    </script>
<script src="http://localhost:8888/static/js/jquery.min.js"></script>
<script src="http://localhost:8888/static/js/popper.min.js"></script>
<script src="http://localhost:8888/static/js/bootstrap.min.js"></script>
<script src="http://localhost:8888/static/js/xterm.min.js"></script>
<script src="http://localhost:8888/static/js/fullscreen.min.js"></script>
<script src="http://localhost:8888/static/js/main.js"></script>