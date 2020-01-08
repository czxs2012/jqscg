<?php

namespace Home\Controller;
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

use Org\Util\Date;
use Think\Controller;

class JhController extends ConController
{

    /*public function _initialize(){
        if($_COOKIE['bmid']==''){
           // $this->redirect('index/index');

        }
    }*/
    public function jh()
    {

        $this->display('jh');
    }

    public function jh1()
    {
        $bm = I('bmid');
        $sql = "select gx from dabmda where bm='$bm'";
        $res = M()->query($sql);
        if ($res[0]['gx'] == '') {
            $this->display('rc-gny');

        }
    }

    //产品仓库页面
    public function rccpck()
    {
        $this->display('rc-cpck');
    }

    //查询产品仓库
    public function cxcpck()
    {
        $ckmc = I('ckmc');
        $pm = I('pm');
        $gg = I('gg');
        $ys = I('ys');
        $sql = "select bh,pm,gh,gg,ps,ckmc,zsl_gj as zzl,ysmc as ys,gj as sjs,dw,ztsl_gj as zts  from cpck_temp where 1=1";
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($pm != '') {
            $sql .= "and pm='$pm'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ys != '') {
            $sql .= " and ysmc='$ys'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //获取查询条件
    public function cpcktjsx()
    {
        // $sql = "select bh,pm,gh,gg,ps,ckmc,zsl_gj as zzl,ysmc as ys,gj as sjs,dw,ztsl_gj as zts  from cpck_temp";
        $tj = I('tj');
        if ($tj == 'ck') {
            $sql = "select ckmc from dackda order by id asc";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }
        if ($tj == 'ys') {
            $sql = "select ysmc from daysda";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }
        if ($tj == 'gg') {
            $sql = "select gg from dagg_cp";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }
        if ($tj == 'pm') {
            $sql = "select pm from dacpda";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }

    }

    //查询纱线名称
    public function cxsxmc()
    {
        $sql = "select pm as sxmc from dasxda";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //纱线采购统计
    public function rcsxcgtj()
    {
        $this->display('jh/rc-sxcgtj');
    }

    //纱线采购统计查询
    public function rcsxcgtjcx()
    {
        $sql = "select case when jd=0 then '未结单' else '已结单' end as jd ,ghsmc as ghs,ckmc,lsdh as lsh,CONVERT(varchar(11),rq,120) as rq,a.dh as kddh,bh as ph,pm as sxmc,gg,dj,je,dw,ysmc as ys,zzl,bs as js,b.bz from sxsxcg_dj a,sxsxcg_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ckmc');
        $ghsmc = I('ghs');
        $ph = I('ph');
        $gg = I('gg');
        $ysmc = I('ys');
        $jdzt = I('zt');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ghsmc != '') {
            $sql .= " and ghsmc='$ghsmc'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($jdzt == "已结单") {
            $sql .= " and jd=1";
        }
        if ($jdzt == "未结单") {
            $sql .= " and jd=0";
        }
        $res = M()->query($sql);
        if (!empty($res)) {
            $this->ajaxReturn($res, 'json');
        }
    }

    //纱线入库统计
    public function rcsxrktj()
    {
        $this->display('rc-sxrktj');
    }

    //筛选条件
    public function sxtj($sql)
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $ghsmc = I('ghs');
        $ph = I('ph');
        $gg = I('gg');
        $ysmc = I('ys');
        $jdzt = I('jdzt');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ghsmc != '') {
            $sql .= " and ghsmc='$ghsmc'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($jdzt == "已结单") {
            $sql .= " and jd=1";
        }
        if ($jdzt == "未结单") {
            $sql .= " and jd=0";
        }
        $res = M()->query($sql);
        if (!empty($res)) {
            $this->ajaxReturn($res, 'json');
        }
    }

    //纱线入库统计查询
    public function sxrktjcx()
    {
        $sql = "select ghsmc as ghs,ckmc,yydh,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dj,je,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxsxrk_dj a,sxsxrk_jl b
where ch=0 and a.dh=b.dh ";
        $this->sxtj($sql);

    }

    //纱线入库统计
    public function rcsxdbtj()
    {
        $this->display('jh/rc-sxdbtj');

    }

    //纱线调拨统计查询
    public function rcsxdbtjcx()
    {
        $sql = "select drckmc as drck,ckmc as dcck,convert(varchar(11),rq,120) as rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxsxdb_dj a,sxsxdb_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $drck = I('drck');
        $dcck = I('dcck');
        $ph = I('ph');
        $ysmc = I('ys');
        $gg = I('gg');
        $gh = I('gh');
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($dcck != '') {
            $sql .= " and ckmc='$dcck'";
        }
        if ($drck != '') {
            $sql .= " and drckmc = '$drck'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";

        }
        if ($gg != "") {
            $sql .= " and gg='$gg'";

        }
        if ($gh != '') {
            $sql .= " and gh='$gh'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询纱线调拨缸号
    public function cxsxdbgh()
    {
        $sql = "select gh from sxsxdb_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //纱线退货统计
    public function rcsxthtj()
    {
        $this->display('jh/rc-sxthtj');
    }

    //纱线退货统计查询
    public function rcsxthtjcx()
    {
        $sql = "select ghsmc as ghs,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dj,je,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxsxth_dj a,sxsxth_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $ghs = I('ghs');
        $ph = I('ph');
        $gg = I('gg');
        $ys = I('ys');
        $gh = I('gh');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";

        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ghs != '') {
            $sql .= " and ghsmc='$ghs'";
        }
        if ($ys != '') {
            $sql .= " and ysmc='$ys'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        if ($gh != '') {
            $sql .= " and gh='$gh'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //纱线销售退货统计
    public function rcsxxsthtj()
    {
        $this->display('jh/rc-sxxsthtj');
    }


    //纱线销售退货统计查询
    public function rcsxxsthtjcx()
    {
        $sql = "select khmc,khbh,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,dj,je,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxxsth_dj a,sxxsth_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $khmc = I('kh');
        $ph = I('ph');
        $gg = I('gg');
        $ys = I('ys');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($ys != '') {
            $sql .= " and ysmc='$ys'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询纱线销售缸号
    public function cxsxxsgh()
    {
        $sql = "select gh from sxxsth_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //生产情况
    public function rcscqk()
    {
        $this->display('jh/rc-scqk');
    }

    //生产情况查询
    public function rcscqkcx()
    {
        $sql = "  select a.khbh,a.khmc,a.dddh,a.lsdh,a.rq,a.dh,a.bh,a.pm,a.gg,gh,a.dw,a.ysmc,a.yssh,a.sl,a.ps,a.bz,a.bz_1,a.rkjd,a.yyps,a.yysl,a.wfps,a.wfsl,
  b.gxmc,b.jhsj as zt ,row_number() over (partition by a.dh,bh,pm,gg,gh,ysmc,yssh order by a.dh,bh,pm,gg,gh,ysmc,yssh) as px from (
  select khbh,khmc,dddh,lsdh,rq,a.dh,bh,pm,gg,gh,dw,ysmc,yssh,sl,ps,a.bz,b.bz as bz_1,rkjd,yyps,yysl,(sl-yysl) as wfsl,(ps-yyps) as wfps 
  from scscd_dj a,scscd_jl b
  where a.dh=b.dh and a.ch=0

  )a  left join scscd_jhdj b   on a.dh=b.dh 
 order by a.rq,a.dh,a.bh,a.pm,a.ysmc,a.yssh
";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $dddh = I('dddh');

        if ($startDay != '' && $endDay != '') {
            $startDay .= " 00:00:00";
            $endDay .= " 23:59:59";
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        $sql = " ";

        $sql .= "  )a  left join scscd_jhdj b   on a.dh=b.dh 
 order by a.rq,a.dh,a.bh,a.pm,a.ysmc,a.yssh";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询生产订单单号
    public function cxscdddh()
    {
        $sql = "select dh from scscd_dj";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //查询缸号
    public function cxgh()
    {
        $sql = "select gh from sxsxrk_jl ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //产品报价
    public function rccpbj()
    {
        $this->display('rc-cpbj');

    }

    //产品报价查询
    public function rccpbjcx()
    {
        $lx = I('ls');
        $mc = I('mc');
        if ($lx == '客户' || $lx == '') {
            $sql = "select * from dakhda where khmc='$mc'";
            $res = M()->query($sql);
            $khbh = $res[0]['khbh'];
            $sql = " select *,lsjg as lsj ,'$lx' as khls, convert(varchar(11),rq,120 ) as rq from cpxsgzbj ";
            if ($khbh != "") {
                $sql .= "where khbh='$khbh'";
            }
            $res = M()->query($sql);
            if (!empty($res)) {
                $this->ajaxReturn($res, 'json');
            }

        }
        if ($lx == '供货商') {
            $sql = "select * from daghsda where ghsmc='$mc'";
            $res = M()->query($sql);
            $ghsbh = $res[0]['ghsbh'];
            $sql = "select *,ghsmc as khmc,convert(varchar(11),rq,120 ) as rq,lsjg as lsj  from cpglgzbj";
            if ($ghsbh != '') {
                $sql .= "  where ghsbh='$ghsbh'";
            }
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');

        }
        if ($lx == '加工商') {
            $sql = "select * from dajgsda where jgsmc='$mc'";
            $res = M()->query($sql);
            $jgsbh = $res[0]['jgsbh'];
            $sql = "select *,jgsmc as khmc,convert(varchar(11),rq,120 ) as rq,lsjg as lsj,'加工商名称 :' as khls from cpjggzbj ";
            if ($jgsbh != '') {
                $sql .= " where ghsbh='$jgsbh'";
            }
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');

        }


    }

    //销售退货统计
    public function rcxsthtj()
    {
        $this->display('jh/rc-xsthtj');
    }

    //销售退货统计查询
    public function rcxsthtjcx()
    {
        $sql = "select case when jd=0 then '未结单' else '已结单' end as jd,khbh,khmc,ckmc,lsdh as lsh ,convert(varchar(11),rq,120)rq,a.dh as kddh,bh,pm,gg,dw,ysmc as ys,sl as zl,ps,b.bz,a.bz as djbz from cpxsfhth_dj a,cpxsfhth_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $khmc = I('kh');
        $gg = I('gg');
        $pm = I('pm');
        $ys = I('ys');
        $jd = I('jdzt');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($ys != '') {
            $sql .= " and ysmc='$ys'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        if ($jd == '未结单') {
            $sql .= " and jd=0";
        } else {
            $sql .= " and jd=1";
        }


        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //采购报价
    public function cpcgbjcx()
    {
        $sql = "select * from cpglgzbj";
        $res = M()->query($sql);
        if (!empty($res)) {
            $this->ajaxReturn($res, 'json');
        }
    }

    //查询纱线仓库
    public function cxsxck()
    {
        $ckmc = I('ckmc');
        $sxmc = I('sxmc');
        $gg = I('gg');
        $ys = I('ysmc');
        $ph = I('ph');
        $sql = "select pm as sxmc,ckmc,bh as ph,bs as js,dw,gg,ysmc as ys,sl as kcl,zsl,ztsl as zts,dw  from sxck_temp where 1=1";
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($sxmc != '') {
            $sql .= " and sxmc='$sxmc'";
        }
        if ($gg != '') {
            $sql .= " and sxmc='$gg'";
        }
        if ($ys != '') {
            $sql .= " and sxmc='$ys'";
        }
        if ($ph != '') {
            $sql .= " and ph='$ph'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //订单发货情况
    public function rcddfhqk()
    {
        $this->display('rc-ddfhqk');
    }

    //纱线采购来货情况
    public function rcsxcglhqk()
    {
        $this->display('jh/rc-sxcglhqk');
    }

    //纱线采购来货情况查询
    public function rcsxcglhqkcx()
    {
        $sql = " select lsdh as lsh,CONVERT(varchar(11), rq, 120) as rq,a.dh as kddh,ghsmc as ghs,bh,pm as sxmc,gg,ysmc as ys,dw,b.bs as cgjs,b.yybs as lhjs,(b.bs-b.yybs) as wljs,b.zzl as cgsl,b.yyzl as lhsl,(b.zzl-b.yyzl)as wlsl,case when jd=0 then '未结单' else '已结单' end as jd from sxsxcg_dj a,sxsxcg_jl b
 where a.dh=b.dh ";
        $startDay = I('startDay');
        $ph = I('ph');
        $ghsmc = I('ghs');
        $endDay = I('endDay');
        $ysmc = I('ys');
        $jd = I('zt');
        $gg = I('gg');
        if ($startDay != '' && $endDay != "") {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }

        if ($ph != '') {
            $sql .= "and bh='$ph'";
        }
        if ($ghsmc != '') {
            $sql .= " and ghsmc='$ghsmc'";
        }
        if ($jd == '未结单') {
            $sql .= "and jd=0";
        } elseif ($jd == '已结单') {
            $sql .= "and jd=1";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //纱线盘点统计
    public function rcsxpdtj()
    {
        $this->display();
    }

    //纱线报价
    public function rcsxbj()
    {
        $this->display('jh/rc-sxbj');
    }

    //纱线报价查询
    public function rcsxbjcx()
    {
        $lx = I('ls');
        $mc = I('mc');

        if ($lx == '' || $lx == '客户') {
            $lx = '客户名称';

            $sql = " select *,'$lx' as khls,khmc as khmz,lsjg as lsj,convert(varchar(11),rq,120 ) as rq from sxxsgzbj";
            if ($mc != '') {
                $sql .= " where khmc='$mc'";
            }
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');

        }
        if ($lx == '供货商') {
            $sql = " select *,'供货商名称' as khls,ghsmc as khmz ,lsjg as lsj,convert(varchar(11),rq,120 ) as rq from sxglgzbj";
            if ($mc != '') {
                $sql .= " where ghsmc='$mc'";
            }
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');

        }
        if ($lx == '加工商') {

            $sql = "  select *,'加工商名称' as khls,lsjg as lsj,jgsmc as khmz, convert(varchar(11),rq,120 ) as rq from sxjggzbj";
            if ($mc != '') {
                $sql .= " where jgsmc='$mc'";
            }
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');

        }


    }

    //查询客户报价
    public function rckhbj()
    {
        $lx = I('lx');
        if ($lx == '客户') {
            $sql = "select distinct khmc from sxxsgzbj";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }
        if ($lx == '加工商') {
            $sql = "select distinct jgsmc as khmc from sxjggzbj";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }
        if ($lx == '供货商') {
            $sql = "select  distinct ghsmc as khmc from sxglgzbj";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }


    }

    //查询纱线采购来货流水号
    public function cxsxcglsh()
    {
        $sql = "select distinct lsdh from  sxsxcg_dj";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //订单发货情况查询
    public function rcddfhqkcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ckmc');
        $khmc = I('khmc');
        $pm = I('pm');
        $gg = I('gg');
        $ys = I('ys');
        $jdzt = I('jdzt');
        /* if($startDay!=''&&$endDay!=''){
             $sql ="select khbh,khmc,ckmc,lsdh as lsh,rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as dgzl,ps as dgps,b.bz as jlbz,a.bz as djbz,jd,yyps as fhps,yysl as fhzl,(sl-yysl) as wfzl from cpxsdd_dj a,cpxsdd_jl b
 where a.dh=b.dh
  and rq  between '$startDay' and '$endDay'";

         }else{
             $sql = "select khbh,khmc,ckmc,lsdh as lsh,rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as dgzl,ps as dgps,b.bz as jlbz,a.bz as djbz,jd,yyps as fhps,yysl as fhzl,(sl-yysl) as wfzl from cpxsdd_dj a,cpxsdd_jl b
 where a.dh=b.dh ";
         }*/
        $sql = "select khbh,khmc,ckmc,lsdh as lsh,rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as dgzl,ps as dgps,b.bz as jlbz,a.bz as djbz,jd,yyps as fhps,yysl as fhzl,(sl-yysl) as wfzl from cpxsdd_dj a,cpxsdd_jl b
where a.dh=b.dh ";
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay '";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc '";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm '";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg '";
        }
        if ($ys != '') {
            $sql .= " and ysmc='$ys '";
        }
        if ($jdzt == '未结单') {
            $sql .= " and jd=0";
        }
        if ($jdzt == '已结单') {
            $sql .= ' and jd=1';
        }
        $res = M()->query($sql);
        foreach ($res as $k => $val) {
            if ($val['jd'] == 0) {
                $res[$k]['jd'] = "未结单";
            } else {
                $res[$k]['jd'] = "已结单";
            }
            $res[$k]['rq'] = substr($val['rq'], 0, 10);
        }
        $this->ajaxReturn($res, 'json');

    }

    //产品采购来货情况
    public function rccpcglhqk()
    {
        $this->display('rc-cpcglhqk');
    }

    //产品采购来货情况查询
    public function rccpcglhqkcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jd = I('jd');
        $ghsmc = I('ghs');
        $ckmc = I('ckmc');
        $gg = I('gg');
        $lsdh = I('lsdh');
        $pm = I('pm');
        $ysmc = I('ysmc');
        $sql = "select ghsmc as ghs,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as cgzl,ps as cgps,a.bz as djbz,b.bz as jlbz,case when jd=0 then '未结单' else '已结单' end as jd,yyps as lhps,yysl as lhzl,(sl-yysl) as wlzl from cpcpcg_dj a,cpcpcg_jl b
        where a.dh=b.dh ";
        if ($endDay != '' && $startDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";

        }
        if ($jd == '未结单') {
            $sql .= 'and jd=0';
        }
        if ($jd == '已结单') {
            $sql .= 'and jd=1';
        }
        if ($ghsmc != '') {
            $sql .= " and ghsmc='$ghsmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($lsdh != '') {
            $sql .= " and lsdh='$lsdh'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        $res = M()->query($sql);


        $this->ajaxReturn($res, 'json');
    }

    //查询流水号
    public function lshcx()
    {
        $sql = "select lsdh from cpcpcg_dj  ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //查询编号
    public function cxbh()
    {
        $sql = "select bh from cpcpcg_dj";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }


    // 交货查询
    /*    public function jhcx()
        {
            $dh = $_POST['dh'];
            session_start();
            $_SESSION['dh'] = $dh;

            $sql = " select * from scscd_dj where dh = '$dh' ";
            $res = M()->query($sql);

            // 审核  结单  冲红(作废)
            /*if ($res[0]['sh'] == 0) {
                echo 0;
                exit(0);
            } else*/
    /*  if ($res[0]['jd'] == 1) {
          echo 1;
          exit(0);
      } elseif ($res[0]['ch'] == 1) {
          echo 2;
          exit(0);
      }

      $sql = " select a.dddh,a.khmc,b.pm,b.gg,b.ysmc,b.ps,c.tmbh,c.gxmc,(case when c.jhsj <> '' then c.jhsj else '未交货' end ) as jhsj
                from scscd_dj a, scscd_jl b, scscd_jhdj c where a.dh = b.dh and a.dh = c.dh and b.xh = c.xh and a.dh = '$dh' order by c.id ";
      $res = M()->query($sql);

      for ($i = 0; $i < count($res); $i++) {
          echo "
          <span id='" . $res[$i]['tmbh'] . "' onclick='click_span(this.id)'>
              <div>" . $res[$i]['ysmc'] . "</div>
              <div>" . $res[$i]['ps'] . "</div>
              <div>" . $res[$i]['gxmc'] . "</div>
          ";

          if ($res[$i]['jhsj'] == '未交货') {
              echo "
                   <div>" . $res[$i]['jhsj'] . "</div>
              ";
          } else {
              echo "
                   <div style='color: #4382df'>" . $res[$i]['jhsj'] . "</div>
              ";
          }
          echo "</span>";
      }

      if (count($res) != 0)
          echo "&" . $res[0]['dddh'] . "&" . $res[0]['khmc'] . "&" . $res[0]['pm'] . "&" . $res[0]['gg'];

  }*/

    public function jhcx()
    {
        $dh = I('dh');
        $ygbh = $_SESSION['ygbh'];
        $ygmc = $_SESSION['ygmc'];
        $yggh = $_SESSION['yggh'];
        $res = $this->pdjhqx($yggh, $dh);
        if (empty($res)) { //该生产单此员工没有需要操作的工序
            $json['status'] = 0;
            $this->ajaxReturn($json, 'json');
        }
        //$jhgxstr =  "'".str_replace(",","','",$this->arr_to_str($res))."'";
        //查询第一道交货情况
/*        $sql="select c.dddh,c.khmc,b.gg,a.gxmc,a.xh,a.tmbh,b.ysmc,b.pm,b.gh,a.dh,isnull(sum(sl),0)as sl,ps,convert(float,a.gj)as gj,(convert(float,a.gj)*(sum(sl)))as je from scscd_jhdj a ,scscd_jl b,scscd_dj c  where a.dh=b.dh and b.dh=c.dh and a.xh=b.xh and tmbh in(select tmbh from scscd_gx
             where dh='$dh' and px=1) group  by c.dddh,c.khmc,b.gg,a.gxmc,a.xh,a.tmbh,b.ysmc,b.pm,b.gh,a.dh,ps,a.gj";*/
        $sql="select tmbh,sum(jhsl)as jhsl from scscd_jhdj where tmbh in (select tmbh from scscd_gx where dh='$dh' and px=1) group  by tmbh";
        $dydjhqk = M()->query($sql);
        $arr = array();
        //获取第一道工序对应的记录
        $sql = "select c.dddh,c.khmc,b.gg,a.gxmc,a.xh,a.tmbh,px,b.ysmc,b.pm,b.gh,a.dh,isnull(sl,0)as sl,ps,convert(float,a.gj)as gj,(convert(float,a.gj)*sl)as je from scscd_gx a,scscd_jl b,scscd_dj c where a.dh=b.dh and a.xh=b.xh and c.dh=b.dh and  a.dh='$dh'  and tmbh in(select  tmbh  from scscd_gx where gxmc in (select gxmc from daygda_gx where yggh='$yggh') and dh='$dh' and px=1)";
        $oneGx = M()->query($sql);
        if(empty($oneGx)&&empty($dydjhqk)) {
            $json['status'] = -1;
            $this->ajaxReturn($json, 'json');
        }elseif (!empty($oneGx)){
            if(!empty($dydjhqk)){
                foreach ($oneGx as $k=>$val){
                    foreach ($dydjhqk as $value){
                        $tm1 = $val['tmbh'];
                        $tm2 = $value['tmbh'];
                        if($tm1==$tm2){
                            $oneGx[$k]['sl']=$value['jhsl'];
                        }
                    }
                }
            }
            $arr[] = $oneGx;
        }
        foreach ($res as $val) {
            $tmbh1 = $val['tmbh'];
            $xh = $val['xh'];
            //当前扫的工序交的总数量
            $sql = "select isnull(sum(jhsl),0)as zsl from scscd_jhdj  where dh='$dh' and tmbh='$tmbh1'";
            $bdjhzsl = M()->query($sql);
            $bdjhzsl = $bdjhzsl[0]['zsl'];
            //查询上一道工序
            $sql = "select tmbh from scscd_gx where px=(
 select px-1 as px from scscd_gx where tmbh='$tmbh1' 
and dh='$dh' and xh='$xh'and px<>1) and dh='$dh' and xh='$xh'";
            $tmbh2 = M()->query($sql);
            $tmbh2 = $tmbh2[0]['tmbh'];
            // echo $tmbh2."\n";
            //查询上一道工序交的总的数量
            $sql = "select isnull(sum(jhsl),0)as zsl from scscd_jhdj where dh='$dh' and tmbh='$tmbh2' ";
            $sydjhzsl = M()->query($sql);
            $sydjhzsl = $sydjhzsl[0]['zsl'];
/*            $sql = "select d.dddh,d.khmc,b.gg,a.gxmc,a.xh,a.tmbh,px,b.ysmc,b.pm,b.gh,a.dh,a.gj,(select isnull(sum(jhsl),0)as sl from scscd_jhdj where dh='$dh' and tmbh='$tmbh2' ) as sl,
            ps from scscd_gx a,scscd_jl b,scscd_jhdj c,scscd_dj d where a.dh=b.dh and a.xh=b.xh and d.dh=b.dh
            and  a.dh='$dh' and a.tmbh ='$tmbh1' group by a.gxmc,a.xh,a.tmbh,px,b.ysmc,b.pm,b.gh,a.dh,d.khmc,b.gg,d.dddh,a.gj,ps";*/
            $sql = "select d.dddh,d.khmc,b.gg,a.gxmc,a.xh,a.tmbh,px,b.ysmc,b.pm,b.gh,a.dh,a.gj,($sydjhzsl-$bdjhzsl) as sl,
            ps from scscd_gx a,scscd_jl b,scscd_jhdj c,scscd_dj d where a.dh=b.dh and a.xh=b.xh and d.dh=b.dh 
            and  a.dh='$dh' and a.tmbh ='$tmbh1' group by a.gxmc,a.xh,a.tmbh,px,b.ysmc,b.pm,b.gh,a.dh,d.khmc,b.gg,d.dddh,a.gj,ps";
           //查询这张单当前的工序对应的交货信息
            $dqgx = M()->query($sql);
            $tmbh = $dqgx[0]['tmbh'];
           if (!in_array($tmbh,$val)||$sydjhzsl==0){
                continue;
            }
            $arr[] = $dqgx;
        }
        if (empty($arr)) { //存在上一道工序未交货，不能进行交货
            $json['status'] = -2;
            $this->ajaxReturn($json, 'json');
        }
        $this->ajaxReturn($arr, 'json');


    }

    //获取员工负责的工序
    public function pdjhqx($yggh, $dh)
    {
        //$sql="select  distinct  gxmc from scscd_gx where gxmc in (select gxmc from daygda_gx where yggh='$yggh') and dh='$dh'";
        $sql = "select  tmbh,xh from scscd_gx where gxmc in (select gxmc from daygda_gx where yggh='$yggh') and dh='$dh' and px<>1";
        return M()->query($sql);

    }

    //数组转字符串
    function arr_to_str($arr)
    {
        $t = '';
        foreach ($arr as $v) {
            $v = join(",", $v); // 可以用implode将一维数组转换为用逗号连接的字符串，join是别名
            $temp[] = $v;
        }
        foreach ($temp as $v) {
            $t .= $v . ",";
        }
        $t = substr($t, 0, -1); // 利用字符串截取函数消除最后一个逗号
        return $t;
    }


    //确定交货
    public function qdjh()
    {
        $jhsl = I('jhsl');
        //  $ps = I('ps');
        $dh = I('dh');
        $xh = I('xh');
        $gxmc = I('gxmc');
        $tmbh = I('tmbh');
        $yggh = $_SESSION['yggh'] || '6';
        $ygmc = $_SESSION['ygmc'] || '小B';
        $gj = I('gj');
        //查询上一道条码的交货数
        $sql = "insert into scscd_jhdj(jhsl,dh,xh,gxmc,tmbh,yggh,ygmc,gj,je,jhsj)
              select $jhsl,'$dh','$xh','$gxmc','$tmbh','$yggh','$ygmc',$gj,$gj*$jhsl,convert(varchar,getdate(),120)";
        //查询需要交货的总数量
        $res = M()->execute($sql);
        $sql = "select sl from scscd_jl where dh='$dh'";
        $sl = M()->query($sql);
        $sl = $sl[0]['sl'];
        if ($res) {
            if ($sl < $jhsl) {
                $sl = $jhsl - $sl;
                // $sql="insert into scscd_jhyc(scd_jhyc,dh) select '交货数量比本单生产数量多出'$sl,'$dh'";
                //M()->execute($sql);
            }
            $this->ajaxReturn($res, 'json');
        }


    }

    //查询生产单交货记录
    public function cxscdjhjl()
    {
        /*  $tmbh = I('tmbh');
          $dh = I('dh');*/
        $yggh = "1";
        //$sql="select jhsl,pm,ps,gh,gxmc,ysmc,gg from scscd_jhdj a,scscd_jl b where a.dh=b.dh and a.xh=b.xh and dh='$dh' and tmbh='$tmbh' and yggh='$yggh'";
        $sql = "select jhsl,pm,ps,gh,gxmc,ysmc,gg from scscd_jhdj a,scscd_jl b where a.dh=b.dh and a.xh=b.xh and  yggh='$yggh'";

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //产品入库统计
    public function rccprktj()
    {
        $this->display();
    }

    //产品入库统计查询
    public function cprktjcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ckmc');
        $ysmc = I('ys');
        $ghsmc = I('ghs');
        $gg = I("gg");
        $bh = I('bh');
        $sql = "select cplb,ghsbh,ghsmc,ckmc,lsdh,rq,a.dh,yydh,bh,pm,gg,gh,dj,je,dw,sk,ysmc,yssh,sl,ps,b.bz as bz_1,a.bz,kd,sjsl from cpcprk_dj a,cpcprk_jl b
where ch=0 and a.dh=b.dh 
";
        if ($startDay != '' && $endDay != '') {
            $sql = " and rq  between '$startDay' and '$endDay'";
        }
        if ($ckmc != '') {
            $sql .= " and ghsmc='$ghsmc'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($ghsmc != '') {
            $sql .= " and ghsmc='$ghsmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($bh != '') {
            $sql .= " and bh='$bh'";
        }
        $sql .= "order by rq,a.dh,bh,pm,ysmc";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //产品盘点统计
    public function rccppdtj()
    {
        $this->display('jh/rc-cppdtj');
    }

    //产品盘点统计查询
    public function cppdtjcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $pdlx = I('pdlx');
        $lhs = I('lhs');
        $gg = I('gg');
        $ysmc = I('ys');
        $bh = I('bh');
        $sql = "select pdlx as pdls,ckmc,khmc as lhs,rq,a.dh as kddh,bh,pm,gg,dw,ysmc as ys,(case when pdlx='盘亏' then -sl else sl end) as zl,(case when pdlx='盘亏' then -ps else ps end) as ps,b.bz as jlbz,a.bz as djbz,gh from cpcppd_dj a,cpcppd_jl b
where a.dh=b.dh";
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq between startDay='$startDay' and endDay='$endDay' ";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($pdlx != '') {
            $sql .= " and pdlx='$pdlx'";
        }
        if ($gg !== '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($bh != '') {
            $sql .= " and bh='$bh'";
        }
        if ($lhs != '') {
            $sql .= " and khmc='$lhs'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询盘点类型
    public function cxpdlx()
    {
        $arr = array(array('pdlx' => '盘盈'), array('pdlx' => '盘亏'), array('pdlx' => '入库'));
        $this->ajaxReturn($arr, 'json');
    }

    //查询产品盘点缸号
    public function cxcppdgh()
    {
        $sql = "select gh from cpcppd_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //产品退货统计
    public function rccpthtj()
    {
        $this->display('jh/rc-cpthtj');
    }

    //产品退货统计查询
    public function rccpthtjcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $gg = I('gg');
        $ysmc = I('ys');
        $sql = "select ghsmc as ghs,ckmc,lsdh as lsh,rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as zl,ps,b.bz as djbz,a.bz as jlbz,gh from cpcpth_dj a,cpcpth_jl b
where ch=0 and a.dh=b.dh";
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //缸号查询
    public function ghcx()
    {
        $sql = "select gh from cpcpth_jl ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //产品调拨统计
    public function rccpdbtj()
    {
        $this->display('jh/rc-cpdbtj');
    }

    public function rccpdbtjcx()
    {
        $sql = "select drckmc as drck,ckmc as dcck,rq,a.dh as kddh,bh,pm,gg,dw,ysmc as ys,sl as zl,ps,b.bz as jlbz,a.bz as djbz,gh from cpcpdb_dj a,cpcpdb_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $drckmc = I('drck');
        $dcck = I('dcck');
        $gg = I('gg');
        $ysmc = I('ys');
        $pm = I('pm');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($drckmc != '') {
            $sql .= " and drckmc='$drckmc'";
        }
        if ($dcck != '') {
            $sql .= " and ckmc='$dcck'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //查询产品调拨统计缸号
    public function cpdbghcx()
    {
        $sql = "select gh from cpcpdb_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //销售订单统计
    public function rcxsddtj()
    {
        $this->display('rc-xsddtj');
    }

    //销售订单统计查询
    public function rcxsddtjcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        $khmc = I('kh');
        $jd = I('jdzt');
        $sql = " select case when jd=0 then '未结单' else '已结单' end as jd,khbh,khmc,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl,ps,b.bz as jlbz,a.bz as djbz from cpxsdd_dj a,cpxsdd_jl b
 where a.dh=b.dh ";
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        if ($jd == '未结单') {
            $sql .= " and jd=0";
        }
        if ($jd == '已结单') {
            $sql .= " and jd=1";
        }


        $sql .= " order by rq,a.dh,bh,pm,ysmc";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //销售发货统计
    public function rcxsfhtj()
    {
        $this->display('jh/rc-xsfhtj');
    }

    //销售发货统计查询
    public function rcxsfhtjcx()
    {
        $sql = " select case when jd=0 then '未结单' else '已结单' end as jd,khmc,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,yydh,bh,pm,gg,dw,ysmc as ys,sl as zl,ps,b.bz as jlbz,a.bz as djbz,kd as kj,sjsl as sjzl,gh from cpxsfh_dj a,cpxsfh_jl b
 where ch=0 and a.dh=b.dh ";
        $khmc = I('kh');
        $ckmc = I('ck');
        $gg = I('gg');
        $ysmc = I('ys');
        $pm = I('pm');
        $jd = I('jdzt');
        $startDay = I('startDay');
        $endDay = I('endDay');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        if ($jd == '未结单') {
            $sql .= " and jd=0";
        }
        if ($jd == '已结单') {
            $sql .= " and jd=1";
        }
        $sql .= "  order by rq,a.dh,bh,pm,ysmc";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询缸号
    public function cpghcx()
    {
        $sql = "select gh from cpxsfh_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //销售开单统计
    public function rcxskdtj()
    {
        $this->display('jh/rc-xskdtj');
    }

    //销售开单统计查询
    public function rcxskdtjcx()
    {
        $sql = " select a.khmc,a.khlx as khls,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh,pm,gg,dj,je,dw,sk as sh,ysmc as ys,sl as zl,ps,b.bz as cpbz,a.bz as djbz,gh,kd as kj,sjsl as sjzl,lkmx from cpxskd_dj a,cpxskd_jl b,dakhda c
 where ch=0 and a.dh=b.dh and a.khbh=c.khbh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $khmc = I('kh');
        $ckmc = I('ck');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        if ($endDay != '' and $startDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($pm != '') {
            $sql .= " and pm='pm'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($khmc != '') {
            $sql .= " and a.khmc='$khmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";

        }

        $sql .= 'order by rq,a.dh,bh,pm,ysmc';
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //退货结帐统计
    public function rcxsthjztj()
    {
        $this->display('rc-xsthjztj');
    }

    //销售退货结账统计查询
    public function rcxsthjxtjcx()
    {
        $sql = "select khmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,yydh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as zl,ps,b.bz as jlbz,a.bz as djbz,ch from cpxsth_dj a,cpxsth_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $khmc = I('kh');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        if ($endDay != '' and $startDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($pm != '') {
            $sql .= " and pm='pm'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($khmc != '') {
            $sql .= " and a.khmc='$khmc'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //查询客户类型
    public function cxkhlx()
    {
        $sql = "select khlx from cpxskd_dj ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询销售开单缸号查询
    public function cpkdghcx()
    {
        $sql = "select gh from cpxskd_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //品名查询
    public function pmcx()
    {
        $sql = "select distinct pm from cpcpth_jl ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //颜色查询
    public function yscx()
    {
        $sql = "select ysmc from daysda";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //委外加工统计
    public function rcwwjgtj()
    {
        $this->display('jh/rc-wwjgtj');
    }

    //委外加工统计查询
    public function rcwwjgtjcx()
    {
        $sql = "select case when jd=0 then '未结单' else '已结单' end as jd,jgsmc as jgs,khbh,khmc,ckmc as chck,lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,bh,pm,cpgg as gg,dj,je,dw,cpysmc as ys ,sl as zl,ps,b.bz as jlbz,a.bz as djbz,gh
,isnull(esh,0) as esh,isnull(b.sh,0) as sh,isnull(shl,0) as shl from cpwwjg_dj a,cpwwjg_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $khmc = I('kh');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $jdzt = I('jdzt');
        if ($startDay != "" and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($jdzt == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jdzt == '已结单') {
            $sql .= " and jd=1";
        }
        if ($pm != "") {
            $sql .= " and pm='$pm'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    public function wwjgghcx()
    {
        $sql = "select gh from cpwwjg_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //委外收货统计
    public function rcwwshtj()
    {
        $this->display('jh/rc-wwshtj');
    }

    //委外收货统计查询
    public function rcwwshtjcx()
    {
        $sql = "select jgsmc as jgs,khbh,khmc,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,yydh,cpbh as bh,cppm as pm,cpgg as gg,dj,je,dw,cpysmc as ys,sl as zl,ps,b.bz as jlbz,a.bz as djbz,kd,sjsl as sjzl,cpgh as gh from cpwwsh_dj a,cpwwsh_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $khmc = I('khmc');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $jdzt = I('jdzt');
        if ($startDay != "" and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($jdzt == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jdzt == '已结单') {
            $sql .= " and jd=1";
        }
        if ($pm != "") {
            $sql .= " and pm='$pm'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //查询委外收货缸号
    public function cxwwshgh()
    {
        $sql = "select cpgh from cpwwsh_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //委外退货统计
    public function rcwwthtj()
    {
        $this->display('rc-wwthtj');
    }

    //委外退货统计查询
    public function rcwwthtjcx()
    {
        $sql = "select jgsmc as jgs,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,bh,pm,gg,dj,je,dw,ysmc as ys,sl as zl,ps,b.bz,a.bz as djbz,gh from cpwwth_dj a,cpwwth_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $khmc = I('khmc');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $jdzt = I('jdzt');
        if ($startDay != "" and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($jdzt == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jdzt == '已结单') {
            $sql .= " and jd=1";
        }
        if ($pm != "") {
            $sql .= " and pm='$pm'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //委外退货缸号查询
    public function cxwwthgh()
    {
        $sql = " select gh from cpwwth_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }


    //采购统计
    public function rccgtj()
    {
        $sql = "select jd,ghsbh,ghsmc,ckmc,lsdh,rq,a.dh,bh,pm,gg,dj,je,dw,ysmc,sl,ps,b.bz as bz_1,b.bz from cpcpcg_dj a,cpcpcg_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $bh = I('bh');
        $gg = I('gg');
        $ysmc = I('ysmc');
        $ckmc = I('ckmc');
        $jdzt = I('jdzt');
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($jgsmc != '') {
            $sql = " and jgsmc='$jgsmc'";
        }
        if ($jdzt == '已结单') {
            $sql .= " and jd=1";
        }
        if ($jdzt == '未接单') {
            $sql .= " and jd=0";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //下织单统计
    public function rcxzdtj()
    {
        $this->display('rc-xzdtj');

    }

    //下织单统计查询
    public function rcxzdtjcx()
    {
        $sql = "select case when jd=0 then '未结单' else '已结单' end as jd,jgsmc as jgs,lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,bh,pm,gg,dj as gj,je,dw,ysmc as ys,sl,ps,b.bz as bz from sxxzd_dj a,sxxzd_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $pm = I('pm');
        $gg = I('gg');
        $ysmc = I('ys');
        $jdzt = I('jdzt');
        if ($startDay != "" && $endDay != "") {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($jdzt == '已结单') {
            $sql .= " and jd=1";
        } elseif ($jdzt == '未结单') {
            $sql .= " and jd=0";
        }

        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //外发纱线统计
    public function rcwfsxtj()
    {
        $this->display('rc-wfsxtj');
    }

    //外发纱线统计查询
    public function rcwfsxtjcx()
    {
        $sql = "select  case when jd=0 then '未结单' else '已结单' end as jd ,jgsmc as jgs,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dj as gj,je,dw,ysmc as ys,zzl as zsl,ysl_m,bs as js,b.bz from sxwfsx_dj a,sxwfsx_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $chck = I('chck');
        $ph = I('ph');
        $ysmc = I('ys');
        $gg = I('gg');
        $jdzt = I('jdzt');
        $jgsmc = I('jgs');
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($chck != "") {
            $sql .= " and ckmc='$chck'";
        }
        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != "") {
            $sql .= " and bh='$ph'";
        }
        if ($jdzt == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jdzt == '已结单') {
            $sql .= " and jd=1";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //外发退货统计
    public function rcwfthtj()
    {
        $this->display('jh/rc-wfthtj');
    }

    //外发退货统计查询
    public function rcwfthtjcx()
    {
        $sql = "select jgsmc as jgs,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dj,je,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxwfth_dj a,sxwfth_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $ph = I('ph');
        $ysmc = I('ys');
        $gg = I('gg');
        $jgsmc = I('jgs');
        $gh = I('gh');
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($ckmc != "") {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != "") {
            $sql .= " and bh='$ph'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($gh != '') {
            $sql .= " and gh='$gh'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //查询外发退货缸号
    public function rcwfthghcx()
    {
        $sql = "select gh from sxwfth_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //委外加工收货情况
    public function rcwwjgshqk()
    {
        $this->display('jh/rc-wwjgshqk');
    }

    //委外加工收货情况查询
    public function rcwwjgshqkcx()
    {
        $sql = "select jgsmc as jgs,khbh,khmc,ckmc as chck,lsdh as lsh,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh,pm,cpgg,gh,dj,je,dw,cpysmc as cpys,sl as wfzl,ps as wfps,b.bz as jlbz,a.bz as djbz,case when jd=0 then '未结单' else '已结单' end as jd,
yyps as lhps,yysl as lhzl,(ps-yyps) as wlps,(sl-yysl) as wlzl,isnull(esh,0) as esh,(case  when jd<>0 then isnull(sl-yysl,0) else 0 end) as sh
 ,(case  when jd<>0 then isnull((sl-yysl)/sl*100,0) else 0 end) as shl from cpwwjg_dj a,cpwwjg_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('chck');
        $ph = I('ph');
        $ysmc = I('ys');
        $gg = I('gg');
        $khmc = I('kh');
        $jgsmc = I('jgs');
        $gh = I('gh');
        $jd = I('jdzt');
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($ckmc != "") {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != "") {
            $sql .= " and bh='$ph'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($gh != '') {
            $sql .= " and gh='$gh'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($jd == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jd == '已结单') {
            $sql .= " and jd=1";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //下织来货情况
    public function rcxzlhqk()
    {
        $this->display('rc-xzlhqk');
    }

    //下织来货情况查询
    public function rcxzlhqkcx()
    {
        $sql = "select jgsmc as jgs,lsdh as lsh,convert(varchar(11),rq,120 ) as rq,a.dh as kddh,bh,pm,gg,dj as gj,je,dw,ysmc as ys,sl as xzsl,ps as xzps,b.bz as jlbz,a.bz as djbz, case when jd=0 then '未结单' else '已结单' end as jdzt,yyps as lhps,yysl as lhsl,(sl-yysl) as wlsl from sxxzd_dj a,sxxzd_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $pm = I('pm');
        $ysmc = I('ys');
        $gg = I('gg');
        $jgsmc = I('jgs');
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }

        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //下织来货统计
    public function rcxzlhtj()
    {
        $this->display('jh/rc-xzlhtj');
    }

    //下织来货统计查询
    public function rcxzlhtjcx()
    {
        $sql = "select jgsmc as jgs,ckmc,lsdh as lsh,convert(varchar(11),rq,120 ) as rq,a.dh as kddh,yydh,bh,pm,gg,gh as jh,dj,je,dw,ysmc as ys,sl,ps,b.bz as jlbz,a.bz as djbz,kd,sjsl from sxxzlh_dj a,sxxzlh_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $pm = I('pm');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $gg = I('gg');
        $jgsmc = I('jgs');
        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }

        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询机号
    public function cxjh()
    {
        $sql = "select gh from sxxzlh_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //用料申领统计
    public function rcylsltj()
    {
        $this->display('rc-ylsltj');
    }

    //用料申领统计查询
    public function rcylsltjcx()
    {
        $sql = "select rq,a.dh,ckmc,cpbh,cppm,bh,pm,gg,gh,dw,ysmc,zzl from sxylsl_dj a,sxylsl_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ysmc = I('ys');
        $gg = I('gg');
        $ckmc = I('ck');
        $bh = I('ph');
        $pm = I('pm');

        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq between $startDay and $endDay";
        }
        if ($ckmc != '') {
            $sql .= " and jgsmc='$ckmc'";
        }

        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($pm != '') {
            $sql .= " and pm='$pm'";
        }
        if ($bh != '') {
            $sql .= " and bh='$bh'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //用料申领缸号查询
    public function cxylslgh()
    {
        $sql = "select gh from sxylsl_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //领料开单统计
    public function rcllkdtj()
    {
        $this->display('jh/rc-llkdtj');
    }

    //领料开单统计
    public function rcllkdtjcx()
    {
        $sql = " select yggh,ygmc,ckmc,rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxllkd_dj a,sxllkd_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $yggh = I('yggh');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $gg = I('gg');
        $bh = I('ph');
        if ($startDay != "" and $endDay != "") {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($yggh != '') {
            $sql .= " and yggh='$yggh'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }

        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }

        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($bh != '') {
            $sql .= " and bh='$bh'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //领料员工工号查询
    public function cxllyggh()
    {
        $sql = "select distinct yggh  from  sxllkd_jl ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //退料开单统计
    public function rctlkdtj()
    {
        $this->display('jh/rc-tlkdtj');
    }

    //退料开单统计查询
    public function rctlkdtjcx()
    {
        $sql = "select yggh,ygmc,ckmc,convert(varchar(11),rq,120) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,gh,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxtlkd_dj a,sxtlkd_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $yggh = I('yggh');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $gg = I('gg');
        $ph = I('ph');
        if ($startDay != "" && $endDay != "") {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($yggh != '') {
            $sql .= " and yggh='$yggh'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }

        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }

        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }


        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //外发来货情况
    public function rcwflhqk()
    {
        $this->display('jh/rc-wflhqk');
    }

    //外发来货情况查询
    public function rcwflhqkcx()
    {
        $sql = " select lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,jgsmc as jgs,ckmc as chck,bh as ph,pm as sxmc,gg,gh,ysmc as ys,dw,b.bs as wfjs,a.bz,b.yybs as lhjs,(b.bs-b.yybs) as wljs,b.ysl_m as wfsl,b.yyzl as lhsl,(b.ysl_m-b.yyzl)as wlsl,case when jd=0 then '未结单' else '已结单' end as jd from sxwfsx_dj a,sxwfsx_jl b
 where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $ysmc = I('ys');
        $ckmc = I('chck');
        $gg = I('gg');
        $ph = I('ph');
        $lsdh = I('lsh');
        $jd = I('jdzt');

        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }

        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }

        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        if ($jd == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jd == '已结单') {
            $sql .= " and jd=1";
        }
        if ($lsdh != '') {
            $sql .= " and a.lsdh='$lsdh'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //外发来货统计
    public function rcwflhtj()
    {
        $this->display('jh/rc-wflhtj');
    }

    //外发来货统计查询
    public function rcwflhtjcx()
    {
        $sql = "select jgsmc as jgs,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as rq,yydh,a.dh as kddh,bh as ph ,pm as sxmc,gg,gh,dj,je,dw,cpysmc as ys,zzl as zsl,bs as js,b.bz as bz from sxwflh_dj a,sxwflh_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $jgsmc = I('jgs');
        $ysmc = I('ys');
        $ckmc = I('ck');
        $gg = I('gg');
        $ph = I('ph');

        if ($startDay != '' && $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";
        }
        if ($jgsmc != '') {
            $sql .= " and jgsmc='$jgsmc'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }

        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }

        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }


    //外发流水号查询
    public function wflshcx()
    {
        $sql = "select distinct lsdh from sxwfsx_dj ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //外发缸号查询
    public function wfghcx()
    {
        $sql = "select gh from sxwfsx_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //领料缸号查询
    public function llghcx()
    {
        $sql = "select gh from sxtlkd_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询员工工号
    public function cxyggh()
    {
        $sql = "select yggh from  daygda";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询纱线缸号
    public function cxsxgh()
    {
        $sql = "select gh from  sxllkd_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    public function cxsxpm()
    {
        $sql = "select pm from dasxda";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //查询纱线规格
    public function cxsxgg()
    {
        $sql = "select gg from dagg_sx ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询批号
    public function cxph()
    {
        $sql = "select bh as ph from dasxda ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询产品编号
    public function cxcpbh()
    {
        $sql = "select bh from  dacpda";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }


    //查询客户
    public function khcx()
    {
        $sql = "select khmc from dakhda";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }


    public function scqkcx()
    {
        $startday = I('startDay') . " 00:00:00";
        $endday = I("endDay") . " 23:59:59";
        $sql = "select d.rkjd,d.khmc,d.rq,d.khbh,d.dh as kddh,d.dddh,j.pm,d.jd,d.lsdh as lsh,j.bh,j.ysmc as ys, 
               j.gg,j.dw,j.ps as scps,j.sl as sczl,j.yyps as rkps,yysl as rkzl,(sl-yysl) as wrzl,(cast(cast( case when sl=0 then(yysl/1) else (yysl/sl) end *100 as decimal(10,2)) as varchar(50))) as scjd,(ps-yyps) as wrps from scscd_dj d,scscd_jl j 
               where d.dh=j.dh and d.ch=0 and d.rq  between '$startday' and '$endday'";
        $res = M()->query($sql);
        $zt = I('zt');
        if ($zt == '未结单') {
            $sql .= " and d.rkjd = 0 ";
        }
        if ($zt == '已结单') {
            $sql .= " and d.rkjd =1";
        } else {
            $sql .= '';
        }
        foreach ($res as $k => $val) {
            $res[$k]['rq'] = substr($val['rq'], 0, 10);
            if ($val['rkjd'] == 0) {
                $res[$k]['jdzt'] = '未结单';
            }
            if ($val['rkjd'] == 1) {
                $res[$k]['jdzt'] = '已结单';
            }
            if ($val['yysl'] - $val['sl'] < 0) {
                $res[$k]['jdzt'] = '已结单';
            }

        }
        $this->ajaxReturn($res, 'json');
    }

    //资金往来
    public function rczjwl()
    {
        $this->display('rc-zjwl');
    }

    //资金往来查询
    public function rczjwlcx()
    {
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ls = I('ls');
        $jdzt = I('jdzt');
        $mc = I('mc');
        if ($ls == "客户") {
            $sql = " select dh as kddh,khls='客户',khmc as khmz,convert(varchar(10),rq,21) as kdrq,lsdh as lsh,skje as hkje,qdqk,ljqk as jqje ,xs,skr,zdr,case when sh=0 then '未审核' else '已审核' end as djzt ,bz,case when ch=1 then '作废' else '未作废'  end as zf,jelx+cast(qtje as varchar) as jels from cwkh_zjhr
 where id not in (select top 0
 id from cwkh_zjhr order by id )";
            $res = M()->query($sql);
            $this->ajaxReturn($res, 'json');
        }


    }

    //查询对应类型的客户
    public function rckhcx()
    {
        $ls = I('lx');
        if ($ls == "客户") {
            $sql = "select khmc from dakhda";
        }
        if ($ls == "加工商") {
            $sql = "select jgsmc from dajgsda";
        }
        if ($ls == '供货商') {
            $sql = "select ghsmc from daghsda";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //订单跟踪
    public function rcddgz()
    {
        $this->display('rc-ddgz');
    }

    //订单跟踪查询
    public function rcddgzcx()
    {
        $startDay = $_GET['startDay'];
        $endDay = $_GET['endDay'];
        $zt = $_GET['zt'];
        if ($startDay != '' && $endDay != '') {
            $startDay = $startDay . " 00:00:00";
            $endDay = $endDay . " 23:59:59";
            $sql = "exec ddgz' and rq between ''" . $startDay . "'' and ''" . $endDay . "'''";
            if ($zt == '未结单') {
                $sql .= "and jd='0'";
            }
            if ($zt == '已结单') {
                $sql .= "and jd='1'";
            }
        } else {
            $sql = "exec ddgz''";

        }
        $res = M()->query($sql);
        foreach ($res as $k => $val) {
            if ($val['jd'] == 0) {
                $res[$k]['jd'] = "未结单";
            } else {
                $res[$k]['jd'] = "已结单";
            }
            $res[$k]['scsl'] = $val['scsl'] * 10;
            $res[$k]['rksl'] = $val['rksl'] * 10;
            $res[$k]['fhsl'] = $val['fhsl'] * 10;
            $res[$k]['rkpbsl'] = $val['rkpbsl'] * 10;
            $res[$k]['rq'] = substr($val['rq'], 0, 10);
        }
        $this->ajaxReturn($res, 'json');
    }

    //纱线仓库
    public function rcsxck()
    {
        $this->display('rc-sxck');
    }

    //纱线仓库查询
    public function sxckcx()
    {
        $sql = " select pm as sxmc ,ckmc,dw,bs as js,bh as ph, gg,ysmc as ys,sl as kcl ,zsl,ztsl as zts from sxck_temp where 1=1  ";
        $res = M()->query($sql);
        $ph = I('ph');
        $gg = I('gg');
        $ysmc = I('ys');
        $ckmc = I('ckmc');
        $sxmc = I('sxmc');
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc' ";
        }
        if ($sxmc != '') {
            $sql .= " and  pm='$sxmc' ";
        }
        $sql .= "order by ckmc,bh";
        $res = M()->query($sql);
        if (!empty($res)) {
            $this->ajaxReturn($res, 'json');
        }
    }

    //纱线订单发货情况
    public function rcsxddfhqk()
    {
        $this->display('rc-sxddfhqk');
    }

    //纱线订单发货情况
    public function rcsxddfhqkcx()
    {
        $sql = "select khmc,ckmc,lsdh as lsh,convert(varchar(11),rq,120 ) as rq,a.dh as kddh,bh,pm as sxmc,gg,dj,je,dw,ysmc as ys,zzl as dgsl,bs as dgjs,b.bz as bz_1,case when jd=0 then '未结单' else '已结单' end as jd,yybs as fhjs,yyzl as fhsl,(zzl-yyzl) as wfsl from sxxsdd_dj a,sxxsdd_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $lsdh = I('lsh');
        $bh = I('ph');
        $ysmc = I('ys');
        $jd = I('jd');
        $gg = I('gg');
        $khmc = I('kh');
        $bh = I('ph');

        if ($startDay != "" && $endDay != '') {
            $sql .= " and rq  between '$startDay' and '$endDay'";

        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($lsdh != '') {
            $sql .= " and lsdh='$lsdh'";
        }
        if ($bh != '') {
            $sql .= " and bh='$bh'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }
        if ($jd == '未结单') {
            $sql .= " and jd=0";
        } elseif ($jd == "已结单") {
            $sql .= " and jd=1";
        }
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //查询纱线订单流水号
    public function cxsxddlsh()
    {
        $sql = "select  distinct  lsdh from sxxsdd_dj";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //纱线订单统计
    public function rcsxxsddtj()
    {
        $this->display('jh/rc-sxxsddtj');
    }

    //纱线订单统计查询
    public function rcsxxsddtjcx()
    {
        $sql = "select case when jd=0 then '未结单' else  '已结单' end as jd,khmc,khbh,ckmc,lsdh as lsh,convert(varchar(11),rq,120 ) as  rq,a.dh as kddh,bh as ph,pm as sxmc,gg,dj,je,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxxsdd_dj a,sxxsdd_jl b
where a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $khmc = I('kh');
        $bh = I('ph');
        $gg = I('gg');
        $ysmc = I('ys');
        $jdzt = I('jdzt');
        if ($startDay != "" && $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($khmc != "") {
            $sql .= " and khmc='$khmc'";
        }
        if ($bh != "") {
            $sql .= " and bh='$bh'";
        }
        if ($gg != "") {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != "") {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($jdzt == "未结单") {
            $sql .= " and jd=0";
        } elseif ($jdzt == '已结单') {
            $sql .= " and jd=1";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    //纱线销售开单统计
    public function rcsxxskdtj()
    {
        $this->display('jh/rc-sxxskdtj');
    }

    //纱线销售开单统计查询
    public function rcsxxskdtjcx()
    {
        $sql = "select khmc,khbh,ckmc,lsdh as lsh,convert(varchar(11),rq,120) as rq,a.dh as kddh,yydh,bh as ph,pm as sxmc,gg,gh,dj,je,dw,ysmc as ys,zzl as zsl,bs as js,b.bz from sxxskd_dj a,sxxskd_jl b
where ch=0 and a.dh=b.dh ";
        $startDay = I('startDay');
        $endDay = I('endDay');
        $ckmc = I('ck');
        $ph = I('ph');
        $gg = I('gg');
        $ysmc = I('ys');
        $khmc = I('kh');
        $gh = I('gh');
        if ($startDay != '' and $endDay != '') {
            $sql .= " and rq between '$startDay' and '$endDay'";
        }
        if ($ckmc != '') {
            $sql .= " and ckmc='$ckmc'";
        }
        if ($ph != '') {
            $sql .= " and bh='$ph'";
        }
        if ($gg != '') {
            $sql .= " and gg='$gg'";
        }
        if ($ysmc != '') {
            $sql .= " and ysmc='$ysmc'";
        }
        if ($khmc != '') {
            $sql .= " and khmc='$khmc'";
        }

        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');

    }

    //查询纱线销售开单缸号
    public function cssxxskdgh()
    {
        $sql = "select gh from sxxskd_jl";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');


    }

    // 判断点击工序是否已经交货
    public function pdjh()
    {
        $tmbh = $_POST['tmbh'];
        session_start();
        $dh = $_SESSION['dh'];
        $bmid = $_SESSION['bmid'];

        // 判断点击工序是否和登录部门所负责的工序匹配
        $sql = " select * from dabmda a, scscd_jhdj b where a.id = '$bmid' and b.tmbh = '$tmbh' and a.gx = b.gxmc ";
        $res = M()->query($sql);
        if (count($res) != 1) {
            echo 3;
            exit(0);
        }

        // 给这张单进行排序并插入临时表
        $sql = " if object_id('tempdb..##scdlsb') is not null drop table ##scdlsb 
                 select *, row_number()over(order by id) as px into ##scdlsb from scscd_jhdj where dh = '$dh' order by id
                ";
        $res = M()->execute($sql);

        // 查出点击工序在临时表中的记录
        $sql = " select * from ##scdlsb where tmbh = '$tmbh' ";
        $res = M()->query($sql);

        // 判断是不是第一道工序
        if ($res[0]['px'] == 1) {
            // 判断点击工序是否已经交货
            $sql = " select (case when jhsj <> '' then jhsj else '空' end) as jhsj from scscd_jhdj where tmbh = '$tmbh' ";
            $res = M()->query($sql);
            if ($res[0]['jhsj'] != '空') {
                echo 1;
            } else {
                echo 0;
            }

        } else {
            // 判断点击工序的上一道工序是否交货
            $px = $res[0]['px'] - 1;
            $sql = " select (case when jhsj <> '' then jhsj else '空' end) as jhsj from ##scdlsb where px = '$px' ";
            $res = M()->query($sql);
            if ($res[0]['jhsj'] != '空') {
                $sql = " select (case when jhsj <> '' then jhsj else '空' end) as jhsj from scscd_jhdj where tmbh = '$tmbh' ";
                $res = M()->query($sql);
                if ($res[0]['jhsj'] != '空') {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 2;
            }
        }
    }

    // 确定交货
    /* public function qdjh()
     {

         session_start();
         $dh = $_SESSION['dh'];
         $tmbh = $_POST['tmbh'];
         $xz = $_POST['xz'];
         $jhsj = date("Y-m-d H:i:s");

         // 判断交货还是取消交货
         if ($xz == 1) {
             // 交货
             $sql = " update scscd_jhdj set jhsj = '$jhsj' where tmbh = '$tmbh' ";
             $res = M()->execute($sql);
         } else {
             // 取消交货
             // 给这张单进行排序并插入临时表
             $sql = " if object_id('tempdb..##scdlsb') is not null drop table ##scdlsb
                  select *, row_number()over(order by id) as px into ##scdlsb from scscd_jhdj where dh = '$dh' order by id
                 ";
             $res = M()->execute($sql);

             // 查出点击工序在临时表中的记录
             $sql = " select * from ##scdlsb where tmbh = '$tmbh' ";
             $res = M()->query($sql);
             // 取得排序
             $px = $res[0]['px'];

             // 判断选择工序后面是否已有交货工序
             $sql = " select * from ##scdlsb where px > $px and jhsj <> '' ";
             $res = M()->query($sql);

             // 0 没有已交货工序
             if (count($res) == 0) {
                 // 取消交货成功
                 $sql = " update scscd_jhdj set jhsj = '' where tmbh = '$tmbh' ";
                 $res = M()->execute($sql);
                 $res = 3;
             } else {
                 // 有交货工序 不能取消
                 $res = 2;
             }
         }

         echo $res . "&" . $dh;

     }*/

}