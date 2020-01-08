<?php
namespace Home\Controller;
use Think\Controller;
class MxController extends ConController{
    public function mx(){
        $this->display('mx');
    }

    // 点击查询单号并跳转到明细
    public function cxmx(){
        session_start();
        $dh = $_SESSION['dh'];

        $sql = " select a.dddh,a.khmc,b.pm,b.gg,b.ysmc,b.ps,c.tmbh,c.gxmc,(case when c.jhsj <> '' then c.jhsj else '未交货' end ) as jhsj 
                  from scscd_dj a, scscd_jl b, scscd_jhdj c where a.dh = b.dh and a.dh = c.dh and b.xh = c.xh and a.dh = '$dh' order by c.id ";
        $res = M()->query($sql);

        for ($i = 0; $i < count($res); $i++){
            echo "
                <div>".$res[$i]['ysmc']."</div>
                <div>".$res[$i]['ps']."</div>
                <div>".$res[$i]['gxmc']."</div>
            ";

            if ($res[$i]['jhsj'] == '未交货'){
                echo "
                     <div>".$res[$i]['jhsj']."</div>
                ";
            } else {
                echo "
                     <div style='color: #4382df'>".$res[$i]['jhsj']."</div>
                ";
            }
        }

        if (count($res) != 0)
            echo "&".$res[0]['dddh']."&".$res[0]['khmc']."&".$res[0]['pm']."&".$res[0]['gg'];
    }

}