//判断当前月份的天数
function checkOutDay(year, month) {
    if (month == 4 || month == 6 || month == 9 || month == 11) {
        return 30;
    } else if (month == 2) {
        if ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0)) {
            return 29;
        } else {
            return 28;
        }
    } else {
        return 31;
    }
}
//判断当前年份
function checkOutYear(year, month) {
    if (month == 0) {
        year -= 1;
    }
    return year;
}
//日期格式化
function dayFormat(day) {
    if (day < 10) {
        day = "0" + day;
    }
    return day;
}
//月份格式化
function monthFormat(month) {
    if (month < 10) {
        month = "0" + month;
    }
    return month;
}

// 打开页面时查询本月进度
function ThisMonth() {
    // 清空内容
    $('#content1').html("");
    $('#zjl').html("");
    $('#zps').html("");
    // 日期对象
    var date = new Date();
    var day = date.getDate();
    var month = (date.getMonth() + 1);
    var year = date.getFullYear();
    day = checkOutDay(year, month);
    month  = monthFormat(month);
    var start_day = (year + '-' + month + '-01');
    var end_day = (year + '-' + month + '-' + day);
    $.post(
        module + '/tj/ThisMonth',{
            start_day : start_day,
            end_day : end_day
        },
        function (data) {
            data = data.trim().split('&');
            $('#content1').append(data[0]);
            document.getElementById('zjl').innerText = data[1];
            document.getElementById('zps').innerText = data[2];
        }
    )

}

// 筛选
function sx() {

    // 下拉信息
    $.post(
        module + '/tj/xlxx',{

        },
        function (data) {
            data = data.trim().split('&');
            $('#khmc').html("");
            $('#khmc').append(data[0]);
            $('#pm').html("");
            $('#pm').append(data[1]);
            $('#dddh').html("");
            $('#dddh').append(data[2]);
        }
    )
    $('.query_output_details_mask').show();

    // 提交筛选条件
    $('#sx_qd').off("click").on("click", function () {
        var khbh = $('#khmc').val();
        var bh = $('#pm').val();
        var dh = $('#dddh').val();
        var jd = $('#jd').val();
        var startTime = $('#startTime').val();
        var endTime = $('#endTime').val();

        $.post(
            module + '/tj/sxcx',
            {
                khbh : khbh,
                bh : bh,
                dh : dh,
                jd : jd,
                startTime : startTime,
                endTime : endTime
            },
            function (data) {
                if (data == 0) {
                    alert("请选择开始日期!")
                } else if (data == 1){
                    alert("请选择结束日期!")
                } else {
                    $('#content').html("");
                    data = data.trim().split('&');
                    $('#content').append(data[0]);
                    document.getElementById('zjl').innerText = data[1];
                    document.getElementById('zps').innerText = data[2];
                    $('#startTime').val('');
                    $('#endTime').val('');
                    $('#jd').val('');
                    $('.query_output_details_mask').hide();
                }
            }
        )

    })

}

// 点击行时传递单号给生产单明细
function click_span(id) {
    $.post(
        module + '/tj/jldh',{
            dh : id
        }
    )
    location.href = module + '/mx/mx';
}



