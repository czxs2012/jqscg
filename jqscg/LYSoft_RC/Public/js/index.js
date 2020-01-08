/*function KeyLogin() {
   /!* if (event.keyCode==13)   //回车键的键值为13
        document.getElementById("login").click();  //调用登录按钮的登录事件*!/
}*/



// 查询部门
function bm() {
    $.post(
        module + '/index/bm',{

        },
        function (data) {
            if (data != ''){
                data = data.trim().split('&');
                $('#bm').innerHTML = '';
                $('#bm').append(data[0]);
                $('#pwd').val(data[1]);
                // 开启自动登录
                // $('#login').click();
            }
        }
    )
}
function scaned(t,r,f) {
    var pwd = $('#pwd').val();
    var ygbh = r;
    var zddl = $("#zddl").is(":checked");
    if(zddl==true){
        zddl = 1;
    }else{
        zddl = 0;
    }
    $.post(
        module + '/index/login',{
            ygbh :ygbh,
            pwd : pwd,
            zddl:zddl,
        },
        function (data) {
            if (data == 1){
                location.href = module + '/jh/jh';
            } else if(data==2){
                location.href = module + '/jh/jh1';
            }else{
                alert("密码错误,请重新输入!");
                // 清空密码框并聚焦
                $("input[type=password]").val('').focus();
            }
        }
    )
    //login(module);

}

// 登录
function login(url) {

    var ygbh = $('#ygbh').val();
    var pwd = $('#pwd').val();
	var zddl = $("#zddl").is(":checked");
    if (pwd == '') {
        alert("请输入密码!");
        return false;
    }
	if(zddl==true){
		zddl = 1;
	}else{
		zddl = 0;
	}

    $.post(
        module + '/index/login',{
            ygbh :ygbh,
            pwd : pwd,
            zddl:zddl,
        },
        function (data) {
            if (data == 1){
                location.href = url + '/jh/jh';
            } else if(data==2){
				location.href = url + '/jh/jh1';              
            }else{
				 alert("密码错误,请重新输入!");
				// 清空密码框并聚焦
				$("input[type=password]").val('').focus();
			}
        }
    )
}
$(function(){
	$.post(
	module+'/index/autoLogin',{
		
	},function(data){
		if(data==1){
			location.href = module+'/jh/jh';
		}else if(data==2){			
				location.href = module+'/jh/jh1';			
		}else{
		 data = data.trim().split('&');
			if(data[0]==1){
				$("#bmid").val(data[1])
			}else{
				//alert("密码已经修改了，请重新登录！");
				$("#bmid").val(data[1]);
				return false;
			} 
		}
	})
}) 