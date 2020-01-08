;
(function(window, $) {
	class DdgzContent {
		constructor(e, img) {
			this.e = e;
			this.data = data;
			this.data2 = '';
			this.img = img;
		};
		initAll(request, callBack) {
			var that = this;

			function fn(data) {
				that.data = data;
				that.init(that.data, callBack);
			};
			request(fn);
		};
		init(data, callBack) {
			this.data2 = data;
			$(this.e).find('ul li').remove();
			for (var key in this.data2) {
				var li = document.createElement('li');
				li.innerHTML =
					`<div class="liContent">
								<div class="liContentTop">
									<div class="liName"><img src="${img}/white-icon-khmz.png"><div>${this.data2[key].khmc}</div></div>
									<div class="liZt">${this.data2[key].jd}</div>
									<div class="lirq">${this.data2[key].rq}</div>
								</div>
								<div class="liContentMiddle">
									<div><span>品名：</span>${this.data2[key].pm}</div>
									<div><span>匹数：</span>${this.data2[key].ps}</div>
								</div>
								<div class="liContentMiddle">
									<div><span>流水号：</span>${this.data2[key].lsdh}</div>
									<div><span>规格：</span>${this.data2[key].gg}</div>
								</div>
								<div class="liContentBottom">
									<div><span style="margin-right: .5rem;">开单单号：</span>${this.data2[key].dh}</div>
								</div>
							</div>`;
				$(this.e).find('ul').append(li);
			};
			$(this.e).find('ul').addClass('animate');
			$(this.e).find('ul').on('animationend', () => {
				$(this.e).find('ul').removeClass('animate');
			});
			this.eventRegister(callBack);
		};
		eventRegister(callBack) {
			var that = this;
			$(this.e).off().on('click', 'li', function() {
				var index = $(this).index();
				callBack(that.data2[index]);
			});
		};
	};
	class DdgzContentMx {
		constructor(e) {
			this.e = e;
		};
		init(data) {
			$(this.e).find('ul').remove();
			var ul = document.createElement('ul');
			ul.innerHTML =
				`<li>${data.khmc}</li>
						<li>
							<div class="liline">
								<div><span>品名：</span>${data.pm}</div>
								<div><span>编号：</span>${data.bh}</div>
							</div>
							<div class="liline">
								<div><span>流水号：</span>${data.lsdh}</div>
								<div><span>颜色：</span>${data.ysmc}</div>
							</div>
							<div class="liline">
								<div><span>匹数：</span>${data.ps}</div>
								<div><span>色号：</span>${data.yssh}</div>
							</div>
							<div class="liline">
								<div><span>重量：</span>${data.sl}</div>
								<div><span>单位：</span>${data.dw}</div>
							</div>
							<div class="liline">
								<div><span>规格：</span>${data.gg}</div>
								<div><span>结单状态：</span>${data.jd}</div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>开单单号：</span><p>${data.dh}</p></div>
							</div>
							<div class="liline">
								<div><span>生产匹数：</span>${data.scps}</div>
								<div><span>生产重量：</span>${data.scsl}</div>
							</div>
							<div class="liline">
								<div><span>入库匹数：</span>${data.rkps}</div>
								<div><span>入库重量：</span>${data.rksl}</div>
							</div>
							<div class="liline">
								<div><span>发货数量：</span>${data.fhsl}</div>
								<div><span>发货匹数：</span>${data.fhps}</div>
							</div>
							<div class="liline">
								<div><span>入库匹数(坯布)：</span>${data.rkpbps}</div>
								<div><span>入库重量(坯布)：</span>${data.rkpbsl}</div>
							</div>
							<div class="liline">
								<div><span>库存匹数(坯布)：</span>${data.kcps}</div>
								<div><span>当前重量(坯布)：</span>${data.kcsl}</div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>单据备注：</span>${data.djbz}</div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>记录备注：</span>${data.jlbz}</div>
							</div>
						</li>`;
			$(this.e).find('.confirm').before(ul);
			this.eventRegister();
			this.show();
		};
		show(callBack) {
			$(this.e).addClass('scale');
			$(this.e).on('animationend', () => {
				$(this.e).addClass('show')
				$(this.e).removeClass('scale');
				if (callBack) {
					callBack();
				};
			});
		};
		hidden(callBack) {
			$(this.e).addClass('scale2');
			$(this.e).on('animationend', () => {
				$(this.e).removeClass();
				if (callBack) {
					callBack();
				};
			});
		};
		eventRegister() {
			$(this.e).find('.confirm div').off().click(() => {
				this.hidden();
			});
		};
	};
	class DdgzSelectMask {
		constructor(e, date) {
			this.e = e;
			this.data = null;
			this.liIndex = null;
			this.date = date;
		};
		initAll(data, callBack,callBack2) {
			this.data = data;
			$(this.e).find('ul').html('');
			for (var key in data) {
				var li = document.createElement('li');
				li.innerText = data[key];
				$(this.e).find('ul').append(li);
			};
			this.show();
			this.eventRegister(callBack,callBack2);
		};
		init2(data, callBack,callBack2) {
			$(this.e).find('ul').html('');
			$(this.e).find('.dateS').css('display', 'flex');
			for (var key in data) {
				var li = document.createElement('li');
				li.innerText = data[key];
				$(this.e).find('ul').append(li);
			};
			this.show();
			this.eventRegister(callBack,callBack2);
		};
		init(data, callBack,callBack2) {
			$(this.e).find('ul').html('');
			for (var key in data) {
				var li = document.createElement('li');
				li.innerText = data[key];
				$(this.e).find('ul').append(li);
			};
			this.show();
			this.eventRegister(callBack,callBack2);
		};
		eventRegister(callBack,callBack2) {
			var that = this;
			callBack2($(this.e).find('li'));
			$(this.e).find('li').off().click(function() {
				that.liIndex = $(this).index();
				switch (true) {
					case $(that.e).find('li').eq(that.liIndex).text() == '今天':
						$(that.e).find('.dateS input:eq(0)').val(that.date.today);
						$(that.e).find('.dateS input:eq(1)').val(that.date.today);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '昨天':
						$(that.e).find('.dateS input:eq(0)').val(that.date.yesterday);
						$(that.e).find('.dateS input:eq(1)').val(that.date.yesterday);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '本周':
						$(that.e).find('.dateS input:eq(0)').val(that.date.week.startDay);
						$(that.e).find('.dateS input:eq(1)').val(that.date.week.endDay);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '本月':
						$(that.e).find('.dateS input:eq(0)').val(that.date.month.startDay);
						$(that.e).find('.dateS input:eq(1)').val(that.date.month.endDay);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '上半月':
						$(that.e).find('.dateS input:eq(0)').val(that.date.firstHalfMonth.startDay);
						$(that.e).find('.dateS input:eq(1)').val(that.date.firstHalfMonth.endDay);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '上月':
						$(that.e).find('.dateS input:eq(0)').val(that.date.lastMonth.startDay);
						$(that.e).find('.dateS input:eq(1)').val(that.date.lastMonth.endDay);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '今年':
						$(that.e).find('.dateS input:eq(0)').val(that.date.year.startDay);
						$(that.e).find('.dateS input:eq(1)').val(that.date.year.endDay);
						break;
					case $(that.e).find('li').eq(that.liIndex).text() == '去年':
						$(that.e).find('.dateS input:eq(0)').val(that.date.lastYear.startDay);
						$(that.e).find('.dateS input:eq(1)').val(that.date.lastYear.endDay);
						break;
				};
				$(this).addClass('liActive').siblings().removeClass('liActive');
			});
			$(this.e).find('.maskBottom div:eq(1)').off().click(() => {
				this.hidden();
				$(this.e).find('.dateS').css('display', 'none');
				$(this.e).find('input').val('');
			});
			if (callBack) {
				$(this.e).find('input').off().on('input', function() {
					if (that.data instanceof Object) {
						var arr = [];
						for (var key in that.data) {
							arr.push(that.data[key]);
						};
						var arr2 = arr.filter(function(item) {
							if (String(item).includes($(that.e).find('input').val())) {
								return item
							}
						});
						that.init(arr2);
					} else {
						var arr = that.data.filter(function(item) {
							if (String(item).includes($(that.e).find('input').val())) {
								return item
							}
						});
						that.init(arr);
					};
				});
				$(this.e).find('.maskBottom div:eq(0)').off().click(() => {
					if (this.liIndex != null) {
						this.hidden();
						$(this.e).find('.dateS').css('display', 'none');
						callBack($(that.e).find('li').eq(that.liIndex).text(), $(this.e).find('.dateS input:eq(0)').val(), $(this.e).find(
							'.dateS input:eq(1)').val());
						$(this.e).find('input').val('');
					};
				});
			};
		};
		show(callBack) {
			$(this.e).animate({
				'top': '0'
			}, callBack);
		};
		hidden(callBack) {
			$(this.e).animate({
				'top': '100%'
			}, callBack);
		};
	};
	class DdgzSelectBox {
		constructor(e) {
			this.e = e;
			this.flag = true;
		};
		eventRegister(option) {
			var that = this;
			$(this.e).find('.aKh').click(()=>{option.aKh($(this.e).find('.aKh'))});
			$(this.e).find('.aSj').click(()=>{option.aSj($(this.e).find('.aSj'))});
			$(this.e).find('.aBh').click(()=>{option.aBh($(this.e).find('.aBh'))});
			$(this.e).find('.aYs').click(()=>{option.aYs($(this.e).find('.aYs'))});
			$(this.e).find('.aJd').click(()=>{option.aJd($(this.e).find('.aJd'))});
			$(this.e).find('.aGg').click(()=>{option.aGg($(this.e).find('.aGg'))});
			$(this.e).find('.gd').click(function() {
				if (that.flag) {
					$(this).addClass('selectActive');
					$('.floor2').slideDown(function() {
						$('.floor2').css('display', 'flex');
						that.flag = false;
					});
				} else {
					$(this).removeClass('selectActive');
					$('.floor2').slideUp();
					that.flag = true;
				};
			});
		};
	};
	class DdgzZt {
		constructor(e) {
			this.e = e;
			this.qb = true;
			this.wjd = false;
			this.yjd = false;
		};
		eventRegister(option) {
			var that = this;
			$(this.e).find('div:eq(0)').click(function() {
				that.qb = true;
				that.wjd = false;
				that.yjd = false;
				var index = $(this).index();
				$(this).addClass('ztActive').siblings().removeClass('ztActive');
				$(that.e).find('.box').animate({
					'left': $(this).width() * index + 'px'
				}, 100, option.qb);
			});
			$(this.e).find('div:eq(1)').click(function() {
				that.qb = false;
				that.wjd = true;
				that.yjd = false;
				var index = $(this).index();
				$(this).addClass('ztActive').siblings().removeClass('ztActive');
				$(that.e).find('.box').animate({
					'left': ($(this).width() * index) + 'px'
				}, 100, option.wjd);
			});
			$(this.e).find('div:eq(2)').click(function() {
				that.qb = false;
				that.wjd = false;
				that.yjd = true;
				var index = $(this).index();
				$(this).addClass('ztActive').siblings().removeClass('ztActive');
				$(that.e).find('.box').animate({
					'left': ($(this).width() * index) + 'px'
				}, 100, option.yjd);
			});
		};
		pd() {
			var zt = '';
			switch (true) {
				case this.qb:
					zt = '全部'
					break;
				case this.wjd:
					zt = '未结单'
					break;
				case this.yjd:
					zt = '已结单'
					break;
			};
			return zt;
		};
	};
	window.DdgzContent = DdgzContent;
	window.DdgzContentMx = DdgzContentMx;
	window.DdgzSelectMask = DdgzSelectMask;
	window.DdgzSelectBox = DdgzSelectBox;
	window.DdgzZt = DdgzZt;
})(window, $);
//日期对象
window.dateObject = dateTool();
console.log(dateObject);
//new 实例对象
var ddgzContent = new DdgzContent($('.ddgzContent'), img);
var ddgzContentMx = new DdgzContentMx($('#ddgzContentMx'));
var ddgzSelectMask = new DdgzSelectMask($('#ddgzSelectMask'), dateObject);
var ddgzSelectBox = new DdgzSelectBox($('.ddgzSelectBox'));
var ddgzZt = new DdgzZt($('.ddgzZt'));


var data = [{
	rq: '2019-08-10',
	kddh: 'SDC5464456456466',
	khmc: '张若男',
	lsh: 1,
	bh: '75DNNS',
	pm: '牛奶丝',
	gg: '170*50 cm/kg',
	ys: '白色',
	sh: '51rf',
	dw: 'kg',
	ps: 200,
	zl: 50,
	jd: '未结单',
	djbz: '',
	jlbz: '',
	scps: 50,
	sczl: 500,
	fhps: 10,
	fhsl: 40,
	rkps: 50,
	rkzl: 100,
	rkpspb: 0,
	rkzlpb: 0,
	kczlpb: 0,
	kcpspb: 10,
	dqzlpb: -100
}, {
	rq: '2019-08-09',
	kddh: 'SDC5464456456466',
	khmc: '张三',
	lsh: 1,
	bh: '75DFS',
	pm: '纺纱',
	gg: '170*70 cm/kg',
	ys: '黑色',
	sh: '51rf',
	dw: 'kg',
	ps: 200,
	zl: 50,
	jd: '已结单',
	djbz: '',
	jlbz: '',
	scps: 50,
	sczl: 500,
	fhps: 10,
	fhsl: 40,
	rkps: 50,
	rkzl: 100,
	rkpspb: 0,
	rkpspb: 0,
	kczlpb: 0,
	kcpspb: 10,
	dqzlpb: -100
}];
//请求数据
function request(fn) {
	$.ajax({
		type: 'get',
		url: module + '/Jh/rcddgzcx',
		data: '',
		success: function(json) {
			data = [];
			for (var key in json) {
				data.push(json[key]);
			};
			fn(data);
		}
	});
	fn(data);
};
//加载全部
ddgzContent.initAll(request, function(msg) {
	ddgzContentMx.init(msg);
});
//给底部按钮注册事件
ddgzZt.eventRegister({
	qb: function() {
		ddgzContent.initAll(request, function(msg) {
			ddgzContentMx.init(msg);
		});
	},
	wjd: function() {
		var filterData = data.filter((item) => {
			if (item.jd.includes('未结单')) {
				return item;
			};
		});
		ddgzContent.init(filterData, function(msg) {
			ddgzContentMx.init(msg);
		});
	},
	yjd: function() {
		var filterData = data.filter((item) => {
			if (item.jd.includes('已结单')) {
				return item;
			};
		});
		ddgzContent.init(filterData, function(msg) {
			ddgzContentMx.init(msg);
		});
	}
});
//给顶部按钮注册事件
var selectMsg = {
	khmc: '',
	startDay: '',
	endDay: '',
	ys: '',
	bh: '',
	gg: '',
	jdzt: '',
	date:''
};
function pdztInit(str, key) {
	if (str == '全部') {
		if (ddgzZt.pd() == '全部') {
			ddgzContent.initAll(request, function(msg) {
				ddgzContentMx.init(msg);
			});
			return;
		};
		var filterData = data.filter((item) => {
			if (item.jd == ddgzZt.pd()) {
				return item;
			};
		});
		ddgzContent.init(filterData, function(msg) {
			ddgzContentMx.init(msg);
		});
	} else {
		if (ddgzZt.pd() == '全部') {
			var filterData = data.filter((item) => {
				if (String(item[key]).includes(str)) {
					return item;
				};
			});
			ddgzContent.init(filterData, function(msg) {
				ddgzContentMx.init(msg);
			});
			return;
		};
		var filterData = data.filter((item) => {
			if (String(item[key]).includes(str) && item.jd == ddgzZt.pd()) {
				return item;
			};
		});
		ddgzContent.init(filterData, function(msg) {
			ddgzContentMx.init(msg);
		});
	}
};
function publicRc(msg, key, e) {
	ddgzSelectMask.initAll(msg, function(str) {
		selectMsg.jdzt = ddgzZt.pd();
		ddgzContent.initAll(request, function(msg) {
			ddgzContentMx.init(msg);
		});
		if (str == '全部') {
			selectMsg[key] = '';
			$(e).removeClass('selectActive');
			ddgzContent.initAll(request, function(msg) {
				ddgzContentMx.init(msg);
			});
			return;
		};
		selectMsg[key] = str;
		$(e).addClass('selectActive');
		ddgzContent.initAll(request, function(msg) {
			ddgzContentMx.init(msg);
		});
	}, function(e2) {
		for (var i = 0; i < $(e2).length; i++) {
			if ($(e2).eq(i).text() == selectMsg[key]) {
				$(e2).eq(i).addClass('liActive');
			}
		}
	});
};

function publicRc2(e) {
	ddgzSelectMask.init2({
		0: '全部',
		1: '今天',
		2: '昨天',
		3: '本周',
		4: '本月',
		5: '上半月',
		6: '上月',
		7: '今年',
		8: '去年'
	}, function(str, startDay, endDay) {
		selectMsg.startDay = startDay;
		selectMsg.endDay = endDay;
		selectMsg.date = str;
		selectMsg.jdzt = ddgzZt.pd();
		su = str;
		switch (true) {
			case str == '全部':
				selectMsg.startDay = '';
				selectMsg.endDay = '';
				selectMsg.jdzt = '';
				$(e).removeClass('selectActive');
				ddgzContent.initAll(request, function(msg) {
					ddgzContentMx.init(msg);
				});
				return;
				break;
		};
		$(e).addClass('selectActive');
		ddgzContent.initAll(request, function(msg) {
			ddgzContentMx.init(msg);
		});
	}, function(e2) {
		$(e2).parent().parent().find('input:eq(1)').val(selectMsg.startDay);
		$(e2).parent().parent().find('input:eq(2)').val(selectMsg.endDay);
		for (var i = 0; i < $(e2).length; i++) {
			if ($(e2).eq(i).text() == selectMsg['date']) {
				$(e2).eq(i).addClass('liActive');
			};
		};
	});
};
ddgzSelectBox.eventRegister({
	//按客户
	aKh: function(e) {
		$.ajax({
			type: 'get',
			data: {
				ls: '客户'
			},
			url: module + '/jh/rckhcx',
			success: function(json) {
				var obj = {
					0: '全部'
				};
				for (var key in json) {
					for (var keys in json[key]) {
						obj[json[key][keys]] = json[key][keys]
					}
					 
				};
				publicRc(obj, 'khmc', e);
			},
		});

	},
	//按时间
	aSj: function(e) {
		publicRc2(e);
	},
	//按编号
	aBh: function(e) {
		$.ajax({
			type: 'get',
			data: {
				
			},
			url: module + '/jh/ddgzbhcx',
			success: function(json) {
				var obj = {
					0: '全部'
				};
				for (var key in json) {
					for (var keys in json[key]) {
						obj[json[key][keys]] = json[key][keys]
					}
					 
				};
				publicRc(obj, 'bh', e);
			},
		});
		
	},
	//按颜色
	aYs: function() {
		ddgzSelectMask.initAll(filterDataTj('ys'), function(str) {
			pdztInit(str, 'ys');
		});
	},
	//按规格
	aGg: function() {
		ddgzSelectMask.initAll(filterDataTj('gg'), function(str) {
			pdztInit(str, 'gg');
		});
	},
	aJd: function() {
		ddgzSelectMask.initAll({
			0: '全部',
			1: '未结单',
			2: '已结单'
		}, function(str) {
			pdztInit(str, 'jd');
		});
	},
});
