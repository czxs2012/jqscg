// 扫一扫事件
function scaned(t, r, f){
    // $('#dh').value(r);
    //alert(r);
    jhcx(r, module);
    // $('#dh').value('');
}

// 空白（空格、换行、tab）和逗号分隔的字符串，变成用逗号分隔
function getSplitString(str) {
    var arr = str.split(",");
    var resources = "";
    for (var i = 0; i < arr.length; i++) {
        var arr1 = arr[i].split(/\s+/);

        for (var j = 0; j < arr1.length; j++) {
            if (jQuery.trim(arr1[j]) != "") {
                resources += jQuery.trim(arr1[j]) + ",";
            }
        }
    }
    return resources;
}

// 交货查询
function jhcx(dh,url) {
    // 清空内容
    $('#content1').html("");
    $('#dddh').html("");
    $('#khmc').html("");
    $('#pm').html("");
    $('#gg').html("");
    
    url = url + '/jh/jhcx';
    
    $.post(
        url,{
            dh : dh
        },
        function (data) {
          /*  if (data == 0){
              alert("此单未审核,没有工序!");
                return false;
            } else*/
          if (data == 1){
                alert("此单已结单,不能更改!");
                return false;
            } else if (data == 2) {
                alert("此单已作废,不能更改!");
                return false;
            } else if (data == '') {
                alert("请检查单号是否正确!");
                return false;
            } else {
                data = data.trim().split('&');
                $('#content1').append(data[0]);
                document.getElementById('dddh').innerText = data[1];
                document.getElementById('khmc').innerText = data[2];
                document.getElementById('pm').innerText = data[3];
                document.getElementById('gg').innerText = data[4];
            }
        }
    )
}

// 判断点击工序
function click_span(tmbh) {
    var gxmc = document.getElementById(tmbh).innerText;
    gxmc = (getSplitString(gxmc).trim()).split(',');
    document.getElementById('gxmc').innerText = gxmc[2];

    // 判断是否交货
    $.post(
        module + '/jh/pdjh',{
            tmbh : tmbh
        },
        function (data) {
            if (data == 0){
                // 未交货, 弹出交货
                document.getElementById('sfjh').innerText = '是否交货?';
                $('.query_output_details_mask').show();
            } else if (data == 1) {
                // 已交货,弹出取消交货
                document.getElementById('sfjh').innerText = '是否取消交货?';
                $('.query_output_details_mask').show();
            } else if(data == 2){
                alert("上一道工序未交货,此工序无法交货!");
                return false;
            } else if(data == 3){
                alert("登录的部门不负责所选中的工序,请重新选择!")
                return false;
            } else{
                alert("操作失败,请重新操作!");
                return false;
            }
        }
    )

    // 点击确定后执行
    $('#jh_qd').off("click").on("click", function () {
        $('.query_output_details_mask').hide();
        // 判断是交货还是取消交货
        var xz = document.getElementById('sfjh').innerText;
        if (xz == "是否交货?") {
            xz = 1;
        } else {
            xz = 2;
        }

        $.post(
            module + '/jh/qdjh',{
                tmbh : tmbh,
                xz : xz
            },
            function (data) {
                data = data.trim().split('&');
                if (data[0] == 0) {
                    alert("交货失败!")
                } else if (data[0] == 1) {
                    alert("交货成功!");
                    // 刷新内容
                    scaned('', data[1],'');
                } else if (data[0] == 2) {
                    alert("此工序后面已有交货工序,无法取消!");
                } else if (data[0] == 3){
                    alert("取消交货成功!");
                    // 刷新内容
                    scaned('', data[1],'');
                } else {
                    alert("操作失败,请重新操作!");
                }
            }
        )
    })

}


