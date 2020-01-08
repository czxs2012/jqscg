<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	</div>
	<head>
		<meta charset="UTF-8" />
		<!-- web view 每个页面必加 -->
		<meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=0.395, minimum-scale=0.395, maximum-scale=0.395, user-scalable=no" />
		<title>用户登录</title>
		<link rel="stylesheet" type="text/css" href="/LySoft_RC/Public/css/common.css" />
		<link rel="stylesheet" type="text/css" href="/LySoft_RC/Public/css/index.css" />
		<script type="text/javascript" src="/LySoft_RC/Public/js/jquery.min.js"></script>
		<script type="text/javascript" src="/LySoft_RC/Public/js/jquery.js"></script>
		<script type="text/javascript" src="/LySoft_RC/Public/js/index.js"></script>
		<script type="text/javascript" src="/LySoft_RC/Public/js/common.js"></script>
		<script>var module = '/LySoft_RC/index.php/Home';</script>
	</head>
	<style>
		.scan_code {
			width: 30rem;
			height: 6rem;
			line-height: 6rem;
			text-align: center;
			box-sizing: border-box;
			font-size: 2.4rem;
			letter-spacing: 0.3rem;
			color: #4382df;
			background-color: #fff;
			border: 0.1rem solid #4382df;
			border-radius: 3rem;
		}
	</style>
	<body>
		<div class="backgroud_box">

			<div class="login_box">
				<div class="logo middle">
					<img src="/LySoft_RC/Public/images/logo_blue.png" />
				</div>

				<div class="user_box middle">
					<div>
					<!--	<select id="bm">
							&lt;!&ndash;<option disabled selected value>&#45;&#45;请选择部门&#45;&#45;</option>&ndash;&gt;
							<option disabled="disabled">&#45;&#45;请选择部门&#45;&#45;</option>
						</select>-->
						<input id="ygbh" type="text" placeholder="请输入员工编号" style="color: #666666" />

						<input id="pwd" type="password" placeholder="请输入密码" style="color: #666666" />

					</div>
				</div>


				<div style="margin-top: 26%;width: 50%;display: flex;flex-direction: column;" class=" middle">
					<div style="width:426px;font-size: 2rem;margin-bottom: .5rem;">
						<input type="checkbox" name="auto_login" checked="checked" id='zddl' /> 自动登录
					</div>
					<button class="login" type="submit" id="login" onclick="login('/LySoft_RC/index.php/Home')" style="margin-top: 0;width: 100%;">立即登录</button>

				</div>
				<div style="margin-top: 46%;width: 50%;display: flex;flex-direction: column;" class=" middle">
					<button class="scan_code" onclick="clicked('index.php/home/plus/barcode_scan.html', true, true)"  style="margin-top: 0;">扫码登录</button>
				</div>
			</div>

		</div>

	</body>
	<script>
		$(function() {
			bm();
		})



	</script>
</html>