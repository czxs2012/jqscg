<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="/LYSoft_RC/Public/css/rc-template-ddfh.css" />
		<title></title>
	</head>
	<script>
		var module = "/LYSoft_RC/index.php/Home";
		var img = "/LYSoft_RC/Public/images";
	</script>
	<body>
		<div id="template">
			<div class="templateTitle"><a href="<?php echo U('Jh/jh1');?>"><img src="/LYSoft_RC/Public/images/img/blue-back.png"></a>订单发货情况</div>
			<div class="templateSelectBox">
				<div class="floor">
					<div class="aSj">按时间<img src="/LYSoft_RC/Public/images/img/arrow.png"></div>
					<div class="aCk">按仓库<img src="/LYSoft_RC/Public/images/img/arrow.png"></div>
					<div class="aKh">按客户<img src="/LYSoft_RC/Public/images/img/arrow.png"></div>
					<div class="gd">更多<img src="/LYSoft_RC/Public/images/img/arrow.png"></div>
				</div>
				<div class="floor2">
					<div class="aJd">按结单</div>
					<div class="aPm">按品名</div>
					<div class="aGg">按规格</div>
					<div class="aYs">按颜色</div>
				</div>
			</div>
			<div class="templateContent">
				<div class="topContent"><span><div></div></span><span>隐藏结单和已发完数据</span></div>
				<ul>
					<li>
						<div class="liContent">
							<div class="liContentTop">
								<div class="liName"><img src="/LYSoft_RC/Public/images/img/white-icon-khmz.png">张若男</div>
								<div class="liZt">未结单s</div>
								<div class="lirq">2019-08-07</div>
							</div>
							<div class="liContentMiddle">
								<div><span>品名：</span>75D牛奶丝</div>
								<div><span>匹数：</span>1</div>
							</div>
							<div class="liContentMiddle">
								<div><span>流水号：</span>1</div>
								<div><span>规格：</span>170*50 cm/kg</div>
							</div>
							<div class="liContentBottom">
								<div><span style="margin-right: .5rem;">开单单号：</span>SDC5464456456466</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!-- <div class="templateZt">
				<div class="ztActive">全部</div>
				<div>未结单</div>
				<div>已结单</div>
				<div class="box"></div>
			</div> -->
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
		<script src="/LYSoft_RC/Public/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/LYSoft_RC/Public/js/Tools.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/LYSoft_RC/Public/js/rc-ddfhqk.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>