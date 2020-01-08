//传入对象的数据格式	
var arr = {

};

function request() {
	$.ajax({
		type: 'post',
		url: module+'/Jh/scqkcx',
		data: {
			zt: zt,
			startDay: dateTool().today,
			endDay: dateTool().today
		},
		success: function(json) {
			arr = json;
			addTicket.init(arr);
			addTicket.eventRegister();
			console.log(arr)
			ztEventRegister(arr, {
				//今天的数据请求
				type: 'get',
				url: module+'/Jh/scqkcx',
				data: {
					zt: zt,
					startDay: dateTool().today,
					endDay: dateTool().today
				}, //zt 该变量判断当前状态
				success: function(data) {
					//将拿到的后台数据赋予全局变量	
					arr = data
					startDate =  dateTool().today;
					endDate =  dateTool().today;
					//加载内容	
					addTicket.init(arr);
					//注册事件	
					addTicket.eventRegister();
				},
				error: function(error) {}
			}, {
				//昨天的数据请求
				type: 'get',
				url: module+'/Jh/scqkcx',
				data: {
					zt: zt,
					startDay: dateTool().yesterday,
					endDay: dateTool().yesterday
				},
				success: function(data) {
					//将拿到的后台数据赋予全局变量
					arr = data
					//加载内容	
					startDate =  dateTool().yesterday;
					endDate =  dateTool().yesterday;
					addTicket.init(arr);
					//注册事件	
					addTicket.eventRegister();
				},
				error: function(error) {},
			}, {
				//本周的数据请求
				type: 'get',
				url: module+'/Jh/scqkcx',
				data: {
					zt: zt,
					startDay: dateTool().week.startDay,
					endDay: dateTool().week.endDay
				},
				success: function(data) {
					//将拿到的后台数据赋予全局变量
					arr = data
					//加载内容
					startDate =  dateTool().week.startDay;
					endDate =  dateTool().week.endDay;
					addTicket.init(arr);
					//注册事件
					addTicket.eventRegister();
				},
				error: function(error) {}
			}, function(startDay, endDay) {
				$.ajax({
					type: 'get',
					url: module+'/Jh/scqkcx',
					data: {
						zt: zt,
						startDay: startDay,
						endDay: endDay
					},
					success: function(data) {
						//将拿到的后台数据赋予全局变量
						arr = data
						startDate = startDay;
						endDate = endDay;
						//加载内容
						addTicket.init(arr);
						//注册事件
						addTicket.eventRegister();
					}
				});
			});
		}
	});
};
request();
//初始化实例对象
var addTicket = new Ticket($('#quanbu')[0], $('#scqkWjd')[0], $('#scqkYjd')[0], $('.xxjm')[0], img);
//传入数据加载内容	addTicket.init(arr);

//注册事件 addTicket.eventRegister();


//日期的获取:
//查看获取日期的格式 console.log(dateTool());
//今天 dateTool().today
//昨天 dateTool().yesterday
//本周开始日期 dateTool().week.startDay
//本周结束日期 dateTool().week.endDay
//自定义日期:
//自定义开始日期 $('.startDay').val(); 
//自定义结束日期 $('.endDay').val(); 

//向后台发送请求获取数据

