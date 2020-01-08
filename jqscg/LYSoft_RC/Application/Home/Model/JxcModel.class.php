<?php

namespace Home\Model;
class JxcModel
{
    public function sccpxsd($dh)
    {

        $sql = "delete from cpxsfh_dj where dh='$dh'";
        $res = M()->execute($sql);
        return $res;

    }

    //删除关联的销售发货单
    public function sccpxsdall($dh)
    {
        $sql = "delete cpxsfh_dj from cpxsfh_dj as d left join cpxsfh_jl as j on j.dh=d.dh where d.dh='$dh'";
        $res = M()->execute($sql);
        return $res;

    }

    //审核产品销售发货
    public function shcpxsfh($dh)
    {
        $sql = "update cpxsfh_dj set sh=1 where dh='$dh'";
        $res = M()->execute($sql);
        return $res;
    }

    public function cxcpxsfhwsh($ksrq, $jsrq)
    {
        $sql = "select * from cpxsfh_dj where  sh=0";

        if ($ksrq != '' and $jsrq != '') {
            $sql .= " and rq between '$ksrq 00:00:00' and '$jsrq 23:59:59'";
        }
        $res = M()->query($sql);
        return $res;
    }

    public function cxcpxsfhysh($ksrq, $jsrq)
    {
        $sql = "select * from cpxsfh_dj where  sh=1";

        if ($ksrq != '' and $jsrq != '') {
            $sql .= " and rq between '$ksrq 00:00:00' and '$jsrq 23:59:59'";
        }
        $res = M()->query($sql);
        return $res;
    }

    public function cxcpxsfhyjd($ksrq, $jsrq)
    {
        $sql = "select * from cpxsfh_dj where  jd=1";

        if ($ksrq != '' and $jsrq != '') {
            $sql .= " and rq between '$ksrq 00:00:00' and '$jsrq 23:59:59'";
        }
        $res = M()->query($sql);
        return $res;
    }

    public function cxcpxsfhmx($dh)
    {
        $sql = "select id,gg,ysmc,pm,dw,sl,ps,yydh from cpxsfh_jl where dh='$dh' ";
        $res = M()->query($sql);
        return $res;

    }

    public function cxcpxsfhhz($dh)
    {
        $sql = "select gg,ysmc,pm,dw,sum(sl) as sl,sum(ps) as ps from cpxsfh_jl where dh='$dh' group  by gg,ysmc,pm,dw,dh";
        $res = M()->query($sql);
        return $res;
    }

    public function tjcpxsfhjl($dh, $xh, $bh, $ps, $sl, $gh, $ysmc, $gg, $dw, $pm)
    {
        $sql = "insert into cpxsfh_jl(dh,xh,bh,ps,sl,gh,ysmc,gg,dw,pm,yydh) select '$dh','$xh','$bh','$ps','$sl','$gh','$ysmc','$gg','$dw','$pm'";

        return $sql;
    }

    public function sfsccpxsdj($dh)
    {
        $sql = "select * from cpxsfh_jl where dh='$dh'";
        $res = M()->query($sql);
        if (empty($res)) {
            $this->sccpxsd($dh);
        }
    }

    public function cxyydh($khmc, $ysmc, $gg)
    {
        $sql = "select distinct dh as yydh from (select ysmc,gg,khmc,d.dh,sl,yysl from cpxsdd_dj d,cpxsdd_jl j where d.dh=j.dh and ysmc='$ysmc' and sl-yysl>0 ) a
left join(select khmc,ysmc,gg from cpxsdd_dj d1,cpxsdd_jl j where j.dh=d1.dh) j on j.khmc=a.khmc and j.ysmc=a.ysmc and j.gg=a.gg  where j.ysmc='$ysmc' and j.khmc='$khmc' and j.gg='$gg'";
        $res = M()->query($sql);
        return $res;
    }

    //作废销售发货单
    public function zfxsfhd($dh){
        $sql ="update cpxsfh_dj set ch=1 where dh='$dh'";
        $res = M()->execute($sql);
        return $res;

    }




}