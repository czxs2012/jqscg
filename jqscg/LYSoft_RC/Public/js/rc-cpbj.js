;
(function(window, $) {
	class ZjwlContent {
		constructor(e) {
			this.e = e;
			this.data = data;
			this.data2 = '';
			this.flag = false;
			this.zFlag = true;
		};
		init(data) {
			this.data2 = data;
			$(this.e).find('ul li').remove();
			for (var key in this.data2) {
				var li = document.createElement('li');
				li.innerHTML =
					`<div class="ticketLeft"></div>
						<div class="ticketRight">
							<div class="ticketTop">
								<div class="ticketContent1">
									<div><span>${this.data2[key].khls}</span>${this.data2[key].khmc}</div>
									<div><span>编号：</span>${this.data2[key].bh}</div>
									<div><span>价格：</span>${this.data2[key].jg}</div>
									<div><span>最高价：</span>${this.data2[key].zgj}</div>
								</div>
								<div class="ticketContent2">
									<div><span>日期：</span>${this.data2[key].rq}</div>
									<div><span>品名：</span>${this.data2[key].pm}</div>
									<div><span>历史价：</span>${this.data2[key].lsj}</div>
									<div><span>最低价：</span>${this.data2[key].zdj}</div>
								</div>
							</div>
						</div>`;
				if (this.data2[key].zf == '作废') {
					$(li).addClass('text')
				};
				$(this.e).find('ul').append(li);
			};
			$(this.e).find('ul').addClass('animate');
			$(this.e).find('ul').on('animationend', () => {
				$(this.e).find('ul').removeClass('animate');
			});

		};
		eventRegister(data) {
			var that = this;
			if (this.zFlag) {
				$(this.e).find('.topContent span').parent().find('div').addClass('topActive');
				var arr = data.filter(function(item) {
					if (item.zf != '作废') {
						return item
					};
				});
				that.init(arr);
			} else {
				$(this).parent().find('div').removeClass('topActive');
				that.init(data);
			};
			$(this.e).find('.topContent span').off().click(function() {
				if (that.flag) {
					that.flag = false;
					that.zFlag = true;
					$(this).parent().find('div').addClass('topActive');
					var arr = data.filter(function(item) {
						if (item.zf != '作废') {
							return item
						};
					});
					that.init(arr);
				} else {
					that.flag = true;
					that.zFlag = false;
					$(this).parent().find('div').removeClass('topActive');
					that.init(data);
				};
			});
		};
	};
	class ZjwlSelectMask {
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
			callBack2($(this.e).find('li'));
			var that = this;
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
						callBack($(that.e).find('li').eq(that.liIndex).text(), $(that.e).find('.dateS input:eq(0)').val(), $(that.e).find(
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
	class ZjwlSelectBox {
		constructor(e) {
			this.e = e;
			this.flag = true;
		};
		eventRegister(option) {
			var that = this;
			$(this.e).find('.aKh').click(()=>{option.aKh($(this.e).find('.aKh'))});
			$(this.e).find('.aSj').click(()=>{option.aSj($(this.e).find('.aSj'))});
			$(this.e).find('.aPm').click(()=>{option.aPm($(this.e).find('.aPm'))});
		};
	};
	class ZjwlZt {
		constructor(e) {
			this.e = e;
			this.kh = true;
			this.jgs = true;
			this.ghs = true;
		};
		eventRegister(option) {
			var that = this;
			$(this.e).find('div:eq(0)').click(function() {
				that.kh = true;
				that.jgs = false;
				that.ghs = false;
				var index = $(this).index();
				$(this).addClass('ztActive').siblings().removeClass('ztActive');
				$(that.e).find('.box').animate({
					'left': $(this).width() * index + 'px'
				}, 100, option.kh);
			});
			$(this.e).find('div:eq(1)').click(function() {
				that.kh = false;
				that.jgs = true;
				that.ghs = false;
				var index = $(this).index();
				$(this).addClass('ztActive').siblings().removeClass('ztActive');
				$(that.e).find('.box').animate({
					'left': ($(this).width() * index) + 'px'
				}, 100, option.jgs);
			});
			$(this.e).find('div:eq(2)').click(function() {
				that.kh = false;
				that.jgs = false;
				that.ghs = true;
				var index = $(this).index();
				$(this).addClass('ztActive').siblings().removeClass('ztActive');
				$(that.e).find('.box').animate({
					'left': ($(this).width() * index) + 'px'
				}, 100, option.ghs);
			});
		};
	};
	window.ZjwlContent = ZjwlContent;
	window.ZjwlSelectMask = ZjwlSelectMask;
	window.ZjwlSelectBox = ZjwlSelectBox;
	window.ZjwlZt = ZjwlZt;
})(window, $);
//日期对象
window.dateObject = dateTool();

//new 实例对象
var zjwlContent = new ZjwlContent($('.zjwlContent'));
var zjwlSelectMask = new ZjwlSelectMask($('#zjwlSelectMask'), dateObject);
var zjwlSelectBox = new ZjwlSelectBox($('.zjwlSelectBox'));
var zjwlZt = new ZjwlZt($('.zjwlZt'));
var data = [{
	}
];
var selectMsg = {
	ls:'客户',
	mc:'',
	startDay:'',
	endDay:'',
	date:'',
	pm:'',
}
//请求数据
function request() {
	//var selectmsg1 = JSON.stringify(selectMsg)
	$.ajax({
		type: 'post',
		url: module + '/jh/rccpbjcx',
		data: selectMsg,
		success: function(json) {
			data = [];
			for (var key in json) {
				data.push(json[key]);
			};
			zjwlContent.init(data);
		}
	});
};
 request()
//加载客户全部
function init(str) {
	var filterData = data.filter((item) => {
		if (item.khls.includes(str)) {
			return item;
		};
	});
	zjwlContent.init(filterData);
	zjwlContent.eventRegister(filterData);
};
// init('客户');

function filterDataTj(str) {
	var obj = {
		0: '全部'
	};
	data.forEach(function(item, i) {
		if (item.khls == pd()) {
			if (item[str] != '') {
				obj[item[str]] = item[str];
			};
		};
	});
	return obj;
};

function filterDataTj2(str) {
	var obj = {
		0: '全部'
	};
	data.forEach(function(item, i) {
		if (item.khls == pd()) {
			if (item[str] != '') {
				obj[item[str]] = item[str];
			};
		};
	});
	return obj;
};
// $('.zjwlContent').find('.topContent span:eq(0)').click();
//给底部按钮注册事件
zjwlZt.eventRegister({
	kh: function() {
		selectMsg.ls = '客户';
		selectMsg.mc = '';
		request();
	},
	jgs: function() {
		selectMsg.ls = '加工商';
		selectMsg.mc = '';
		request();
	},
	ghs: function() {
		selectMsg.ls = '供货商';
		selectMsg.mc = '';
		request();
	}
});
//给顶部按钮注册事件
function requestTj(data, fn) {
	$.ajax({
		type: '',
		url: '',
		data: data,
		success: fn
	});
};

function pd() {
	switch (true) {
		case zjwlZt.kh:
			var ls = '客户';
			break;
		case zjwlZt.jgs:
			var ls = '加工商';
			break;
		case zjwlZt.ghs:
			var ls = '供货商';
			break;
	};
	return ls;
};
function publicRc(msg, key, e) {
	zjwlSelectMask.initAll(msg, function(str) {
		if (str == '全部') {
			selectMsg[key] = '';
			selectMsg.ls = pd();
			$(e).removeClass('selectActive');
			request();
			return;
		};
		selectMsg[key] = str;
		selectMsg.ls = pd();
		$(e).addClass('selectActive');
		request();
	}, function(e2) {
		for (var i = 0; i < $(e2).length; i++) {
			if ($(e2).eq(i).text() == selectMsg[key]) {
				$(e2).eq(i).addClass('liActive');
			}
		}
	});
};
function publicRc2(e) {
	zjwlSelectMask.init2({
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
		selectMsg.ls = pd();
		su = str;
		switch (true) {
			case str == '全部':
				selectMsg.startDay = '';
				selectMsg.endDay = '';
				selectMsg.jdzt = '';
				$(e).removeClass('selectActive');
				request();
				return;
				break;
		};
		request();
		$(e).addClass('selectActive');
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
zjwlSelectBox.eventRegister({
	//按客户
	aKh: function(e) {
		$.ajax({
			type: 'post',
			url: module + '/jh/rckhcx',
			data: {
				lx: '客户'
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.khmc)
				}
				arr2.unshift('全部');
				publicRc(arr2,'mc',e);
			}
		});
	},
	//按时间
	aSj: function(e) {
		 publicRc2(e);
	},
	//按品名
	aPm: function(e) {
		publicRc(filterDataTj2('pm'), 'pm', e);
	}
});
