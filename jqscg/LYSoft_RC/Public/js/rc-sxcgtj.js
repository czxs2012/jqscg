;
(function(window, $) {
	class TemplateContent {
		constructor(e) {
			this.e = e;
			this.data = data;
			this.data2 = '';
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
									<div class="liName"><img src="${img}/white-icon-khmz.png"><div>${this.data2[key].ghs}</div></div>
									<div class="liZt">${this.data2[key].jd}</div>
									<div class="lirq">${this.data2[key].rq}</div>
								</div>
								<div class="liContentMiddle">
									<div><span>纱线名称：</span>${this.data2[key].sxmc}</div>
									<div><span>件数：</span>${this.data2[key].js}</div>
								</div>
								<div class="liContentMiddle">
									<div><span>流水号：</span>${this.data2[key].lsh}</div>
									<div><span>规格：</span>${this.data2[key].gg}</div>
								</div>
								<div class="liContentBottom">
									<div><span style="margin-right: .5rem;">开单单号：</span>${this.data2[key].kddh}</div>
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
	class TemplateContentMx {
		constructor(e) {
			this.e = e;
		};
		init(data) {
			$(this.e).find('ul').remove();
			var ul = document.createElement('ul');
			ul.innerHTML =
				`<li>${data.ghs}</li>
						<li>
							<div class="liline">
								<div><span>纱线名称：</span>${data.sxmc}</div>
								<div><span>批号：</span>${data.ph}</div>
							</div>
							<div class="liline">
								<div><span>流水号：</span>${data.lsh}</div>
								<div><span>颜色：</span>${data.ys}</div>
							</div>
							<div class="liline">
								<div><span>件数：</span>${data.js}</div>
								<div><span>单位：</span>${data.dw}</div>
							</div>
							<div class="liline">
								<div><span>总数量：</span>${data.zsl}</div>
								<div><span>规格：</span>${data.gg}</div>
							</div>
							<div class="liline">
								<div><span>单价：</span>${data.dj}</div>
								<div><span>金额：</span>${data.je}</div>
							</div>
							<div class="liline">
								<div><span>仓库名称：</span>${data.ckmc}</div>
								<div><span>结单状态：</span>${data.jd}</div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>开单单号：</span><p>${data.kddh}</p></div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>备注：</span>${data.bz}</div>
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
	class TemplateSelectMask {
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
	class TemplateSelectBox {
		constructor(e) {
			this.e = e;
			this.flag = true;
		};
		eventRegister(option) {
			var that = this;
			$(this.e).find('.aGhs').click(()=>{option.aGhs($(this.e).find('.aGhs'))});
			$(this.e).find('.aSj').click(()=>{option.aSj($(this.e).find('.aSj'))});
			$(this.e).find('.aCk').click(()=>{option.aCk($(this.e).find('.aCk'))});
			$(this.e).find('.aGh').click(()=>{option.aGh($(this.e).find('.aGh'))});
			$(this.e).find('.aPh').click(()=>{option.aPh($(this.e).find('.aPh'))});
			$(this.e).find('.aYs').click(()=>{option.aYs($(this.e).find('.aYs'))});
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
	class TemplateZt {
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
	window.TemplateContent = TemplateContent;
	window.TemplateContentMx = TemplateContentMx;
	window.TemplateSelectMask = TemplateSelectMask;
	window.TemplateSelectBox = TemplateSelectBox;
	window.TemplateZt = TemplateZt;
})(window, $);
//日期对象
window.dateObject = dateTool();
console.log(dateObject);
//new 实例对象
var templateContent = new TemplateContent($('.templateContent'));
var templateContentMx = new TemplateContentMx($('#templateContentMx'));
var templateSelectMask = new TemplateSelectMask($('#templateSelectMask'), dateObject);
var templateSelectBox = new TemplateSelectBox($('.templateSelectBox'));
var templateZt = new TemplateZt($('.templateZt'));


var data = [{
	
}];
//请求数据
function request(fn) {
	$.ajax({
		type: 'get',
		url: module+ '/jh/rcsxcgtjcx',
		data: selectMsg,
		success: function(json) {
			data = [];
			for (var key in json) {
				data.push(json[key]);
			};
			fn(data);
		}
	});
};
//加载全部
templateContent.initAll(request, function(msg) {
	templateContentMx.init(msg);
});
//给底部按钮注册事件
templateZt.eventRegister({
	qb: function() {
		selectMsg.zt = templateZt.pd();
		templateContent.initAll(request, function(msg) {
			templateContentMx.init(msg);
		});
	},
	wjd: function() {
		selectMsg.zt = templateZt.pd();
		templateContent.initAll(request, function(msg) {
			templateContentMx.init(msg);
		});
	},
	yjd: function() {
		selectMsg.zt = templateZt.pd();
		templateContent.initAll(request, function(msg) {
			templateContentMx.init(msg);
		});
	}
});
//给顶部按钮注册事件
function filterDataTj(str) {
	var obj = {
		0: '全部'
	};
	data.forEach(function(item, i) {
		if(item[str] != ''){
			obj[item[str]] = item[str];
		};
	});
	return obj;
};
function pdztInit(str, key) {
	if (str == '全部') {
		if (templateZt.pd() == '全部') {
			templateContent.initAll(request, function(msg) {
				templateContentMx.init(msg);
			});
			return;
		};
		var filterData = data.filter((item) => {
			if (item.jd == templateZt.pd()) {
				return item;
			};
		});
		templateContent.init(filterData, function(msg) {
			templateContentMx.init(msg);
		});
	} else {
		if (templateZt.pd() == '全部') {
			var filterData = data.filter((item) => {
				if (String(item[key]).includes(str)) {
					return item;
				};
			});
			templateContent.init(filterData, function(msg) {
				templateContentMx.init(msg);
			});
			return;
		};
		var filterData = data.filter((item) => {
			if (String(item[key]).includes(str) && item.jd == templateZt.pd()) {
				return item;
			};
		});
		templateContent.init(filterData, function(msg) {
			templateContentMx.init(msg);
		});
	}
};

function publicR(msg,e,key) {
	templateSelectMask.initAll(msg, function(str) {
		if (str == '全部') {
			selectMsg[key] = '';
			$(e).removeClass('selectActive');
			templateContent.initAll(request, function(msg) {
				templateContentMx.init(msg);
			});
			return;
		};
		selectMsg[key] = str;
		templateContent.initAll(request, function(msg) {
			templateContentMx.init(msg);
		});
		$(e).addClass('selectActive');
	}, function(e2) {
		for (var i = 0; i < $(e2).length; i++) {
			if ($(e2).eq(i).text() == selectMsg[key]) {
				$(e2).eq(i).addClass('liActive');
			}
		}
	});
};
function publicTime(e) {
	templateSelectMask.init2({
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
		selectMsg.date = str;
		if (str == '全部') {
			selectMsg.startDay = '';
			selectMsg.endDay = '';
			$(e).removeClass('selectActive');
			templateContent.initAll(request, function(msg) {
				templateContentMx.init(msg)
			});
			return;
		};
		$(e).addClass('selectActive');
		selectMsg.startDay = startDay;
		selectMsg.endDay = endDay;
		templateContent.initAll(request, function(msg) {
			templateContentMx.init(msg)
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
var selectMsg = {
	ghs: '',
	ck: '',
	startDay: '',
	endDay:'',
	ph:'',
	ys:'',
	gg:'',
	zt:'',
};


templateSelectBox.eventRegister({
	//按供货商
	aGhs: function(e) {
		$.ajax({
			type: 'post',
			url: module+'/jh/rckhcx',
			data: {
				lx:'供货商'
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.ghsmc)
				}
				arr2.unshift('全部');
				publicR(arr2, e, 'ghs');
			}
		});
	},
	//仓库
	aCk: function(e) {
		$.ajax({
			type: 'post',
			url: module+'/jh/cpcktjsx',
			data: {
				tj:'ck'
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.ckmc)
				}
				arr2.unshift('全部');
				publicR(arr2, e, 'ck');
			}
		});
	},
	//按时间
	aSj: function(e) {
		publicTime(e);
	},
	//按编号
	aPh: function(e) {
			$.ajax({
			type: 'post',
			url: module+'/jh/cxph',
			data: {
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.ph)
				}
				arr2.unshift('全部');
				publicR(arr2, e, 'ph');
			}
		});
	},
	//按颜色
	aYs: function(e) {
			$.ajax({
			type: 'post',
			url: module+'/jh/cpcktjsx',
			data: {
				tj:'ys'
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.ysmc)
				}
				arr2.unshift('全部');
				publicR(arr2, e, 'ys');
			}
		});
	},
	//按规格
	aGg: function(e) {
			$.ajax({
			type: 'post',
			url: module+'/jh/cxsxgg',
			data: {
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.gg)
				}
				arr2.unshift('全部');
				publicR(arr2, e, 'gg');
			}
		});
	},
});
