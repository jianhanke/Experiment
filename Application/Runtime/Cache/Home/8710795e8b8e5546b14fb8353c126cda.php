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
                <li><a href="#">menu0</a></li>
                <li><a href="#">menu1</a></li>
                <li><a href="#">menu2</a></li>
                <li><a href="#">menu3</a></li>
        </ul>
    </div>

    <div class="box"  style="height: 100%;width: 68%; float: right;" >
        <div class="con0" id="con0"  style="height: 100%;width: 100%;" >d0</div>
        <div class="con1" id="con1" style="height: 100%;width: 100%;" >d1</div>
        <div class="con2" id="con2" style="height: 100%;width: 100%;">d2</div>
        <div class="con3" id="con3" style="height: 100%;width: 100%;">d3</div>
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
<script type="module" crossorigin="anonymous" >
  
  import RFB from '/Experiment/Public/noVNC/core/rfb.js';

   var rfb0 = new RFB(document.getElementById('con0'),url,{ credentials: { password: '123456' } }  );
  rfb0.connect();

  var rfb1 = new RFB(document.getElementById('con1'),url,{ credentials: { password: '123456' } }  );
  rfb1.connect();

  var rfb2 = new RFB(document.getElementById('con2'),url,{ credentials: { password: '123456' } }  );
  rfb2.connect();

  var rfb3 = new RFB(document.getElementById('con3'),url,{ credentials: { password: '123456' } }  );
  rfb3.connect();
  
   
</script>