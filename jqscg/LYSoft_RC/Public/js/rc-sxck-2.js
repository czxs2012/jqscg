;
(function(window, $) {
	//内容对象
	class Content {
		constructor(e) {
			this.e = e;
			this.beforeScroll = 0;
			this.animateFlag = true;
			this.data = '';
			this.flag = true;

		};
		initAll(requset) {
			var that = this;
			function fn(data) {
				that.data = data;
				that.init(that.data);
				that.clearEvent();
				that.eventRegister(data);
			};
			requset(fn);
		};
		init(data) {
			$(this.e).find('ul li').remove();
			for (var key in data) {
				var li = document.createElement('li');
				li.innerHTML =
					`<div class="tTop"><p>${data[key].sxmc}</p><p>${data[key].ckmc}</p></div>
								<div class="tContent">
									<div>批号：${data[key].ph}</div>
									<div>件数：${data[key].js}</div>
								</div>
								<div class="tContent">
									<div>单位：${data[key].dw}</div>
									<div>规格：${data[key].gg}</div>
								</div>
								<div class="tContent">
									<div>颜色：${data[key].ys}</div>
									<div>库存量：${data[key].kcl}</div>
								</div>
								<div class="tContent">
									<div>总数量：${data[key].zsl}</div>
									<div>在途数：${data[key].zts}</div>
								</div>
								<div class="tContent">
									<div>备注：${data[key].bz}</div>
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
						$('.sxckTitle').stop().animate({
							'height': '0'
						}, () => {
							this.animateFlag = true;
						});
					} else if (scrollStep == 'up') {
						$('.sxckTitle').stop().animate({
							'height': '2.5rem'
						}, () => {
							this.animateFlag = true;
						});
					};
				};
			});
			$(this.e).find('.topContent span').off().click(function() {
				if (that.flag) {
					that.flag = false;
					$(this).parent().find('div').addClass('topActive');
					var arr = data.filter(function(item) {
						if (item.kcl != 0) {
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
		eventRegister(aCkOption, aGgOption, aMcOption, aYsOption, aPhOption) {
			var that = this;
			$(this.e).find('.gd').off().click(function() {
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
			$('.aCk').off().click(function() {
				$('#selectMask').animate({
					'top': '0'
				}, function() {
					aCkOption.callBack($('.aCk'));
				});

			});
			$('.aPh').off().click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				aPhOption.callBack($('.aPh'));
			});
			$('.aMc').off().click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				aMcOption.callBack();
			});
			$('.aYs').off().click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				aYsOption.callBack();
			});
			$('.aGg').off().click(function() {
				$('#selectMask').animate({
					'top': '0'
				});
				aGgOption.callBack();
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
		eventRegister(callBack, callBack2) {
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
var content = new Content($('.sxckContent'));
var selectWho = {
	ckmc: false,
	sxmc: false,
	gg: false,
	ys: false,
	ph: false
}
var selectMsg = {
	ckmc: '',
	sxmc: '',
	gg: '',
	ys: '',
	ph: ''
};
// var mask = new Mask($('#selectMask'));
var data = [{
	
}];
//请求数据

function requset(fn) {
	$.ajax({
		type: 'get',
		url: module+'/jh/sxckcx',
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

function filterDataTj(str) {
	var obj = {
		0: '全部'
	};
	data.forEach(function(item, i) {
		obj[item[str]] = item[str];
	});
	return obj;
};

//初始化对象并传入数据
content.initAll(requset);
content.eventRegister(data);
//请求仓库名称	
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
var aCkOption = {
	callBack: function(e) {
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
				var mask = new Mask($('#selectMask')[0], arr2);
				mask.init(arr2);
				publicR(mask, e, 'ckmc');
			}
		});
		
		
		
		
	}
};
//请求批号
var aPhOption = {
	callBack: function(e) {
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
				var mask = new Mask($('#selectMask')[0], arr2);
				mask.init(arr2);
				publicR(mask, e, 'ph');
			}
		});
		
	}
};
//请求名称	
var aMcOption = {
	callBack: function(e) {
		$.ajax({
			type: 'post',
			url: module+'/jh/cxsxmc',
			data: {
			},
			success: function(json) {
				var arr2 = [];
				for (var i of json) {
					arr2.push(i.sxmc)
				}
				arr2.unshift('全部');
				var mask = new Mask($('#selectMask')[0], arr2);
				mask.init(arr2);
				publicR(mask, e, 'sxmc');
			}
		});
		
		
	}
};
//请求颜色
var aYsOption = {
	callBack: function(e) {
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
				var mask = new Mask($('#selectMask')[0], arr2);
				mask.init(arr2);
				publicR(mask, e, 'ys');
			}
		});
	}
};
//请求规格	
var aGgOption = {
	callBack: function(e) {
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
				var mask = new Mask($('#selectMask')[0], arr2);
				mask.init(arr2);
				publicR(mask, e, 'gg');
			}
		});
		
	
		
	}
};
//给筛选按钮注册事件并传入参数
select.eventRegister(aCkOption, aGgOption, aMcOption, aYsOption, aPhOption);
