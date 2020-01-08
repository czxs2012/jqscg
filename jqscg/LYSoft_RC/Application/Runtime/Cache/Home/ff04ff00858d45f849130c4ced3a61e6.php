<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="/LySoft_RC/Public/css/rc-template-jd.css" />
		<title></title>
	</head>
	<script>
		var img ="/LySoft_RC/Public/images/img";
		var module="/LySoft_RC/index.php/Home";
	</script>
	<body>
		<div id="template">
			<div class="templateTitle"><a href="<?php echo U('jh/jh1');?>"><img src="/LySoft_RC/Public/images/img/blue-back.png"></a>纱线销售订单统计</div>
			<div class="templateSelectBox">
				<div class="floor">
					<div class="aKh">按客户<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
					<div class="aSj">按时间<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
					<div class="aGg">按规格<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
					<div class="gd">更多<img src="/LySoft_RC/Public/images/img/arrow.png"></div>
				</div>
				<div class="floor2">
					<div class="aPh">按批号</div>
					<div class="aYs">按颜色</div>
				</div>
			</div>
			<div class="templateContent">
				<ul>

				</ul>
			</div>
			<div class="templateZt">
				<div class="ztActive">全部</div>
				<div>未结单</div>
				<div>已结单</div>
				<div class="box"></div>
			</div>
			<div id="templateContentMx">
				<div class="Mxtitle">详情信息</div>
				<ul>

				</ul>
				<div class="confirm">
					<div>确定</div>
				</div>
			</div>
			<div id="templateSelectMask">
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
		<script src="/LySoft_RC/Public/js/rc-sxxsddtj.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>