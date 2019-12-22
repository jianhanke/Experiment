<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    /**{margin:0; padding:0}；*/
    *{padding:0; margin:0;}
 
    
    html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
    }

a{
            text-decoration:none;
        }
        #screen{
              
              left: 0;
              right: 0;
              margin: auto;
        }

</style>
<body>  
    
    
    
      <input type="hidden"  id='hiddenUrl' value="<?php echo ($url); ?>">
      <div id="screen"  style="height: 100%;width: 68%;float: center; " >
          
      </div>

</body>



</html>

<script type="module" crossorigin="anonymous" >
  
  import RFB from '/Experiment/Public/Home/plugin/noVNC/core/rfb.js';
  console.log("jingjing");
  var url=document.getElementById("hiddenUrl").value;
  console.log(url);
   var rfb = new RFB(document.getElementById('screen'),url,{ credentials: { password: '123456' } }  );
   rfb.clipViewport=true;
  rfb.connect();
  
  // console.log(rfb);
  // rfb.connect();

</script>