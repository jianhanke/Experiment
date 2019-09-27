<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style type="text/css">
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
            width: 1000px;
            height: 1000px;
            border: 1px solid green;
            display: none;
        }
        .box .con0{
            display: block;
        }
        x
    </style>
<body>
        <ul class="point">
            <li><a href="#">menu0</a></li>
            <li><a href="#">menu1</a></li>
            <li><a href="#">menu2</a></li>
            <li><a href="#">menu3</a></li>
            <li><a href="#">menu4</a></li>
            <li><a href="#">menu5</a></li>
            <li><a href="#">menu6</a></li>
            <li><a href="#">menu7</a></li>
        </ul>
        <div class="box">
            <div class="con0">d0</div>
            <div class="con1"><iframe src="http://localhost:8888/?hostname=172.19.0.101&username=root&password=MTIzNDU2"  style="width: 100%;height: 100%;">
    
        </iframe></div>
            <div class="con2">d2</div>
            <div class="con3">d3</div>
            <div class="con4">d4</div>
            <div class="con5">d5</div>
            <div class="con6">d6</div>
            <div class="con7">d7</div>
        </div>
    </body>
</html>
<script src="/Experiment/Public/Home/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".point li a").click(function(){
                var order = $(".point li a").index(this);//获取点击之后返回当前a标签index的值
                $(".con" + order).show().siblings("div").hide();//显示class中con加上返回值所对应的DIV
            });
        })
    </script>