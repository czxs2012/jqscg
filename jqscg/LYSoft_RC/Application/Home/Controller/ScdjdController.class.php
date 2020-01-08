<?php


namespace Home\Controller;


class ScdjdController extends CommonController
{
    public function cxscdjd()
    {
        $ksrq = I('ksrq');
        $jsrq = I('jsrq');
        $khmc=I('khmc');
        $pm = I('pm');
        $dh=I('dh');
        $ywc = iconv('GBK', 'UTF-8', '已完成');
        $wwc = iconv('GBK', 'UTF-8', '未完成');
        $sql = "select ps,khbh,khmc,a.dh,lsdh,rq,a.dh,bh,pm,gg,dw,ysmc,ps,b.bz as bz_1,a.bz,b.gg,b.ysmc,b.sl,xh from scscd_dj a,scscd_jl b
                  where ch=0 and a.dh=b.dh  ";
        if ($ksrq != '' && $jsrq != '') {
            $sql .= "and rq between '$ksrq 00:00:00' and '$jsrq  23:59:59'";
        }
        if($khmc!=''){
            $sql.="and a.khmc='$khmc'";
        }
        if($pm!=''){
            $sql.=" and pm='$pm'";
        }
        if($dh!=''){
            $sql.=" and a.dh='$dh'";
        }
        $sql .= "order by khmc";
        $res = M()->query($sql);
        foreach ($res as $k => $val) {
            $dh = $val['dh'];
            $xh = $val['xh'];
            $sql = "select jhsl from scscd_jhdj where dh='$dh' and xh='$xh'";
            $jhzt = M()->query($sql);
            if (!empty($jhzt)) {
                $scz = iconv('GBK', 'UTF-8', '生产中');
                $res[$k]['zt'] = "$scz";
            }else{
                $scz = iconv('GBK', 'UTF-8', '待生产');
                $res[$k]['zt'] = "$scz";
            }
        }
        $this->ajaxReturn($res, 'json');

    }

    //查询生产单明细
    public function cxscdmx()
    {
        $xh = I('xh');
        $dh = I('dh');
        $sql = "select a.dh,khmc,pm,gg from scscd_dj a,scscd_jl b where a.dh=b.dh and a.dh='$dh'  group by  a.dh,khmc,pm,gg";
        $dj = M()->query($sql);
        $wjh = iconv('GB2312', 'UTF-8', '未交货');
        $sql = "select ysmc,pm,khmc,a.dh,b.xh,c.gxmc,jhsl=0,jhzt='$wjh',b.ps from scscd_dj a,scscd_jl b,scscd_gx c where a.dh=b.dh and c.xh=b.xh and c.dh=b.dh and b.xh='$xh'";
        $res = M()->query($sql);
        $sql = "select jhsl,gxmc,jhsj,b.ygmc from scscd_jhdj a,daygda b  where xh='$xh' and b.yggh=b.yggh order by  gxmc,jhsj desc";
        $gxjhqk = M()->query($sql);
        $gxjhqk = $this->assoc_arr($gxjhqk, 'gxmc');
        if (empty($gxjhqk)) {
            foreach ($res as $k => $val) {
                $res[$k]['jhzt'] = $wjh;
                $res[$k]['jhsl'] = 0;
            }
        } else {
            foreach ($res as $key => $value) {
                $gxmc = $value['gxmc'];
                foreach ($gxjhqk as $k => $val) {

                    $gxmc1 = $val['gxmc'];  //有交过货的工序
                    if ($gxmc == $gxmc1) {
                        $res[$key]['jhzt'] = $val['jhsj'] . "  " . $val['ygmc'];
                        $res[$key]['jhsl'] = $val['jhsl'];
                    }

                }

            }
        }
        $json['dj'] = $dj;
        $json['jl'] = $res;
        $this->ajaxReturn($json, 'json');
    }

    //去重
    public function assoc_arr($arr, $key)
    {
        $tmp_arr = array();
        foreach ($arr as $k => $v) {
            if (in_array($v[$key], $tmp_arr)) {
                unset($arr[$k]);
            } else {
                $tmp_arr[] = $v[$key];
            }
        }
        return $arr;
    }

    //查询客户
    public function cxkh()
    {
        $sql = "select khmc from dakhda ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询产品
    public function cxpm()
    {
        $sql = "select pm from dacpda ";
        $res = M()->query($sql);
        $this->ajaxReturn($res, 'json');
    }

    //查询生产单单号
    public function cxscddh(){
        $sql="select dh from scscd_dj";
        $res = M()->query($sql);
        $this->ajaxReturn($res,'json');
    }

    public function test(){
        $arr =  array(array('name'=>'小明'),array('name'=>'老爷'));
        
    }


}