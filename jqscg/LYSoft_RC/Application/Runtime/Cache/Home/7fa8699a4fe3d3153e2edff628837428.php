<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="/LySoft_RC/Public/css/rc-cpck.css"/>
	<title></title>
</head>
<script type="application/javascript">
	var module = '/LySoft_RC/index.php/Home';
</script>
<body>
	<div id="cpck">
		<div class="cpckTitle">产品仓库</div>
		<div class="selectBox">
			<div class="floor">
				<div class="aCk">按仓库<img src="/LySoft_RC/Public/images/img/arrow.png" ></div>
				<div class="aPm">按品名<img src="/LySoft_RC/Public/images/img/arrow.png" ></div>
				<div class="aGg">按规格<img src="/LySoft_RC/Public/images/img/arrow.png" ></div>
				<div class="gd">更多<img src="/LySoft_RC/Public/images/img/arrow.png" ></div>
			</div>
			<div class="floor2">
				<div class="aYs">按颜色</div>
				<div class="aGh">按缸号</div>
			</div>
		</div>
		<div class="cpckContent">
			<div class="topContent"><span><div></div></span><span>隐藏库存为0的数据</span></div>
			<ul>
				
			</ul>
		</div>
		<div class="cpckBack">
			<a class="back" style="text-decoration: none;" href="<?php echo U('Jh/rc-gny');?>"><div class="back">返回</div></a>
		</div>
		<div id="selectMask">
			<input type="text"  placeholder="请输入关键字搜索" value=""/>
			<ul>
				<li>没有数据</li>
			</ul>
			<div class="maskBottom"><div>确定</div><div>取消</div></div>
		</div>
	</div>
	<script src="/LySoft_RC/Public/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/LySoft_RC/Public/js/rc-cpck.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>