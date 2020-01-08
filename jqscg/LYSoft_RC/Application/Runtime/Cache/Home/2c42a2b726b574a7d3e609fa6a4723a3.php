<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8" name="viewport"
		content="width=device-width,initial-scale=0.395, minimum-scale=0.395, maximum-scale=0.395, user-scalable=no" />
    <!-- web view 每个页面必加 -->
<!--    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=0.395, minimum-scale=0.395, maximum-scale=0.395, user-scalable=no"/>-->
    <title>生产单进度</title>
    <link rel="stylesheet" type="text/css" href="/LYSoft_RC/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/LYSoft_RC/Public/css/tj.css">
    <script type="text/javascript" src="/LYSoft_RC/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/common.js"></script>
    <script type="text/javascript" src="/LYSoft_RC/Public/js/tj.js"></script>
    <script> var module = '/LYSoft_RC/index.php/Home';</script>
</head>
<body onload="ThisMonth()" style="height: 100%;margin-bottom: 0;">
    <div class="tit_box">
        <a onclick="javascript :history.back(-1);" class="back"></a>
        <div class="title_img"></div>
        <div class="title">生产单进度</div>
        <div class="title_picture" onclick="sx()">筛选</div>
    </div>

    <div class="delivery_box">

        <div class="fixed_box">
            <ul class="flex" id="top-sum">
                <li><div>总记录</div><div style="color: #00A042" id="zjl">7</div></li>
                <li><div>总匹数</div><div style="color: #FF4141" id="zps">280</div></li>
            </ul>120
        </div>

        <div class="delivery_content" id="content1">
            <!--<div class="delivery_info">-->
                <!--<span id="1" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>王洪</span></div>-->
                    <!--<div>编号: <span>AB20191231</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>已完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
            <!--<div class="delivery_info">-->
                <!--<span id="2" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>李强</span></div>-->
                    <!--<div>单号: <span>1903160002</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>已完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
            <!--<div class="delivery_info">-->
                <!--<span id="3" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>赵敏</span></div>-->
                    <!--<div>单号: <span>1903160003</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>已完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
            <!--<div class="delivery_info">-->
                <!--<span id="4" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>李一昭</span></div>-->
                    <!--<div>单号: <span>1903160004</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>未完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
            <!--<div class="delivery_info">-->
                <!--<span id="5" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>许逸之</span></div>-->
                    <!--<div>单号: <span>1903160005</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>未完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
            <!--<div class="delivery_info">-->
                <!--<span id="6" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>陈倩</span></div>-->
                    <!--<div>单号: <span>1903160006</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>未完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
            <!--<div class="delivery_info">-->
                <!--<span id="7" onclick="click_span(this.id, '/LYSoft_RC/index.php/Home')">-->
                    <!--<div>客户: <span>张依依</span></div>-->
                    <!--<div>单号: <span>1903160007</span></div>-->
                    <!--<div>品名: <span>人棉</span></div>-->
                    <!--<div>匹数: <span style="color: #FF4141">40</span></div>-->
                    <!--<div>状态: <span>已完成</span></div>-->
                    <!--<div>日期: <span>2019-03-16</span></div>-->
                <!--</span>-->
            <!--</div>-->
        <!--</div>-->
    </div>

    <div class="query_output_details_mask">
        <div class="query_output_details">
            <div class="query_output_details_title">请选择条件<span style="color: red">&nbsp;空即不筛选</span></div>
            <div class="query_output_details_info">
                <div>
                    <span>客户&nbsp;:</span>
                    <select id="khmc">
                        <option disabled selected value>--请选择客户--</option>
                        <option></option>
                        <option>王洪</option>
                        <option>赵敏</option>
                    </select>

                    <span>品名&nbsp;:</span>
                    <select id="pm">
                        <option disabled selected value>--请选择品名--</option>
                        <option></option>
                        <option>人棉</option>
                    </select>
                </div>
                <div>

                    <span>编号&nbsp;:</span>
                    <select id="dddh">
                        <option disabled selected value>--请选择单号--</option>
                        <option></option>
                        <option>1903160001</option>
                    </select>

                    <span>状态&nbsp;:</span>
                    <select id="jd">
                        <option disabled selected value>--请选择状态--</option>
                        <option value="2">全部</option>
                        <option value="0">未完成</option>
                        <option value="1">已完成</option>
                    </select>
                </div>
                <div>
                    开始日期&nbsp;:<input id="startTime" type="date" />
                </div>
                <div>
                    结束日期&nbsp;:<input id="endTime" type="date" />
                </div>
            </div>
            <div class="query_output_details_confirm" id="sx_qd">确定</div>
            <div class="query_output_details_cabcel">取消</div>
        </div>
    </div>
</body>
<script>
    $(function () {
        $('.query_output_details_mask').hide();
    })

    // $('.title_picture').click(function () {
    //     $('.query_output_details_mask').show();
    // })

    $('.query_output_details_cabcel').click(function () {
        $('.query_output_details_mask').hide();
    })

    $('.query_output_details_confirm').click(function () {
        $('.query_output_details_mask').hide();
        var startTime = document.getElementById("startTime").value;
        var endTime = document.getElementById("endTime").value;
        alert(startTime);
        alert(endTime);
    })
</script>
</html>