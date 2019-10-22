<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	

	<form action="<?php echo U('OnlineCompile/startCompile');?>"  method="post">
	
		<input type="" name="id" value="1">	
		<script id="container"   name="myCode"  style="height: 100%;" scrolling="yes"> </script>
		<input type="submit" value="提交"  onclick="ceshi()">  

	</form>

</body>
</html>
<script>

function ceshi (){
    var info=document.getElementById("container").innerHTML;
console.log(info);
}

var one=escape("<p>#include&lt;stdio.h&gt;</p><p>int main(){</p><p>printf(&quot;ceshi&quot;)</p><p>}</p>");
var two=unescape(one);
console.log(one);
console.log(two);
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