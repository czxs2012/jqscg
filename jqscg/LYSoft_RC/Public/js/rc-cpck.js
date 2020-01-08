;
(function(window, $) {
	//内容对象
	class Content {
		constructor(e) {
			this.e = e;
			this.beforeScroll = 0;
			this.animateFlag = true;
			this.flag = true;
			this.data = data;

		};
		initAll(requset) {
			var that = this;

			function fn(data) {
				that.data = data;
				that.init(that.data);
			};
			requset(fn);
		};
		init(data) {
			$(this.e).find('ul li').remove();
			for (var key in data) {
				var li = document.createElement('li');
				
				li.innerHTML =
					`<div class="tTop"><p>${data[key].pm}</p><p>${data[key].ckmc}</p></div>
								<div class="tContent">
									<div>编号：${data[key].bh}</div>
									<div>缸号：${data[key].gh}</div>
								</div>
								<div class="tContent">
									<div>匹数：${data[key].ps}</div>
									<div>规格：${data[key].gg}</div>
								</div>
								<div class="tContent">
									<div>颜色：${data[key].ys}</div>
									<div>总重量(kg)：${data[key].zzl = data[key].zzl.includes('.') ?  data[key].zzl.substring(0, data[key].zzl.indexOf('.')+5) :  data[key].zzl}</div>
								</div>
								<div class="tContent">
									<div>实际数（kg）：${data[key].sjs = data[key].sjs.includes('.') ?  data[key].sjs.substring(0, data[key].sjs.indexOf('.')+5) :  data[key].sjs}</div>
									<div>在途数(kg)：${data[key].zts = data[key].zts.includes('.') ?  data[key].zts.substring(0, data[key].zts.indexOf('.')+5) :  data[key].zts}</div>
								</div>
								<div class="tContent">
									<div>单位：${data[key].dw}</div>
									<div></div>
								</div>`;
				$(this.e).find('ul').append(li);
			};
			$(this.e).find('ul').addClass('animate');
			$(this.e).find('ul').on('animationend', () => {
				$(this.e).find('ul').removeClass('animate');
			});
		};
		clearEvent() {
			this.flag = true;
			$(this.e).find('.topContent span').parent().find('div').removeClass('topActive');
		};
		eventRegister(data) {
			var that = this;
			$(this.e).find('ul').on('scroll', () => {
				if (this.animateFlag) {
					this.animateFlag = false;
					var afterScroll = $(this.e).find('ul').scrollTop();
					var scrollStep = afterScroll - this.beforeScroll;
					scrollStep = scrollStep > 0 ? 'up' : 'down';
					this.beforeScroll = afterScroll;
					if (scrollStep == 'down') {
						$('.cpckTitle').stop().animate({
							'height': '0'
						}, () => {
							this.animateFlag = true;
						});
					} else if (scrollStep == 'up') {
						$('.cpckTitle').stop().animate({
							'height': '2.5rem'
						}, () => {
							this.animateFlag = true;
						});
					};
				};
			});
			if(that.flag){
				that.flag = false;
				$(this.e).find('.topContent span').parent().find('div').addClass('topActive');
				var arr = data.filter(function(item) {
					if (item.zzl != 0) {
						return item
					};
				});
				that.init(arr);
			};
			$(this.e).find('.topContent span').off().click(function() {
				if (that.flag) {
					that.flag = false;
					$(this).parent().find('div').addClass('topActive');
					var arr = data.filter(function(item) {
						if (item.zzl != 0) {
							return item
						};
					});
					that.init(arr);
				} else {
					that.flag = true;
					$(this).parent().find('div').removeClass('topActive');
					that.init(data);
				};
			});
		};
	};
	//筛选对象	
	class Select {
		constructor(e) {
			this.e = e;
			this.flag = true;
			this.data = data;
		};
		eventRegister(aCkOption, aGhOption, aPmOption, aYsOption, aGgOption) {
			var that = this;
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
			$('.aCk').click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				$.ajax({
					type: aCkOption.type,
					url: aCkOption.url,
					data: aCkOption.data,
					dataType: aCkOption.dataType,
					success: aCkOption.success,
					error: aCkOption.error
				});
			});
			$('.aGh').click(function() {
				$('#selectMask').animate({
					'top': '0',
					
				});
				aGhOption.callBack();
			});
			$('.aPm').click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				$.ajax({
					type: aPmOption.type,
					url: aPmOption.url,
					data: aPmOption.data,
					dataType: aPmOption.dataType,
					success: aPmOption.success,
					error: aPmOption.error
				});
			});
			$('.aYs').click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				$.ajax({
					type: aYsOption.type,
					url: aYsOption.url,
					data: aYsOption.data,
					dataType: aYsOption.dataType,
					success: aYsOption.success,
					error: aYsOption.error
				});
			});
			$('.aGg').click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				$.ajax({
					type: aGgOption.type,
					url: aGgOption.url,
					data: aGgOption.data,
					dataType: aGgOption.dataType,
					success: aGgOption.success,
					error: aGgOption.error
				});
			});
		};
	};
	//选择对象	
	class Mask {
		constructor(el, data) {
			this.el = el;
			this.data = data;
			this.liIndex = null;
		};
		init(data) {
			$(this.el).find('ul').html('');
			for (var key in data) {
				var li = document.createElement('li');
				li.innerText = data[key];
				$(this.el).find('ul').append(li);
			};
		};
		eventRegister(callBack,callBack2) {
			var that = this;
			callBack2($(this.el).find('li'));
			if (callBack) {
				$(this.el).find('input').off().on('input', function() {
					if (that.data instanceof Object) {
						var arr = [];
						for (var key in that.data) {
							arr.push(that.data[key]);
						};
						var arr2 = arr.filter(function(item) {
							if (String(item).includes($(that.el).find('input').val())) {
								return item
							}
						});
						that.init(arr2);
					} else {
						var arr = that.data.filter(function(item) {
							if (String(item).includes($(that.el).find('input').val())) {
								return item
							}
						});
						that.init(arr);
					};
				});
				$(this.el).find('li').off().click(function() {
					$(this).addClass('liActive').siblings().removeClass('liActive');
					that.liIndex = $(this).index();
				});
				$(this.el).find('.maskBottom div:eq(0)').off().click(() => {
					$(this.el).animate({
						'top': '100%'
					}, function() {
						callBack($(that.el).find('li').eq(that.liIndex).text());
						$(that.el).find('input').val('');
					});
				});
			};

			$(this.el).find('.maskBottom div:eq(1)').off().click(() => {
				$(this.el).animate({
					'top': '100%'
				});
				$(this.el).find('input').val('');
			});
		};

	};
	window.Content = Content;
	window.Select = Select;
	window.Mask = Mask;
})(window, $);



//new一下实例对象
var select = new Select($('.selectBox'));
var content = new Content($('.cpckContent'));
var mask = new Mask($('#selectMask'));
var data = [];
//请求数据
var selectMsg = {
	ckmc: '',
	pm: '',
	gg: '',
	ys: ''
};
function publicR(mask, e, key) {
	mask.eventRegister(function(str) {
		if (str == '全部') {
			selectMsg[key] = '';
			$(e).removeClass('selectActive')
			content.initAll(requset);
			content.clearEvent();
			content.eventRegister(data);
			return;
		};
		selectMsg[key] = str;
		$(e).addClass('selectActive');
		content.initAll(requset);
		content.clearEvent();
		content.eventRegister(data);
	}, function(e2) {
		for (var i = 0; i < $(e2).length; i++) {
			if ($(e2).eq(i).text() == selectMsg[key]) {
				$(e2).eq(i).addClass('liActive');
			}
		}
	});
};
function requset(fn) {
	$.ajax({
		type: 'get',
		url: module+'/Jh/cxcpck',
		data: selectMsg,
		success: function(json) {
			data = [];
			for (var key in json) {
				
				data.push(json[key]);
			};
			fn(data);
			content.eventRegister(data);
		}
	});
	
};

function filterDataTj(str) {
	var obj = {
		0: '全部'
	};
	data.forEach(function(item, i) {
		if(item[str] !== ''){
			obj[item[str]] = item[str];
		}
	});
	return obj;
};



var arr = {
	0: '全部'
};
var arr2 = {
	0: '全部'
};
var arr3 = {
	0: '全部'
};
var arr4 = {
	0: '全部'
};
var arr5 = {
	0: '全部'
};
//初始化对象并传入数据
content.initAll(requset);
//请求仓库名称	
var aCkOption = {
	type: 'get',
	url: module+'/Jh/cpcktjsx',
	data:{
	 tj:'ck'
	},
	success: function(json) {
		var i = 1;
		for(var key in json){
			arr[i] = json[key].ckmc;
			i++
		};
		var mask = new Mask($('#selectMask')[0], arr);
		mask.init(arr);
		publicR(mask,$('.aCk'),'ckmc');
	}
};
//请求缸号
var aGhOption = {
	callBack: function() {
		var mask = new Mask($('#selectMask')[0], filterDataTj('gh'));
		mask.init(filterDataTj('gh'));
		mask.eventRegister(function(str) {
			selectMsg.gh = str;
			if (str == '全部') {
				$('.aGh').removeClass('selectActive')
				content.initAll(requset);
				content.clearEvent();
				content.eventRegister(data);
				return;
			};
			$('.aGh').addClass('selectActive')
			var filterData = data.filter((item) => {
				if (String(item.gh).includes(str)) {
					return item;
				};
			});
			content.init(filterData);
			content.eventRegister(filterData);
			content.clearEvent();
		}, function(e2) {
		for (var i = 0; i < $(e2).length; i++) {
			if ($(e2).eq(i).text() == selectMsg['gh']) {
				$(e2).eq(i).addClass('liActive');
			}
		}
	});
	}
};
//请求品名	
var aPmOption = {
	type: 'get',
	url: module+'/Jh/cpcktjsx',
	data:{
	 tj:'pm'
	},
	success: function(json) {
		var i = 1;
		for(var key in json){
			arr3[i] = json[key].pm;
			i++
		};
		var mask = new Mask($('#selectMask')[0], arr3);
		mask.init(arr3);
		publicR(mask,$('.aPm'),'pm')
	}
};
//请求颜色
var aYsOption = {
	type: 'get',
	url: module+'/Jh/cpcktjsx',
	data:{
	 tj:'ys'
	},
	success: function(json) {
		var i = 1;
		for(var key in json){
			arr4[i] = json[key].ysmc;
			i++
		};
		var mask = new Mask($('#selectMask')[0], arr4);
		mask.init(arr4);
		publicR(mask,$('.aYs'),'ys')
	}
};
//请求规格	
var aGgOption = {
	type: 'get',
	url: module+'/Jh/cpcktjsx',
	data:{
	 tj:'gg'
	},
	success: function(json) {
		var i = 1;
		for(var key in json){
			arr5[i] = json[key].gg;
			i++
		};
		var mask = new Mask($('#selectMask')[0], arr5);
		mask.init(arr5);
		publicR(mask,$('.aGg'),'gg')
	}
};
//给筛选按钮注册事件并传入参数
select.eventRegister(aCkOption, aGhOption, aPmOption, aYsOption, aGgOption);
