<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>


<link rel=stylesheet href="/Experiment/Public/Home/plugin/codemirror/doc/docs.css">
<link rel="stylesheet" href="/Experiment/Public/Home/plugin/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="/Experiment/Public/Home/plugin/codemirror/addon/hint/show-hint.css">

<script src="/Experiment/Public/Home/plugin/codemirror/lib/codemirror.js"></script>
<script src="/Experiment/Public/Home/plugin/codemirror/addon/hint/show-hint.js"></script>
<script src="/Experiment/Public/Home/plugin/codemirror/addon/hint/anyword-hint.js"></script>
<script src="/Experiment/Public/Home/plugin/codemirror/mode/javascript/javascript.js"></script>


<style type="text/css">
    html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
    }
</style>

<body>
<select  id="select" >

    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; echo ($data); endforeach; endif; else: echo "" ;endif; ?>

</select>  
<br>  


<div style="height: 100%;width: 65%;float: left; "  >
    <form action=""  id="myform"  method="post"  style="height: 75%;" target="compile_iframe" >
        
        <input type="hidden" name="id" value="1"> 
        <!-- <script id="container"   name="myCode"     style="height: 100%;" scrolling="yes"> </script> -->
        <textarea  id="myCode" name="myCode"  style="height: 100%;width: 99%"   /> </textarea>
        
        <input type="button" value="提交"  onclick="ceshi()" >  

    </form>
</div>

<div style="height: 100%;width: 35%;float: right; ">
    <iframe  name="compile_iframe"     style="height: 100%;width: 99%" ></iframe>

</div>

</body>
</html>
<script type="text/javascript">
    function ceshi(){
        var url=document.getElementById('select').value;  
        console.log(url);
        document.getElementById('myform').setAttribute('action',url);
        document.getElementById('myform').submit();
    }

    

</script>

<script>
    CodeMirror.commands.autocomplete = function(cm) {
        cm.showHint({hint: CodeMirror.hint.anyword});
      }
      var editor = CodeMirror.fromTextArea(document.getElementById("myCode"), {
        lineNumbers: true,
        extraKeys: {"Ctrl-Space": "autocomplete"}
      });
</script>