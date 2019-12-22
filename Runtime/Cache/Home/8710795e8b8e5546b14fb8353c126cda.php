<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style type="text/css">
<style>
	.point{
    	float: left;
    	list-style: none;
	}
	.point li{
	margin-bottom: 10px;
	}
	.box{
	    float: center;
	}

	.box div{
	    border: 1px solid green;
	    display: none;
	}
	.box .con0{
	       display: block;
	}
 html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
    }

</style>
<body>

    <div style="float: left;" >
        <ul class="point">
                
                <?php if(is_array($datas)): $k = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><li><a href="#">Host<?php echo ($k-1); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

    <div class="box"  style="height: 100%;width: 68%; float: right;" >


      <?php if(is_array($datas)): $k = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><div class="con<?php echo ($k-1); ?>" id="con<?php echo ($k-1); ?>"  style="height: 100%;width: 100%;" >  </div><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>

</body>
</html>
<script src="/Experiment/Public/Home/js/jquery-2.0.0.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
      $(".point li a").click(function(){
      var order = $(".point li a").index(this);//点击之后可以返回当前a标签index的值
      $(".con" + order).show().siblings("div").hide();
      });
      })
  </script>



 <?php if(is_array($datas)): $k = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><script type="module" crossorigin="anonymous" >
      import RFB from '/Experiment/Public/Home/plugin/noVNC/core/rfb.js';
       var rfb = new RFB(document.getElementById("con<?php echo ($k-1); ?>"),"<?php echo ($data); ?>" ,{ credentials: { password: '123456' }});
       
      rfb.connect(); 
    </script><?php endforeach; endif; else: echo "" ;endif; ?>