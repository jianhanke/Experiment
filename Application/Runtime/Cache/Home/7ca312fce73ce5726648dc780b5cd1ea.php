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
<select  id="select" >

  <option value="http://localhost:81/compile.php">C </option>
  <option value="http://localhost:82/compile.php">Java</option>
  <option value="http://localhost:83/compile.php">Python3.7.0</option>
  <option value="http://localhost:84/compile.php">php7.2</option>
  
</select>  
<br>  
<div style="height: 100%;width: 65%;float: left;"  >
    <form action=""  id="myform"  method="post"  style="height: 75%;" target="compile_iframe" >
        
        <input type="hidden" name="id" value="1"> 
        <!-- <script id="container"   name="myCode"     style="height: 100%;" scrolling="yes"> </script> -->
        <textarea   name="myCode" style="height: 100%;width: 99%"     /> </textarea>
        
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