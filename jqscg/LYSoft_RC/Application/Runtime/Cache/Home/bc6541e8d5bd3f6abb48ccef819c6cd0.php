<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta name="HandheldFriendly" content="true"/>
		<meta name="MobileOptimized" content="320"/>
		<title>Hello H5+</title>
		<script type="text/javascript" src="/LYSoft_RC/Public/js/common.js"></script>
		<script type="text/javascript">
//function custom_close(){
//  
//      window.opener=null;
//      window.open('','_self');
//      window.close();
//
//}			
var ws=null,wo=null;
var scan=null,domready=false;
// H5 plus事件处理
function plusReady(){
	if(ws||!window.plus||!domready){
		return;
	}
	// 获取窗口对象
	ws=plus.webview.currentWebview();
//	alert(ws);
	wo=ws.opener();
	// 开始扫描
	ws.addEventListener('show', function(){
		var filter=[plus.barcode.CODE128,plus.barcode.EAN13,plus.barcode.QR];
		scan=new plus.barcode.Barcode('bcid', filter);
	    scan.onmarked=onmarked;
	    scan.start({conserve:true,filename:'_doc/barcode/'});
	}, false);
	// 显示页面并关闭等待框
//	exit;
    ws.show('pop-in');
    wo.evalJS('closeWaiting()');
}
if(window.plus){
	plusReady();
}else{
	document.addEventListener('plusready', plusReady, false);
}
// 监听DOMContentLoaded事件
document.addEventListener('DOMContentLoaded', function(){
	domready=true;
	plusReady();
}, false);
// 二维码扫描成功
function onmarked(type, result, file){
    switch(type){
    	case plus.barcode.QR:
    	type = 'QR';
    	break;
    	case plus.barcode.EAN13:
    	type = 'EAN13';
    	break;
    	case plus.barcode.EAN8:
    	type = 'EAN8';
    	break;
    	default:
    	type = '其它'+type;
    	break;
    }

    result = result.replace(/\n/g, '');
//  alert(result);
    wo.evalJS("scaned('"+ type +"','"+ result +"','"+ file +"');");
    back();
}
// 从相册中选择二维码图片 
function scanPicture(){
    plus.gallery.pick(function(path){
	    plus.barcode.scan(path,onmarked,function(error){
			plus.nativeUI.alert('无法识别此图片');
		});
    }, function(err){
        console.log('Failed: '+err.message);
    });
}
		</script>
		<link rel="stylesheet" href="/LYSoft_RC/Public/css/common.css" type="text/css" charset="utf-8"/>
		<style type="text/css">
#bcid {
	width: 100%;
	position: absolute;
	top: 0px;
	bottom: 44px;
	text-align: center;
}
.tip {
	color: #FFFFFF;
	font-weight: bold;
	text-shadow: 0px -1px #103E5C;
}
footer {
	width: 100%;
	height: 44px;
	position: absolute;
	bottom: 0px;
	line-height: 44px;
	text-align: center;
	color: #FFF;
}
.fbt {
	width: 50%;
	height: 100%;
	background-color: #FFCC33;
	float: left;
}
.fbt:active {
  	-webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.5);
	box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.5);
}
		</style>
	</head>
	<body style="background-color: #000000;">
		<div id="bcid">
			<div style="height:40%"></div>
			<p class="tip">...载入中...</p>
		</div>
		<footer>
			<div class="fbt" onclick="back()">取　 消</div>
			<div class="fbt" onclick="scanPicture()">从相册选择二维码</div>
		</footer>
	</body>
</html>