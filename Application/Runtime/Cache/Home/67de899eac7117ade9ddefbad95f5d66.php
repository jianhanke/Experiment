<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    /**{margin:0; padding:0}；*/
    *{padding:0; margin:0;}
  
     
        .box .new0{
            display: block;
        }
         .box .new1{
            display: none;
        }
        .box div{
            /*width: 500px;
            height: 200px;*/
            
            /*display: none;  */
        }
        .box .con0{
            display: block;
        }
        .box .con1{
            display: none;
        }
        .box .con2{
            display: none;
        }
        .box .con3{
            display: none;
        }
    
    html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
    }
    ul {
        list-style:none;
          margin:0;
         padding:0;
    }
     li{
          float:left;
          width:25%;
          height:30px;
          line-height:30px;  /* 文字垂直居中 指定行高为li高度 自动垂直居中 */     
     
    text-decoration: none;
  
    display: block;
    font-size: 20px;
    color: #dadada;
    text-align: center;
    line-height: 60px;
 
}
/*ul div:hover{
    background: #333;
  }*/
a{
            text-decoration:none;
        }

</style>
<body>  
    <input type="hidden"  id='hiddenUrl' value="<?php echo ($url); ?>">
    <input type="hidden"  id='ceshiUrl' value="<?php echo ($ceshiUrl); ?>">
    <input type="hidden"  id='sshUrl' value="<?php echo ($sshUrl); ?>">
    <div class="leftDiv"  style="height: 100%;width: 32%; float: left; "  >
        <!-- <div style="height: 10%; background-color: blue;" >
            <ul>
                  <li><div>虚拟机</div> </li>
                  <li><div>视频资料</div> </li>
                  <li><div>笔记</div></li>
                  <li> <div>步骤说明</div>  </li>
            </ul>

        </div>
        <div   style="height:40%;background-color:red; " >
            红色的的
        </div>
        <div  style="height:40%;background-color:green; " >
            蓝色的的
        </div> -->
        <div style="height: 10%;width: 100%;" >
                 
              <ul class="point">
            <li><div> <a href="#">虚拟机</a></div></li>
            <li><div> <a href="#">视频资料</a></div></li>
            <li><div> <a href="#">笔记</a></div></li>
            <li><div> <a href="#">步骤说明</a></div></li>
              </ul>
        </div>
        <div class="box" style="height: 90%; width: 100%; " >
            <div class="con0" id="con0"  >                
                 <img src="/Experiment/Public/Home/images/1.jpg" style="height: 60%;width: 60%;" > 
                 <br>
                 
                 <ul class="point2">
                <li> <input type="button"  id="shareDesk" name="shareDesk" value="共享桌面"  /> </li>  
                <br>
                <li> <a id="picture" ><input type="button" value="图形界面"></a></li> <br>
                  <li >  <a   id="commandLine" ><input  id="ceshi" type="button" value="命令行" onclick="ceshi()" ></a> </li>
                  
                  
                 </ul>
              </div>
            <div class="con1">
                <video src="/Experiment/Course/<?php echo ($video); ?>" style="width: 100%;"  controls="" ></video>
            </div>

            <div class="con2" style="height: 90%;" >
                <form action="<?php echo U('NoVNC/saveNote');?> " id="myForm" method="post"  style="height: 80%;"  target="hidden_iframe"  >
                  <script id="container"   name="myNote"  style="height: 100%;" scrolling="yes"> </script>
                  <input type="hidden"  name="id" value="<?php echo ($id); ?>" >
                  <button type="button" style="background-color:#1E90FF;height: 8%;width: 10%;" onclick="submitNote()"   >保存</button>
                </form>
                <iframe name="hidden_iframe" style="display:none;"></iframe>
            </div>
            <div class="con3" style="height: 100%;width: 100%;" >

            <?php if(($doc == '')): ?><font  color="red" size="20" >暂时为空 </font>
              <?php else: ?> <iframe src="/Experiment/Course/<?php echo ($doc); ?> " frameBorder=0  style="height: 100%;width: 100%; "   ></iframe><?php endif; ?>
                
            </div>
            
        </div>
    </div>

    <div class="box" style="height: 100%;width: 68%;float: right;" >
      <div class="new0" id="screen" style="height: 100%;width: 99%; "  >
      </div>

         <div class="new1" style="height: 100%;width: 100%; hidden"  >
        <iframe src="<?php echo ($sshUrl); ?>" id="ssh"  class="ssh" style="width: 100%;height: 100%;">
        </iframe>

    
    </div>
    </div>


</body>



</html>

<script src="/Experiment/Public/Home/js/jquery-2.0.0.min.js"></script>
<script src="/Experiment/Public/Home/plugin/layer/layer.js" ></script>

<script type="module" crossorigin="anonymous" >
  
  import RFB from '/Experiment/Public/noVNC/core/rfb.js';
  console.log("jianhanke!");
  var url=document.getElementById("hiddenUrl").value;
  console.log(url);
   var rfb = new RFB(document.getElementById('screen'),url,{ credentials: { password: '123456' } }  );
  rfb.connect(); 
</script>
<script type="text/javascript">
  var ceshiUrl=document.getElementById("ceshiUrl").value;
  console.log(ceshiUrl);
  var sshUrl=document.getElementById("sshUrl").value;
       function  ceshi () {
           // document.getElementById("commandLine").click();
           // document.getElementById("picture").click();
           $(window.parent.document).find("#ssh").attr("src",sshUrl );
           document.getElementById("ceshi").onclick = '';
           // document.getElementById("picture").click();
        }
</script>




<script type="text/javascript">
        $(document).ready(function(){
            $(".point li a").click(function(){
                var order = $(".point li a").index(this);//获取点击之后返回当前a标签index的值
                $(".con" + order).show().siblings("div").hide();//显示class中con加上返回值所对应的DIV
            });
        })
</script>
<script type="text/javascript" src="/Experiment/Public/Home/js/Ueditor/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="/Experiment/Public/Home/js/Ueditor/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
            <script type="text/javascript">
                 var ue = UE.getEditor('container',{toolbars: [
                    ['fullscreen',  ],
                    ['bold', 'italic', 'underline',   'removeformat', 'formatmatch', 'autotypeset',   'forecolor','snapscreen','insertcode' ]
                          ] ,autoHeightEnabled:false } );
                        ue.ready(function(){
                            ue.setContent('<?php echo ($myNote); ?>');                
                        });
</script>

<script>

    function submitNote()  {
            var html = ue.getContent();
            document.getElementById('myForm').submit();
    }

</script>
<script>
$('#shareDesk').on('click', function(){
    layer.open({
      title: '共享桌面',
      type: 1,
      area: ['600px', '360px'],
      shadeClose: true, //点击遮罩关闭
      content: '\<\/b>只读共享操作链接: <br>   \<\input id="viewOnly" type="text" style="width: 350px;" value="<?php echo ($viewOnly); ?>" size="20" readonly="readonly">&nbsp;&nbsp;\<\input type="button"  value="点击复制"   name="share" onclick="videOnly()" ><br> <br> <br>  共享操作连接:<br> \<\input id="shareOperate" type="text" style="width: 350px;" value="<?php echo ($shareOperate); ?>" size="20" readonly="readonly">&nbsp;&nbsp;\<\input type="button"  value="点击复制"   name="share" onclick="shareOperate()" >'
    });
  });
 function videOnly(){
      var copy=document.getElementById('viewOnly');
        // copy = copy.value; // 修改文本框的内容
        copy.select(); // 选中文本
      document.execCommand("copy");
  };
function shareOperate(){
      var copy=document.getElementById('shareOperate');
        // copy = copy.value; // 修改文本框的内容
        copy.select(); // 选中文本
      document.execCommand("copy");
  };

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".point2 li a").click(function(){
                var order = $(".point2 li a").index(this);//获取点击之后返回当前a标签index的值
                $(".new" + order).show().siblings("div").hide();//显示class中con加上返回值所对应的DIV
            });
        })
</script>