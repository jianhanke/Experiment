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
<link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Experiment/Public/Teacher/css/main.css"/>
<body>

<div class="search-wrap">
            <div class="search-content">
                
                    <table class="search-tab">
                        <tr>
             					
							<th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th>
							<th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th>
                            <td>  <a href="<?php echo U('Course/addCourse');?>"> <input type="button" value="添加课程" > </a>   </td>
                      	
                        </tr>

                    </table>
                
            </div>
</div>

<?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="myDiv" style="width: 80%;height: 30%; " >

		<div style="width: 25%;float: left;height: 100%;" >
			<img src="/Experiment/Source/Course/<?php echo ($data['img']); ?> " alt="" style="width:100%;height: 100%; ">
		</div>
		<div style="width: 75%;float:right;height: 100%;  ">
				<br />
				<br />
			<p>  <?php echo ($data['name']); ?> </p>  
			
				
				<a href="<?php echo U('Course/editCourseById');?>/id/<?php echo ($data['cid']); ?>" > 
				       <input type="button"  value="编辑 ">     </a> 
				<a href="<?php echo U('Course/cancelCourseById');?>/id/<?php echo ($data['cid']); ?>"><input type="button" value="解除关联" > </a>

				<a href="<?php echo U('Course/courseRelateClass');?>/courseId/<?php echo ($data['cid']); ?>"> <input type="button" value="关联班级" >  </a>

				<!-- <a href="<?php echo U('Student/courseProgress');?>/courseId/<?php echo ($data['cid']); ?>">  -->
					
						<select onchange='location.href=this.options[this.selectedIndex].value'>
                            <option  selected="true" disabled="true" >班级进展</option>
                            	<?php if(is_array($data['classIds'])): $i = 0; $__LIST__ = $data['classIds'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$classInfo): $mod = ($i % 2 );++$i;?><option   value="<?php echo U('Course/courseToClassProgress');?>/courseId/<?php echo ($data['cid']); ?>/classId/<?php echo ($classInfo['id']); ?>"> <?php echo ($classInfo['class_name']); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
               			 </select>
				  
			
		</div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>




</body>
</html>