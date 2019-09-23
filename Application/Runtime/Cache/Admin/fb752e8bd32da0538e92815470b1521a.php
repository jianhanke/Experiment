<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>下拉框</title>
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        #nav {
            width: 600px;
            height: 40px;
            margin: 0 auto;
        }

        #nav ul {
            list-style: none;
        }

        #nav ul li {
            float: left;
            line-height: 40px;
            text-align: center;
            position: relative;
        }

        #nav ul li a {
            text-decoration: none;
            color: #000;
            display: block;
            padding: 0px 10px;
        }

        #nav ul li a:hover {
            color: #FFF;
            background: #333
        }

        #nav ul li ul {
            position: absolute;
            display: none;
        }

        #nav ul li ul li {
            float: none;
            line-height: 30px;
            text-align: left;
        }

        #nav ul li ul li a {
            width: 100%;
        }

        #nav ul li ul li a:hover {
            background-color: #06f;
        }

        #nav ul li:hover ul {
            display: block
        }
    </style>
</head>
<body>
<div id="nav">
    <ul>
        <li><a href="#">首页</a></li>
        <li><a href="#">学习中心</a>
            <ul>
                <li><a href="#">Oracle</a></li>
                <li><a href="#">MySQL</a></li>
                <li><a href="#">Python</a></li>
                <li><a href="#">mongodb</a></li>
                <li><a href="#">redis</a></li>
            </ul>
        </li>
        <li><a href="#">个人中心</a></li>
        <li><a href="#">关于我们</a></li>
    </ul>
</div>

</body>
</html>