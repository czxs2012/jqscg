function cxmx() {
    $('#content').html("");
    $('#dddh').html("");
    $('#khmc').html("");
    $('#pm').html("");
    $('#gg').html("");
    $.post(
        module + '/mx/cxmx',{
        },
        function (data) {
            data = data.trim().split('&');
            $('#content').append(data[0]);
            document.getElementById('dddh').innerText = data[1];
            document.getElementById('khmc').innerText = data[2];
            document.getElementById('pm').innerText = data[3];
            document.getElementById('gg').innerText = data[4];
        }
    )
}