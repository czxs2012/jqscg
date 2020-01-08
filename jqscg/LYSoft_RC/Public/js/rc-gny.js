$('.zxdl').click(function() {
	$('.zxdlMask').css('display', 'flex');
	
});
$('.zxdlQx').click(function() {
	$('.zxdlMask').css('display', 'none');
});
$('.zxdlQd').click(function() {
	$.get(module+'/index/zxdl',{
		
	},function(data){
		if(data==1){
			location.href = '/LySoft_RC/index.php';
		}else{
			alert("操作失败");
			return false;
		}
		
	})
});
$('.xgmm').click(function() {
	$('.xgmmMask').css('display', 'flex');
});
$('.xgmmQx').click(function() {
	$('.xgmmMask').css('display', 'none');
});
$('.xgmmQd').click(function() {
	$('.xgmmMask').css('display', 'none');
	var pwd = $("#pwd").val();
	$.post(
	 module+'/index/xgmm',
	{
		pwd:pwd,
		
	},function(json){
		if(json.status==1){
			alert(json.message);
		}else{
			alert(json.message);
		}
		
		
	})
});
$('.srkhjh').click(function() {
	$('.srkhjhMask').css('display', 'flex');
});
$('.srkhjhQx').click(function() {
	$('.srkhjhMask').css('display', 'none');
});
$('.srkhjhQd').click(function() {
	$('.srkhjhMask').css('display', 'none');
});
