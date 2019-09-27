<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
 	
    <meta charset="utf-8">
	<style type="text/css">
	.myDiv{
		border:1px solid #000;
		margin-bottom:10px;
		width: 100%;
		font-size:25px;
		text-align: center;
		margin:1% auto;
	}
	.joinExperiment{
		font-size:18px;
		border:1px solid #000;
		height: 30px;
		width: 100px;
		float: right;
	}
	  html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
        }
	ul,li{ padding:0;margin:0;list-style:none}
	a{ text-decoration:none} 
	</style>	
</head>
<body>

<?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="myDiv" style="width: 80%;height: 30%; " >

		<div style="width: 25%;float: left;height: 100%;" >
			<img src="/Experiment/Public/Experiment/<?php echo ($data['outcome_model']); ?> " alt="" style="width:100%;height: 100%; ">
		</div>
		<div style="width: 75%;float:right;height: 100%;  ">
				<br />
				<br />
			<p>  <?php echo ($data['ename']); ?> </p>  
			<div class="joinExperiment">

				<a href="<?php echo U('Docker/joinExperiment');?>/id/<?php echo ($data['eid']); ?>" target="block"   > 
				进入     </a> 
			</div>
		</div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>




</body>
</html>