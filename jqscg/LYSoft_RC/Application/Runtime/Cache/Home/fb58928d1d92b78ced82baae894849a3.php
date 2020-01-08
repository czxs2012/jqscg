<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title></title>
	</head>
	<script>
		var module = '/LySoft_RC/index.php/Home';
		var img = '/LySoft_RC/Public/images'+'/img/';
	</script>
	<body >
		<link rel="stylesheet" type="text/css" href="/LySoft_RC/Public/css/rc-scqk.min.css" />
		<div class="scqkBox" id="scqk">
			<div class="scqkTitle">
				<a href="rc-gny.html" ><img src="/LySoft_RC/Public/images/img/back.png" alt=""></a>
				<div>
					<img src="/LySoft_RC/Public/images/img/search.png" alt="">
					生产情况
				</div>
			</div>
			<div class="scqkRqSx">
				<div class="rqhk"></div>
				<div class="scqkJt rqActive">今天</div>
				<div class="scqkZt">昨天</div>
				<div class="scqkBz">本周</div>
				<div class="scqkGd">更多</div>
			</div>
			<input type="text" class="scqkMzSx" placeholder="请输入客户名字或关键字">
			<div class="scqkLb">
				<div id="quanbu">
				</div>
				<div id="scqkWjd"></div>
				<div id="scqkYjd"></div>
			</div>
			<div class="scqkZtXz">
				<div class="scqkQb scqkZtActive">全部</div>
				<div class="scqkWjd">未结单</div>
				<div class="scqkYjd">已结单</div>
				<div class="scqkZtXzHk"></div>
			</div>
			<div class="dateSelect">
				<div class="dateBox">
					<input type="date" class="startDay">至
					<input type="date" class="endDay">
					<div class="confirm">确定</div>
					<div class="cancel">取消</div>
				</div>
			</div>
			<div class="xxjmBox">
				<div class="xxjm">

				</div>
			</div>
		</div>
		<script type="text/javascript" src="/LySoft_RC/Public/js/jquery-2.2.3.min.js"></script>
		<script src="/LySoft_RC/Public/js/Tools.min.js"></script>
		<script src="/LySoft_RC/Public/js/rc-scqk-main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="/LySoft_RC/Public/js/rc-scqk.js"></script>
	</body>
</html>