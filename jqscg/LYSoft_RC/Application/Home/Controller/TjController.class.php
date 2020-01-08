<?php
namespace Home\Controller;
use Think\Controller;
class TjController extends ConController{
    public function Tj(){
        $this->display('tj');
    }

    // 打开页面时查询本月进度
    public function ThisMonth(){
        $ksrq = $_POST['start_day']." 00:00:00";
        $jsrq = $_POST['end_day']." 23:59:59";
        $ps = 0;
        $sql = " select (case when jd = 1 then '已完成' else '未完成' end) as jd,khbh,khmc,dddh,lsdh,rq,a.dh,bh,pm,gg,dw,ysmc,ps,b.bz as bz_1,a.bz from scscd_dj a,scscd_jl b
                  where ch=0 and a.dh=b.dh and rq between '$ksrq' and '$jsrq' ";
        $res = M()->query($sql);

        for ($i = 0; $i < count($res); $i++){
            // 切割日期
            $ps += $res[$i]['ps'];
            $rq = explode(" ", $res[$i]['rq']);
            echo "
                <div class='delivery_info'>
                    <span id='".$res[$i]['dh']."' onclick='click_span(this.id)'>
                        <div>客户: <span>".$res[$i]['khmc']."</span></div>
                        <div>编号: <span>".$res[$i]['dddh']."</span></div>
                        <div>品名: <span>".$res[$i]['pm']."</span></div>
                        <div>匹数: <span style='color: #FF4141'>".$res[$i]['ps']."</span></div>
            ";
            if ($res[$i]['jd'] == '已完成'){
                echo "<div>状态: <span style='color: #4382df'>".$res[$i]['jd']."</span></div>";
            } else{
                echo "<div>状态: <span>".$res[$i]['jd']."</span></div>";
            }
                echo "
                        <div>日期: <span>".$rq[0]."</span></div>
                    </span>
                </div>
            ";
        }
        echo "&".count($res)."&".$ps;
    }


    // 下拉信息
    public function xlxx(){
        // 客户
        $sql = " select * from dakhda where sfty = 0 ";
        $res = M()->query($sql);
        echo "
            <option disabled selected value>--请选择客户--</option>
        ";
        for ($i = 0; $i < count($res); $i++){
            echo "
                <option value='".$res[$i]['khbh']."'>".$res[$i]['khmc']."</option>
            ";
        }
        echo "&";

        // 品名
        $sql = " select * from dacpda where sfty = 0 ";
        $res = M()->query($sql);
        echo "
            <option disabled selected value>--请选择品名--</option>
        ";
        for ($i = 0; $i < count($res); $i++){
            echo "
                <option value='".$res[$i]['bh']."'>".$res[$i]['pm']."</option>
            ";
        }
        echo "&";

        // 订单编号
        $sql = " select * from scscd_dj where ch = 0 ";
        $res = M()->query($sql);
        echo "
            <option disabled selected value>--请选择编号--</option>
        ";
        for ($i = 0; $i < count($res); $i++){
            echo "
                <option value='".$res[$i]['dh']."'>".$res[$i]['dddh']."</option>
            ";
        }
        echo "&";




    }

    // 筛选查询
    public function sxcx(){
        $ps = 0;
        $khbh = $_POST['khbh'];
        $bh = $_POST['bh'];
        $dh = $_POST['dh'];
        $jd = $_POST['jd'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        // 筛选客户
        if (!empty($khbh)){
            $khbh = " and khbh = '$khbh' ";
        } else{
            $khbh = '';
        }
        // 筛选品名
        if (!empty($bh)){
            $bh = " and bh = '$bh' ";
        } else{
            $bh = '';
        }
        // 筛选订单单号
        if (!empty($dh)){
            $dh = " and a.dh = '$dh' ";
        } else {
            $dh = '';
        }
        // 筛选结单状态
        if ($jd != 2){
            $jd = " and jd = '$jd' ";
        } else {
            $jd = '';
        }
        // 筛选日期范围  日期必须两行都有值
        if ((!empty($startTime)) && (!empty($endTime))){
            $rq = " and rq between '$startTime 00:00:00' and '$endTime 23:59:59' ";
        } else if ((!empty($startTime)) || (!empty($endTime))){
            // 判断哪个日期没有值,然后提示
            if (empty($startTime)){
                echo 0;
                exit(0);
            }
            if (empty($endTime)){
                echo 1;
                exit(0);
            }
        } else{
            $rq = '';
        }

        $sql = " select (case when jd = 1 then '已完成' else '未完成' end) as jd,khbh,khmc,dddh,lsdh,rq,a.dh,bh,pm,gg,dw,ysmc,ps,
                b.bz as bz_1,a.bz from scscd_dj a,scscd_jl b where ch=0 and a.dh=b.dh $khbh $bh $dh $jd $rq ";
        $res = M()->query($sql);

        for ($i = 0; $i < count($res); $i++){
            // 切割日期
            $ps += $res[$i]['ps'];
            $rq = explode(" ", $res[$i]['rq']);
            echo "
                <div class='delivery_info'>
                    <span id='".$res[$i]['dh']."' onclick='click_span(this.id)'>
                        <div>客户: <span>".$res[$i]['khmc']."</span></div>
                        <div>编号: <span>".$res[$i]['dddh']."</span></div>
                        <div>品名: <span>".$res[$i]['pm']."</span></div>
                        <div>匹数: <span style='color: #FF4141'>".$res[$i]['ps']."</span></div>
            ";
            if ($res[$i]['jd'] == '已完成'){
                echo "<div>状态: <span style='color: #4382df'>".$res[$i]['jd']."</span></div>";
            } else{
                echo "<div>状态: <span>".$res[$i]['jd']."</span></div>";
            }
            echo "
                        <div>日期: <span>".$rq[0]."</span></div>
                    </span>
                </div>
            ";
        }

        echo "&".count($res)."&".$ps;

    }

    // 记录单号
    public function jldh(){
        session_start();
        $_SESSION['dh'] = $_POST['dh'];
    }

}