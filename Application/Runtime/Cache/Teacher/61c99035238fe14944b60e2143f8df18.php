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
    
 <div  style="float: left;" >
    <ul class="point">
        
        <p> <a href="<?php echo U("Course/addChapter");?>/to_course/<?php echo ($id); ?>">&#187; &raquo;添加章节</a>  </p>
        <br>
            <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li>&#9733 <a href="#"> <?php echo ($data['name']); ?>  </a>  </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>   
        <div class="box" style="height: 70%;width: 40%; float: right; ">
            <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div  class="con<?php echo ($key); ?>"  style="height: 70%;width: 100%;" >
           <!--  <b> 进入</b> <br /> 
        <a href="<?php echo U('Course/joinChapterById');?>/id/<?php echo ($data['id']); ?>" target="block">
             &#9733<?php echo ($data['name']); ?>  -->
              </a>
              <font  color="red">重复上传,将会替代</font>
              <p> <?php echo ($data['name']); ?> </p>
              <br>
                <br />
                 <p>  <b >上传视频(限50M,后缀限:'avi','wmv','mpeg','mp4')  </b>  </p>  

                <video src="/Experiment/Source/Chapter/<?php echo ($data['video']); ?>"  style="width: 50%;"    controls="" ></video>

                    <form action="<?php echo U('Course/uploadVideo');?> " method="post" enctype="multipart/form-data" >
                        <input type="file"  name="video" >
                        <input type="hidden" name="chapter_id" value="<?php echo ($data['id']); ?> ">
                        <!-- <input type="texhiddetn"  name="chapter_name"  value="<?php echo ($data['name']); ?> -->
                        <input type="submit" value="上传" >
                     </form>
                <br />




             <b>上传实验指导书 <font color="red" >(只限.docx文件,.doc请另存为.docx后再上传)</font>  </b>
             <form action="<?php echo U('Course/uploadWord');?> " method="post" enctype="multipart/form-data" >
                        <input type="file"  name="word" >
                        <input type="hidden" name="chapter_id" value="<?php echo ($data['id']); ?> "  >
                        <!-- <input type="texhiddetn"  name="chapter_name"  value="<?php echo ($data['name']); ?> -->
                        <input type="submit" value="上传" >
                </form>
                <?php if(($data['doc'] == '')): ?><font  color="red" size="20" >暂时为空 </font>
              <?php else: ?> <iframe src="/Experiment/Source/Chapter/<?php echo ($data['doc']); ?> " frameBorder=0  style="height: 100%;width: 100%; "   ></iframe><?php endif; ?>
            
                
                <br>
                

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