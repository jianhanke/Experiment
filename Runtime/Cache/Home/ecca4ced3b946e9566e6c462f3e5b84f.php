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
	<div  style="height: 10%;width: 50%;  margin: auto; " >
		<form action="<?php echo U('Experiment/serachKeyWord');?> " method="get"   style="height: 100%;width: 100%;">
			
			<input type="text" value="主机名字关键词" name='keyword' onfocus="if (value =='主机名字关键词'){value =''}" onblur="if (value ==''){value='主机名字关键词'}"  style="height:50%;width: 50%;"  />
     		<button  type="submit"  align="right" style="height:50%;width: 8%;"   >查询</button>
     	</form>
	</div>	
<?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="myDiv" style="width: 80%;height: 30%; " >

		<div style="width: 25%;float: left;height: 100%;" >
			<img src="/Experiment/Source/Experiment/<?php echo ($data['outcome_model']); ?> " alt="" style="width:100%;height: 100%; ">
		</div>
		<div style="width: 75%;float:right;height: 100%;  ">
				<br />
				<br />
			<p>  <?php echo ($data['ename']); ?> </p>  
			<div class="joinExperiment">

				<a href="<?php echo U('Experiment/judgeExperimentType');?>/experimentId/<?php echo ($data['eid']); ?>" target="block"   > 

				 <?php echo ($data['id']!==null ? '进入主机' : '加入'); ?>      </a> 
			</div>
		</div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>




</body>
</html>