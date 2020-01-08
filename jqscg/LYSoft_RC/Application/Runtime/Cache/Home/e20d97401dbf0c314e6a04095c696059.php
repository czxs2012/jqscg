<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <!-- web view 每个页面必加 -->
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=0.395, minimum-scale=0.395, maximum-scale=0.395, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="/LYSoft_RC/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/LYSoft_RC/Public/css/mx.css"/>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/common.js"></script>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/mx.js"></script>
    <script> var module = '/LYSoft_RC/index.php/Home';</script>
    <title>生产单明细</title>
</head>
<body>
<div class="tit_box">
    <a onclick="javascript :history.back(-1);" class="back"></a>
    <div class="title_img"></div>
    <div class="title">生产单明细</div>
</div>

<div class="ticket_box">
    <div class="fixed_box">

        <ul class="flex">
            <li><div>编号</div><span id="dddh"></span></li>
            <li><div>客户</div><span id="khmc"></span></li>
            <li><div>品名</div><span id="pm"></span></li>
            <li><div>规格</div><span id="gg"></span></li>
        </ul>

        <div class="ticket_info_title">
            <div>颜色</div>
            <div>匹数</div>
            <div>工序</div>
            <div>状态</div>
        </div>
    </div>
    <div class="ticket_info_content" id="content">
        <!--<div>深蓝</div>-->
        <!--<div>10</div>-->
        <!--<div>前定</div>-->
        <!--<div style="color: #4382df">2019-03-12 14:25:33</div>-->

        <!--<div>深蓝</div>-->
        <!--<div>10</div>-->
        <!--<div>松布</div>-->
        <!--<div>未完成</div>-->
    </div>
</div>
</body>
<script>
    cxmx();
</script>
</html>