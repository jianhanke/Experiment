<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="/Experiment/Public/js/jquery-1.js"></script>
<script src="/Experiment/Public/Home/js/jquery-2.0.0.min.js"></script>
</head>

<body>
<div>

<form action="<?php echo U('Index/test10');?>" method="post" >
	<select  name="" id="province_id" style="width:150px;">
		<option>请选择</option>
        <?php if(is_array($departments)): $i = 0; $__LIST__ = $departments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><!-- 可能要改name值 -->
        	<option  value="<?php echo ($department['id']); ?>"><?php echo ($department['department_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>                                                  
     </select>
	 <select name=""  id="city_id" style="width:150px;" >     <!-- 可能要改name值 -->
		 <option>请选择</option>
			                                                 
	  </select>
	  <select name="Tclass"  id="district_id" style="width:150px;" >
		  <option value="0">请选择</option>
                                            
	   </select>  
	<input type="submit" value="添加" />   
</form> 

</div>
<script>
	$("#province_id").change(function(){
	var province_id=$(this).val();
	$.ajax({
		url:"<?php echo U('Index/getCurrentGrade');?>" ,  //路径
		Type:"POST",
		data:"id="+province_id,             //参数
		dataType:"json",                    
		success:function(data){
			var city = data.city;
			var option=$("<option></option>");
			$(option).val("0");
			$(option).html("请选择");
			var option1=$("<option></option>");
			$(option1).val("0");
			$(option1).html("请选择");
			$("#city_id").html(option);
			$("#district_id").html(option1);
			for(var i in city){
				var option=$("<option></option>");
				$(option).val(city[i]['grade']);     //可能改此处
				$(option).html(city[i]['grade']);    //可能改此处
				$("#city_id").append(option);
			}
		}
		
	});
});
</script>
<script>
$("#city_id").change(function(){
	var city_id=$(this).val();                   
	var province_id=$("#province_id").val();     //全选取路径可能需要更改 
	$.ajax({   
		url:"<?php echo U('Index/getCurrentClass');?>" , //路径
		Type:"POST",
		data:{"departmentId":province_id,"grade":city_id},  //参数
		dataType:"json",
		success:function(data){
			var district = data.district;
			var option=$("<option></option>");
			$(option).val("0");
			$(option).html("请选择");
			$("#district_id").html(option);
			for(var i in district){
				var option=$("<option></option>");
				$(option).val(district[i]['id']);    //可能改此处
				$(option).html(district[i]['class_name']);   //可能改此处
				$("#district_id").append(option);
			}
		}
	});
});
</script>
</body>
</html>