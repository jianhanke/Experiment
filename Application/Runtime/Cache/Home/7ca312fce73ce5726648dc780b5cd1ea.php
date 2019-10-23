<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style type="text/css">
    html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
    }

</style>

<body>
    
<div style="height: 100%;width: 65%;float: left;"  >
    <form action="http://localhost:81/compile.php"  id="form"  method="post"  style="height: 75%;" target="compile_iframe" >
    
        <input type="hidden" name="id" value="1"> 
        <script id="container"   name="myCode"     style="height: 100%;" scrolling="yes"> </script>
        
        <input type="submit" value="提交">  

    </form>
</div>

<div style="height: 100%;width: 35%;float: right; ">
    <iframe  name="compile_iframe"     style="height: 100%;width: 99%" ></iframe>

</div>

</body>
</html>
<script type="text/javascript" src="/Experiment/Public/Home/js/Ueditor/ueditor.config.js"></script>

    

                        <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="/Experiment/Public/Home/js/Ueditor/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
            <script type="text/javascript">
                 var ue = UE.getEditor('container',{toolbars: [
                    ['fullscreen',  ],
                    [ ]
                          ] ,autoHeightEnabled:false } );
                        ue.ready(function(){
                            ue.setContent('<?php echo ($myNote); ?>');                
                        });
        //     function ceshi(){
        //     var info=ue.getPlainTxt();
        //     console.log(info);
        //     document.getElementById("hidden").value=info;
        //     document.getElementById("form").submit();
        // }
</script>