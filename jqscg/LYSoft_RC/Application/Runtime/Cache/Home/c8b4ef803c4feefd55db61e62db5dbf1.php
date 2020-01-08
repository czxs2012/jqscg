<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="/LySoft_RC/Public/css/rc-zjwl.css" />
		<title></title>
	</head>
	<script>
		var module = "/LySoft_RC/index.php/Home";
	</script>
	<body>
		<div id="zjwl">
			<div class="zjwlTitle"><a href="<?php echo U('Jh/jh1');?>"><img src="/LySoft_RC/Public/images/img/blue-back.png"></a>资金往来</div>
			<div class="zjwlSelectBox">
				<div class="floor">
					<div class="aKh">按客户<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
					<div class="aSj">按时间<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
					<div class="aZt">按状态<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
					<!-- <div class="gd">更多<img src="/LySoft_RC/Public/images/img/arrow.png"></div> -->
				</div>
				<div class="floor2">
					<!-- <div class="aYs">按颜色</div>
					<div class="aGg">按规格</div> -->
				</div>
			</div>
			<div class="zjwlContent">
				<div class="topContent"><span><div></div></span><span>隐藏作废的单据</span></div>
				<ul>
					<li>
						
					</li>
				</ul>
			</div>
			<div class="zjwlZt">
				<div class="ztActive">客户</div>
				<div>加工商</div>
				<div>供货商</div>
				<div class="box"></div>
			</div>
			<div id="zjwlSelectMask">
				<input type="text" placeholder="请输入关键字搜索" value="" />
				<div class="dateS">
					<input type="date" value="" />-
					<input type="date" value="" />
				</div>
				<ul>
					<li>没有数据</li>
				</ul>
				<div class="maskBottom">
					<div>确定</div>
					<div>取消</div>
				</div>
			</div>
		</div>
		<script src="/LySoft_RC/Public/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/LySoft_RC/Public/js/Tools.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/LySoft_RC/Public/js/rc-zjwl.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>