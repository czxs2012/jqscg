<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			#scan {
				width: 200px;
				height: 200px;
				background-color: red;
			}
			#nav {
				width: 100%;
				height: 40px;
				display: flex;
				align-items: center;
				justify-content: center;
				background-color: white;
				color: #333;
				font-size: 1.2rem;
				font-weight: 500;
				position: absolute;
				top: 0;
				left: 0;
				z-index: 999;
			}
			img {
				height: 30%;
				position: absolute;
				left: 4%;
				top: 56%;
			}
		</style>
		<script type="text/javascript">
			function pick() {
				plus.gallery.pick(function(path) {
					plus.barcode.scan(path, onmarked, function(error) {
						plus.nativeUI.alert('无法识别此图片');
					});
				}, function(err) {
					console.log('Failed: ' + err.message);
				})
			}
			function onmarked(type, result) {
				var text = '未知: ';
				switch (type) {
					case plus.barcode.QR:
						text = 'QR: ';
						break;
					case plus.barcode.EAN13:
						text = 'EAN13: ';
						break;
					case plus.barcode.EAN8:
						text = 'EAN8: ';
						break;
				}
				obj.close()
				opener.evalJS('scan('+result+')')
			}
			var obj,opener;
			document.addEventListener('plusready', function() {
				obj = plus.webview.currentWebview();
				obj.addEventListener('close', function() {
					obj = null;
				});
				plus.navigator.setStatusBarStyle("dark");
				var barcode = null;
				barcode = plus.barcode.create('barcode', [plus.barcode.QR, plus.barcode.EAN13, plus.barcode.EAN8,plus.barcode.CODE128], {
					top: '0px',
					left: '0px',
					width: '100%',
					height: '100%',
					position: 'static',
					frameColor: '#7cda5e',
					scanbarColor: '#7cda5e',
				});
				barcode.onmarked = onmarked;
				plus.webview.currentWebview().append(barcode);
				barcode.start();
				opener = obj.opener()
			})
		</script>
	</head>

	<body>
		<div id="nav">
			<img src="Public/img/home-arrow2.png" alt />
		</div>
	</body>

</html>