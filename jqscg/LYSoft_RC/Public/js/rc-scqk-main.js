//列表对象
class Ticket {
	constructor(quanbu, wjd, yjd, xxjm,imgUrl) {
		this.elQb = quanbu;
		this.elWjd = wjd;
		this.elYjd = yjd;
		this.elXxjm = xxjm;
		this.img = imgUrl
		this.msgQb = [];
		this.msgWjd = [];
		this.msgYjd = [];
	};
	init(msg) {
		$(this.elQb).find('.scTicket').remove();
		$(this.elWjd).find('.scTicket').remove();
		$(this.elYjd).find('.scTicket').remove();
		if (msg) {
			switch (true) {
				case msg instanceof Array:
					this.msgQb = msg;
					this.msgQb.forEach((item) => {
						this.ticketTemplate(this.elQb, item);
					});
					this.msgQb.filter((item) => {
						if (item.jdzt == '未结单') {
							this.msgWjd.push(item);
							this.ticketTemplate(this.elWjd, item);
						}
					});
					this.msgQb.filter((item) => {
						if (item.jdzt == '已结单') {
							this.msgYjd.push(item);
							this.ticketTemplate(this.elYjd, item);
						}
					});
					break;
				case msg instanceof Object:
					this.msgQb = [];
					for (var key in msg) {
						this.msgQb.push(msg[key]);
					};
					this.msgQb.forEach((item) => {
						this.ticketTemplate(this.elQb, item);
					});
					this.msgQb.filter((item) => {
						if (item.jdzt == '未结单') {
							this.msgWjd.push(item);
							this.ticketTemplate(this.elWjd, item);
						}
					});
					this.msgQb.filter((item) => {
						if (item.jdzt == '已结单') {
							this.msgYjd.push(item)
							this.ticketTemplate(this.elYjd, item);
						}
					});
					break;
			};
		};
	};
	initQb(msg){
		$(this.elQb).find('.scTicket').remove();
		if (msg) {
			switch (true) {
				case msg instanceof Array:
					msg.forEach((item) => {
						console.log(item)
						this.ticketTemplate(this.elQb, item);
					});
					break;
				case msg instanceof Object:
					for (var key in msg) {
						this.ticketTemplate(this.elQb, msg[key]);
					};
					break;
			};
		};
	};
	initWjd(msg){
		$(this.elWjd).find('.scTicket').remove();
		if (msg) {
			switch (true) {
				case msg instanceof Array:
					msg.filter((item) => {
						if(item.jdzt == '未结单'){
						this.ticketTemplate(this.elWjd, item);
						};
					});
					break;
				case msg instanceof Object:
					for (var key in msg) {
						if(msg[key].jdzt == '未结单'){
							this.ticketTemplate(this.elWjd, msg[key]);
						};
					};
					break;
			};
		};
	};
	initYjd(msg){
		$(this.elYjd).find('.scTicket').remove();
		if (msg) {
			switch (true) {
				case msg instanceof Array:
					msg.filter((item) => {
						if(item.jdzt == '已结单'){
							
						this.ticketTemplate(this.elYjd, item);
						};
					});
					break;
				case msg instanceof Object:
					for (var key in msg) {
						if(msg[key].jdzt == '已结单'){
							
						this.ticketTemplate(this.elYjd, msg[key]);
						};
					};
					break;
			};
		};
	};
	eventRegister() {
		var that = this;
		//详细信息界面------------------------------------
		$('.scqkBox').off().on('click', '.queding', function() {
			$('.xxjmBox').css('display', 'none');
		});
		//全部
		$(this.elQb).off().on('click', '.scTicket', function() {
			$('.xxjmBox').css('display', 'flex');
			var i = $(this).index();
			that.xxjmTemplate(that.msgQb[i]);
		});
		//未结单
		$(this.elWjd).off().on('click', '.scTicket', function() {
			$('.xxjmBox').css('display', 'flex');
			var i = $(this).index();
			that.xxjmTemplate(that.msgWjd[i]);
		});
		//已结单
		$(this.elYjd).off().on('click', '.scTicket', function() {
			$('.xxjmBox').css('display', 'flex');
			var i = $(this).index();
			that.xxjmTemplate(that.msgYjd[i]);
		});
	};
	animate(canvas, person) {
		var a = -5;
		var step = person / 5 - 5;
		var ctx = canvas.getContext('2d');
		var x = canvas.width / 2;
		var y = canvas.height / 2 + 11;
		ctx.beginPath();
		ctx.strokeStyle = '#ccc';
		ctx.lineWidth = 2;
		ctx.arc(x, y, 15, Math.PI * -.5, Math.PI *1.5);
		ctx.stroke();
		var timerID = setInterval(() => {
			a += 1;
			if(person != 0){
				if (a > step) {
					clearInterval(timerID);
					return
				};
				ctx.beginPath();
				ctx.strokeStyle = '#43b1df';
				ctx.lineWidth = 2;
				ctx.arc(x, y, 15, Math.PI * -.5, Math.PI * (a / 10));
				ctx.fillStyle = '#000000'
				ctx.font = '12px,黑体';
				ctx.fillText(person + '%', x - 11, y + 5);
				ctx.stroke();
			}else{
				ctx.fillStyle = '#000000'
				ctx.font = '12px,黑体';
				ctx.fillText('生产进度'+person + '%', x - 20, y + 5);
				ctx.stroke();
			};
			
		}, 25);
	};
	animate2(canvas, person) {
		var a = -5;
		var step = person / 5 - 5;
		var x = canvas.width;
		var y = canvas.height;
		var ctx = canvas.getContext('2d');
		ctx.beginPath();
		ctx.lineWidth = 2;
		ctx.moveTo(x * .55, y * .5);
		ctx.arc(x * .55, y * .5, x * .2, Math.PI * -.5, Math.PI * 1.5);
		ctx.fillStyle = '#ccc';
		ctx.fill();
		var timerID = setInterval(function() {
			a += 1
			if(person !=0){
				if (a > step) {
					clearInterval(timerID);
					ctx.beginPath();
					ctx.fillStyle = '#43b1df';
					ctx.font = x * .07 + 'px 黑体';
					ctx.fillText(person + '%', x * .5 - x * .2, y * .5 - y * .28);
					return
				}
				ctx.beginPath();
				ctx.lineWidth = 2;
				ctx.moveTo(x * .55, y * .5);
				ctx.arc(x * .55, y * .5, x * .2, Math.PI * -.5, Math.PI * (a / 10));
				ctx.fillStyle = '#43b1df';
				ctx.fill();
				ctx.beginPath();
				ctx.fillStyle = '#43b1df';
				ctx.font = x * .06 + 'px 黑体';
				ctx.fillText('生产进度', x * .5 - x * .45, y * .5 - y * .28);
				ctx.beginPath();
				ctx.strokeStyle = '#AAAAAA';
				ctx.lineWidth = 1;
				ctx.moveTo(x * .5 - x * .1, y * .5 - y * .1)
				ctx.lineTo(x * .5 - x * .2, y * .5 - y * .1);
				ctx.lineTo(x * .5 - x * .2 - x * .08, y * .5 - y * .2);
				ctx.stroke();
			}else{
				ctx.beginPath();
				ctx.fillStyle = '#43b1df';
				ctx.font = x * .07 + 'px 黑体';
				ctx.fillText('生产进度'+person + '%', x * .5 - x * .2, y * .5 - y * .28);
			};
			
			
		}, 25)
	};
};
Ticket.prototype.ticketTemplate = function(el, obj) {
	var ticket = document.createElement('div');
	ticket.classList.add('scTicket');
	ticket.innerHTML =
		`
		<div class="floorUp">
			<div class="box1">
				<div><img src="${this.img}icon-zt.png" alt="">${obj.jdzt}</div>
			</div>
			<div class="box2">
				<img src="${this.img}icon-khmz.png" alt="" class="khimg">
				<div class="scKhMc">${obj.khmc}</div>
			</div>
			<div class="box3">
				<div class="box3_1">
					<div><img src="${this.img}icon-pm.png" alt="">品名</div>
					<div class="scPm">${obj.pm}</div>
				</div>
				<div class="box3_2">
					<div><img src="${this.img}icon-dh.png" alt="">单号</div>
					<div class="scDh">${obj.kddh}</div>
				</div>
			</div>
		</div>
		<div class="floorDown">
			<div class="lsh">
				<div>
					<img src="${this.img}icon-lsh.png" alt="">
					流水号
				</div>
				<div>${obj.lsh}</div>
			</div>
			<div class="scRq">
				<div><img src="${this.img}icon-date.png" alt="">日期</div>
				<div>${obj.rq}</div>
			</div>
		</div>
	`;
	el.appendChild(ticket);
	var canvas = document.createElement('canvas');
	$(ticket).find('.box1').append(canvas);
	canvas.width = $(ticket).find('.box1').width() / 4;
	canvas.height = $(ticket).find('.box1').height();
	ticket.style.display = 'none';
	console.log(obj)
	$(ticket).slideDown(() => {
		setTimeout(() => {
			this.animate(canvas, parseFloat(obj.scjd));
		}, 100)
	});
};
Ticket.prototype.xxjmTemplate = function(obj) {
	var ul = document.createElement('ul');
	ul.innerHTML =
		`
						<li class="khxxbox">
							<div class="khxx">
								<div>客户：</div>
								<div>${obj.khmc}</div>
							</div>
							<div class="khxx">
								<div>日期：</div>
								<div>${obj.rq}</div>
							</div>
							<div class="khxx">
								<div>开单单号：</div>
								<div>${obj.kddh}</div>
							</div>
							<div class="khxx">
								<div>订单单号：</div>
								<div>${obj.dddh}</div>
							</div>
						</li>
						<li class="pmxxBox">
							<div class="pmxx"><span>品名：</span>${obj.pm}</div>
							<div class="pmxx"><span>流水号：</span>${obj.lsh}</div>
							<div class="pmxx"><span>编号：</span>${obj.bh}</div>
							<div class="pmxx"><span>颜色：</span>${obj.ys}</div>
							<div class="pmxx"><span>规格：</span>${obj.gg}</div>
							<div class="pmxx"><span>单位：</span>${obj.dw}</div>
							<div class="pmxx"><span>生产匹数：</span>${obj.scps}</div>
							<div class="pmxx"><span>生产重量：</span>${obj.sczl}</div>
							<div class="pmxx"><span>入库匹数：</span>${obj.rkps}</div>
							<div class="pmxx"><span>入库重量：</span>${obj.rkzl}</div>
							<div class="pmxx"><span>未入匹数：</span>${obj.wrps}</div>
							<div class="pmxx"><span>未入重量：</span>${obj.wrzl}</div>
						</li>
						<li class="jdztbox">
							<div>${obj.jdzt}</div>
							<div >
							</div>
							
						</li>
						<li class="queding">确定</li>
					`;
	$(this.elXxjm).find('ul').remove();
	this.elXxjm.appendChild(ul);
	var canvas = document.createElement('canvas');
	canvas.width = $(ul).find('li:eq(2) div:eq(1)').width() * .95;
	canvas.height = $(ul).find('li:eq(2) div:eq(1)').height();
	$(ul).find('li:eq(2) div:eq(1)').append(canvas)
	setTimeout(() => {
		this.animate2(canvas, parseFloat(obj.scjd))
	}, 200)
};
//结单状态---------------------------------------
var zt = '全部';
var startDate = null;
var endDate = null;
function ztEventRegister(arr,today,yesterday,week,callBack) {
	console.log(arr)
	//全部
	$('.scqkQb').off().click(function() {
		zt = '全部';
		//滑块的动画
		$(this).addClass('scqkZtActive').siblings().removeClass('scqkZtActive')
			.siblings('.scqkZtXzHk').stop().animate({
				'left': '0%'
			}, 200);
		//内容的动画
		$('#quanbu').css('z-index', '11').stop().animate({
			'left': '0'
		}, () => {
			$('#quanbu').siblings().css('left', '100%').siblings().css('z-index', '10');
		});
		//清空搜索框
		$('.scqkMzSx').val('');
		$('.scTicket').remove()
		$.ajax({
			type:'post',
			url:module+'/Jh/scqkcx',
			data:{
				zt:zt,
				startDay:startDate,
				endDay:endDate
			},
			success:function(json){
				arr = json;
				addTicket.init(arr);
			}
		});
	});
	//未结单
	$('.scqkWjd').off().click(function() {
		zt = '未结单';
		//滑块的动画
		$(this).addClass('scqkZtActive').siblings().removeClass('scqkZtActive')
			.siblings('.scqkZtXzHk').stop().animate({
				'left': '33.333333%'
			}, 200);
		//内容的动画	
		$('#scqkWjd').css('z-index', '11').stop().animate({
			'left': '0'
		}, () => {
			$('#scqkWjd').siblings().css({
				'left': '100%'
			}).siblings().css('z-index', '10');
		});
		//清空搜索框
		$('.scqkMzSx').val('');
		$('.scTicket').remove()
		$.ajax({
			type:'post',
			url:module+'/Jh/scqkcx',
			data:{
				zt:zt,
				startDay:startDate,
				endDay:endDate
			},
			success:function(json){
				arr = json;
				addTicket.initWjd(arr);
			}
		});
	});
	//已结单
	$('.scqkYjd').off().click(function() {
		zt = '已结单';
		//滑块的动画
		$(this).addClass('scqkZtActive').siblings().removeClass('scqkZtActive')
			.siblings('.scqkZtXzHk').stop().animate({
				'left': '66.666666%'
			}, 200);
		//内容的动画		
		$('#scqkYjd').css('z-index', '11').stop().animate({
			'left': '0'
		}, () => {
			$('#scqkYjd').siblings().css({
				'left': '100%'
			}).siblings().css('z-index', '10');
		});
		//清空搜索框
		$('.scqkMzSx').val('');
		$('.scTicket').remove()
		$.ajax({
			type:'post',
			url:module+'/Jh/scqkcx',
			data:{
				zt:zt,
				startDay:startDate,
				endDay:endDate
			},
			success:function(json){
				arr = json;
				addTicket.initYjd(arr);
			}
		});
	});
	//----------------------------------------------
	
	//名字搜索
	$('.scqkMzSx').off().on('input', function() {
		if (arr instanceof Object) {
			var array = [];
			for (var key in arr) {
				array.push(arr[key])
			};
		};
		var newdata = array.filter(function(item) {
			if (item.khmc.includes($('.scqkMzSx').val())) {
				return item;
			}
		});
		switch (true) {
			case $('.scqkQb ').hasClass('scqkZtActive'):
				$('#quanbu').find('.scTicket').remove();
				addTicket.initQb(newdata);
				break;
			case $('.scqkWjd').hasClass('scqkZtActive'):
				$('#scqkWjd').find('.scTicket').remove();
				addTicket.initWjd(newdata);
				break;
			case $('.scqkYjd').hasClass('scqkZtActive'):
				$('#scqkYjd').find('.scTicket').remove();
				addTicket.initYjd(newdata);
				break;
		};
	});
	//-------------------------------------------------
	
	//日期------------------------------------------------
	
	//今天
	$('.scqkJt').off().click(function() {
		$(this).siblings().removeClass('rqActive')
			.siblings('.rqhk').stop().animate({
				'left': '0%'
			}, 200, () => {
				$(this).addClass('rqActive');
			});
			$.ajax({
				type:today.type,
				url:today.url,
				data:today.data,
				dataType:today.dataType,
				success:today.success,
				error:today.error
			});
	});
	//默认一进界面就点击今天按钮
	$('.scqkJt').click();
	//昨天
	$('.scqkZt').off().click(function() {
		$(this).siblings().removeClass('rqActive')
			.siblings('.rqhk').stop().animate({
				'left': '25%'
			}, 200, () => {
				$(this).addClass('rqActive');
			});
			console.log(1)
			$.ajax({
				type:yesterday.type,
				url:yesterday.url,
				data:yesterday.data,
				dataType:yesterday.dataType,
				success:yesterday.success,
				error:yesterday.error
			});
	});
	//本周
	$('.scqkBz').off().click(function() {
		$(this).siblings().removeClass('rqActive')
			.siblings('.rqhk').stop().animate({
				'left': '50%'
			}, 200, () => {
				$(this).addClass('rqActive');
			});
			$.ajax({
				type:week.type,
				url:week.url,
				data:week.data,
				dataType:week.dataType,
				success:week.success,
				error:week.error
			});
	});
	//更多
	$('.scqkGd').off().click(function() {
		var old;
		var that = this;
		Array.prototype.forEach.call($(this).siblings(), (item) => {
			if ($(item).hasClass('rqActive')) {
				old = item
			}
		})
		$(this).siblings().removeClass('rqActive')
			.siblings('.rqhk').stop().animate({
				'left': '75%'
			}, 200, () => {
				$(this).addClass('rqActive');
				$('.dateSelect').css('display', 'flex')
			});
		//更多的确定
		$('.dateBox .confirm').off().click(function() {
			if ($('.startDay').val() == '' && $('.endDay').val() == '' || ($('.startDay').val() != '' && $('.endDay').val() ==
					'')) {
				alert('请输入正确日期');
				return;
			};
			callBack($('.startDay').val(),$('.endDay').val());
			$('.dateSelect').css('display', 'none');
		});
		//更多的取消
		$('.dateBox .cancel').off().click(function() {
			if ($('.startDay').val() == '' && $('.endDay').val() == '' || $('.endDay').val() != '') {
				$(old).click();
			};
			$('.dateSelect').css('display', 'none');
		});
	});
	//----------------------------------------------
};
