<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
		html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
        }
        *{padding:0; margin:0;}
		a{ text-decoration:none} 
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
           
            border: 1px solid green;
            display: none;
        }
        .box .con0{
            display: block;
        }
</style>

<body>
	

	<ul class="point">
        
            <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li><a href="#"> &#9733<?php echo ($data['name']); ?>  </a>  </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="box" style="height: 70%;width: 40%;">
            
            <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div  class="con<?php echo ($key); ?>"  style="height: 70%;width: 100%;" >
            <b> 进入</b> <br /> 
		<a href="<?php echo U('Course/joinChapterById');?>/id/<?php echo ($data['id']); ?>" target="block">

			 &#9733<?php echo ($data['name']); ?> 
			  </a>
			  	<br /><br /><br />
			 <b   >上传报告</b>
				<form action="<?php echo U('Course/uploadFile');?> " method="post" enctype="multipart/form-data" >
						<input type="file"  name="file" <?php echo ($data['upload_id'] == NULL ? "" : "disabled"); ?>  >
						<input type="hidden" name="chapter_id" value="<?php echo ($data['id']); ?> "  >
						<!-- <input type="texhiddetn"  name="chapter_name"  value="<?php echo ($data['name']); ?> -->
						<input type="submit" value="上传" >
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <?php if($data['upload_id'] != NULL ): ?><font color="green" >(已上传)</font> <a href="<?php echo U('Course/downloadMyReport');?>/reportId/<?php echo ($data['upload_id']); ?>">
                            <img src="/Experiment/Public/Home/images/icon_doc.gif" > 点击下载 </a>
                        <?php else: ?>
                                <font color="red" >(未上传)</font><?php endif; ?>

				</form>

              </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
	
	
</body>
</html>
<script type="text/javascript" src="/Experiment/Public/Home/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".point li a").click(function(){
                var order = $(".point li a").index(this);//获取点击之后返回当前a标签index的值
                $(".con" + order).show().siblings("div").hide();//显示class中con加上返回值所对应的DIV
            });
        })

</script>