;
(function(window, $) {
	class CprktjContent {
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
									<div class="liZt"></div>
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
	class CprktjContentMx {
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
								<div><span>总数量：</span>${data.zsl}</div>
							</div>
							<div class="liline">
								<div><span>单位：</span>${data.dw}</div>
								<div><span>规格：</span>${data.gg}</div>
							</div>
							<div class="liline">
								<div><span>缸号/机号：</span>${data.gh}</div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>开单单号：</span><p>${data.kddh}</p></div>
							</div>
							<div class="liline">
								<div style="width: 100%;"><span>引用单号：</span><p>${data.yydh}</p></div>
							</div>
							<div class="liline">
								<div><span>仓库名称：</span>${data.ckmc}</div>
								<div><span>匹数：</span>${data.ps}</div>
							</div>
							<div class="liline">
								<div><span>单价：</span>${data.dj}</div>
								<div><span>金额：</span>${data.je}</div>
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
	class CprktjSelectMask {
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
	class CprktjSelectBox {
		constructor(e) {
			this.e = e;
			this.flag = true;
		};
		eventRegister(option) {
			var that = this;
			$(this.e).find('.aSj').click(()=>{option.aSj($(this.e).find('.aSj'))});
			$(this.e).find('.aGhs').click(()=>{option.aGhs($(this.e).find('.aGhs'))});
			$(this.e).find('.aPh').click(()=>{option.aPh($(this.e).find('.aPh'))});
			$(this.e).find('.aYs').click(()=>{option.aYs($(this.e).find('.aYs'))});
			$(this.e).find('.aGg').click(()=>{option.aGg($(this.e).find('.aGg'))});
			$(this.e).find('.aGh').click(()=>{option.aGh($(this.e).find('.aGh'))});
			$(this.e).find('.aCk').click(()=>{option.aCk($(this.e).find('.aCk'))});
			$(this.e).find('.gd').click(function() {
				if (that.flag) {
					$(this).addClass('selectActive');
					$('.floor2').animate({'height':'2.5rem'})
						that.flag = false;
				} else {
					$(this).removeClass('selectActive');
					$('.floor2').animate({'height':'0'})
					that.flag = true;
				};
			});
		};
	};
	window.CprktjContent = CprktjContent;
	window.CprktjContentMx = CprktjContentMx;
	window.CprktjSelectMask = CprktjSelectMask;
	window.CprktjSelectBox = CprktjSelectBox;
})(window, $);
//日期对象
window.dateObject = dateTool();
console.log(dateObject);
//new 实例对象
var cprktjContent = new CprktjContent($('.cprktjContent'));
var cprktjContentMx = new CprktjContentMx($('#cprktjContentMx'));
var cprktjSelectMask = new CprktjSelectMask($('#cprktjSelectMask'), dateObject);
var cprktjSelectBox = new CprktjSelectBox($('.cprktjSelectBox'));


var data = [{
	
	}
];
//请求数据
function request(fn) {
	$.ajax({
		type: 'get',
		url: module+'/jh/sxrktjcx',
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
cprktjContent.initAll(request, function(msg) {
	cprktjContentMx.init(msg);
});

function filterData(key, str) {
	if (str == '全部') {
		cprktjContent.initAll(request, function(msg) {
			cprktjContentMx.init(msg);
		});
		return;
	};
	var filterDataS = data.filter(function(item) {
		if (item[key].includes(str)) {
			return item;
		};
	});
	cprktjContent.init(filterDataS, function(msg) {
		cprktjContentMx.init(msg);
	});
};

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

function publicR(msg,e,key) {
	cprktjSelectMask.initAll(msg, function(str) {
		if (str == '全部') {
			selectMsg[key] = '';
			$(e).removeClass('selectActive');
			cprktjContent.initAll(request, function(msg) {
				cprktjContentMx.init(msg);
			});
			return;
		};
		selectMsg[key] = str;
		cprktjContent.initAll(request, function(msg) {
			cprktjContentMx.init(msg);
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
	cprktjSelectMask.init2({
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
			cprktjContent.initAll(request, function(msg) {
				cprktjContentMx.init(msg)
			});
			return;
		};
		$(e).addClass('selectActive');
		selectMsg.startDay = startDay;
		selectMsg.endDay = endDay;
		cprktjContent.initAll(request, function(msg) {
			cprktjContentMx.init(msg);
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
	startDay: '',
	endDay:'',
	ph:'',
	ys:'',
	gg:'',
	gh:'',
	ck:''
};

cprktjSelectBox.eventRegister({
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
	//按时间
	aSj: function(e) {
		publicTime(e);
	},
	//按批号
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
	//按缸号
	aGh: function(e) {
			$.ajax({
			type: 'post',
			url: module+'/jh/cxgh',
			data: {
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					if(i.gh==''){
						continue;
					}
					arr2.push(i.gh)
				}
				arr2.unshift('全部');
				publicR(arr2, e, 'gh');
			}
		});
	},
	//按仓库
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
});
