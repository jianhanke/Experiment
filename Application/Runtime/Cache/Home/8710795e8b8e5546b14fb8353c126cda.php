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
                <li><a href="#">Master</a></li>
                <li><a href="#">menu1</a></li>
                <li><a href="#">menu2</a></li>
                <li><a href="#">menu3</a></li>
        </ul>
    </div>

    <div class="box"  style="height: 100%;width: 68%; float: right;" >
        <div class="con0" id="con0"  style="height: 100%;width: 100%;" > </div>
        <div class="con1" id="con1" style="height: 100%;width: 100%;" > </div>
        <div class="con2" id="con2" style="height: 100%;width: 100%;"> </div>
        <div class="con3" id="con3" style="height: 100%;width: 100%;"> </div>
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

   var rfb = new RFB(document.getElementById('con0'),"ws://localhost:6080/websockify?token=host6" ,{ credentials: { password: '123456' } }  );
  rfb.connect(); 
</script>

<script type="module" crossorigin="anonymous" >
  
  import RFB from '/Experiment/Public/noVNC/core/rfb.js';

  var rfb = new RFB(document.getElementById('con1'),"ws://localhost:6080/websockify?token=host5",{ credentials: { password: '123456' } }  );
  rfb.connect();  

</script>

<script type="module" crossorigin="anonymous" >
  
  import RFB from '/Experiment/Public/noVNC/core/rfb.js';

  var rfb = new RFB(document.getElementById('con2'),"ws://localhost:6080/websockify?token=host6",{ credentials: { password: '123456' } }  );
  rfb.connect();  

</script>


<script type="module" crossorigin="anonymous" >
  
  import RFB from '/Experiment/Public/noVNC/core/rfb.js';

  var rfb = new RFB(document.getElementById('con3'),"ws://localhost:6080/websockify?token=host5",{ credentials: { password: '123456' } }  );
  rfb.connect();  

</script>