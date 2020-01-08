<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Swiper demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
</head>
<script>
	var module = '/LYSoft_RCSM/index.php/Home';
	var img = "/LYSoft_RCSM/Public/images";
</script>

<body>
	<link rel="stylesheet" type="text/css" href="/LYSoft_RCSM/Public/css/rc-gny.css" />
	<div class="home">
		<div class="homeTitle">
			<div class="zxdl">注销登录</div>
			<div class="xgmm">修改密码</div><img src="/LYSoft_RCSM/Public/images/img/search.png">功能<div style="display: none;" class="srkhjh">
				输入卡号交货</div>
		</div>
		<div class="contentBox">
			<div class="content">
				<a class="scqk" href="<?php echo U('jh/rcscqk');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-wl-cgqk.png">
					<div>生产情况</div>
				</a>
				<a class="scqk" href="<?php echo U('jh/rccpck');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jinxiaocun.png">
					<div>产品仓库</div>
				</a>
				<a class="scqk" href="<?php echo U('jh/rcddgz');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>订单跟踪</div>
				</a>
				<a class="scqk" href="<?php echo U('jh/rc-zjwl');?>" >
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>资金往来</div>
				</a>
				<a class="scqk" style="display: none;" href="<?php echo U('Jh/rcsxck');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线仓库</div>
				</a>
				<a class="scqk" href="<?php echo U('Jh/rcddfhqk');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>订单发货情况</div>
				</a>
				<a class="scqk" href="<?php echo U('Jh/rccpcglhqk');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>产品采购来货情况</div>
				</a>
				<a class="scqk" style="" href="<?php echo U('Jh/rccpdbtj');?>" v>
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>产品调拨统计</div>
				</a>
				<a class="scqk"  style="display: none" href="<?php echo U('Jh/rccpbj');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>产品报价</div>
				</a>

				<a class="scqk"  style="display:none"  href="<?php echo U('Jh/rccppdtj');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>产品盘点统计</div>
				</a>
				<a class="scqk"  style="display:none" href="<?php echo U('Jh/rcllkdtj');?>" >
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>领料开单统计</div>
				</a>
				<a class="scqk"  style="display: none" href="<?php echo U('Jh/rcsxcglhqk');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线采购来货情况</div>
				</a>
				<a class="scqk" style="display: none" href="<?php echo U('Jh/rcsxcgtj');?>" >
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线采购统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxck');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线仓库</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxddfhqk');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线订单发货情况</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxrktj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线入库统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxdbtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线调拨统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxthtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线退货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxxsddtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线销售订单统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxxskdtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线销售开单统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxxsthtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线销售退货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rctlkdtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线退料开单统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwflhqk');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>外发来货情况</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwflhtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>外发来货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwfsxtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>外发纱线统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwfthtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>外发纱线退货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwwjgshqk');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>委外加工收货情况</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwwjgtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>委外加工统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwwshtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>委外收货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcwwthtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>委外退货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxzdtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>下织单统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxzlhqk');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>下织单来货情况</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxzlhtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>下织单来货情况</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxsddtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>销售订单来货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxsfhtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>销售发货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxskdtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>销售开单统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxsthjztj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>销售退货结帐统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcxsthtj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>销售退货统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcylsltj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>用料申领统计</div>
				</a>
				<a class="scqk"  href="<?php echo U('Jh/rcsxbj');?>" style="display: none">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>纱线报价</div>
				</a>
				<a class="scqk"  href="<?php echo U('Index/sm');?>">
					<img src="/LYSoft_RCSM/Public/images/img/jxc-cp-fhqk.png">
					<div>销售发货</div>
				</a>
			</div>
		</div>
		<div class="zxdlMask">
			<div class="zxdlbox">
				<div>注销登录</div>
				<div>是否退出登录</div>
				<div class="zxdlQd">确定</div>
				<div class="zxdlQx">取消</div>
			</div>
		</div>
		<div class="xgmmMask">
			<div class="xgmmbox">
				<div>修改密码</div>
				<input id="pwd" type="password" value="" />
				<div class="xgmmQd">确定</div>
				<div class="xgmmQx">取消</div>
			</div>
		</div>
		<div class="srkhjhMask">
			<div class="srkhjhbox">
				<div>输入卡号交货</div>
				<input type="text" placeholder="请输入卡号" />
				<div class="srkhjhQd">确定</div>
				<div class="srkhjhQx">取消</div>
			</div>
		</div>
	</div>
	<script src="/LYSoft_RCSM/Public/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/LYSoft_RCSM/Public/js/rc-gny.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>