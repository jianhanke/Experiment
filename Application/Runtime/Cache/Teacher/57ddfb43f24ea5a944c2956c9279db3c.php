<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/main.css"/>
</head>
<body>
<div>




<div class="result-content">
                <form action="<?php echo U('Course/courseRelateClass');?>" method="post" >
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <input type="hidden"  name="course_id"  value="<?php echo ($datas['cid']); ?>"   >
                                <th><i class="require-red">*</i>课程名：</th>
                                <td>
                                    <p> <?php echo ($datas['cname']); ?>  </p>
                                </td>
                            </tr>
							 <tr>
                                <th>：</th>
                                <td><img src="/Experiment/Source/Course/<?php echo ($datas['img']); ?>" width="250"></td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>学院  ：</th>
                            	<td>     
								<select  name="" id="province_id" style="width:150px;">
								<option>请选择</option>
						        <?php if(is_array($departments)): $i = 0; $__LIST__ = $departments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><!-- 可能要改name值 -->
						        	<option  value="<?php echo ($department['id']); ?>"><?php echo ($department['department_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>                                                  
						     </select>
                            	</td>  
                            </tr>
                          <tr>
                                <th width="120"><i class="require-red">*</i>年级  ：</th>
                            	<td>    
								<select name=""  id="city_id" style="width:150px;" >     <!-- 可能要改name值 -->
									 <option>请选择</option>
								  </select>

                            	 </td> 
                           <tr>
                           <tr>
                                <th width="120"><i class="require-red">*</i>年级  ：</th>
                            	<td>
									<select name="class_id"  id="district_id" style="width:150px;" >
									  <option value="0">请选择</option>
								   </select>  
                           		</td>
                           </tr>    
								

							<tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="关联" type="submit">
                                   <a href="<?php echo U('Course/showMyCourse/');?>"> <input class="btn btn6"  value="返回" type="button"> </a>   
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>

</div>
<script src="/Experiment/Public/Home/js/jquery-2.0.0.min.js"></script>
<script>
	$("#province_id").change(function(){
	var province_id=$(this).val();
	$.ajax({
		url:"<?php echo U('Course/getCurrentGrade');?>" ,  //路径
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
		url:"<?php echo U('Course/getCurrentClass');?>" , //路径
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