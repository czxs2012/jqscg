<?php

namespace Home\Entity;

class Jxc
{
    public function cxtm($tmbh)
    {
        $sql = "select * from crhtmbcp where tmbh='$tmbh'";
        $res = M()->query($sql);
        return $res;


    }



    //ɾ����¼
    public function sccpxsjl($dh)
    {
        $sql = "delete from cpxsfh_jl where dh='$dh'";
        M()->execute($sql);

    }

    //ɾ����ϸ
    public function sccpxsmx($dh)
    {
        $res = $this->cxcpxsmxh($dh);
        foreach ($res as $val) {
            $xh = $val['xh'];
            $sql = "delete from cpxsfh_mx where xh='$xh' ";
            $res = M()->execute($sql);
        }

    }

    //�޸Ĳ�Ʒ���۷�������
    public function xgcpxsfhdj($dh)
    {
        $sql = "update cpxsfh_dj set rq=convert(varchar,getdate(),120) where  dh='$dh'";
        M()->execute($sql);

    }

    public function cxcpxsmxh($dh)
    {
        $sql = "select xh from cpxsfh_jl where dh='$dh'";
        $res = M()->query($sql);
        return $res;
    }

    //�������۷�����¼
    public function bcxsfhjl($array)
    {

    }

    //���淢������
    public function bccpfhdj($dh, $zdr, $ckmc, $khmc, $khbh)
    {
       // $ckmc = iconv('GBK','utf-8',$ckmc);
        //$khmc = iconv('GB2312//IGNORE','utf-8',$khmc);
        $sql = " insert into cpxsfh_dj(dh,rq,zdr,ckmc,khmc,khbh) select '$dh',convert(varchar,getdate(),120 )
           ,'$zdr','$ckmc','$khmc','$khbh' ";
      //  $sql = iconv('GB2312//IGNORE', 'utf-8', $sql);
        $res = M()->execute($sql);
        return $res;
    }

    public function xgcrhtmb($tmbh, $khmc, $fhlx, $khbh, $fhdh)
    {
        if ($tmbh != '') {
            $khmc = iconv('GB2312//IGNORE','utf-8',$khmc);
            $fhlx = iconv('GB2312//IGNORE','utf-8',$fhlx);
            $fhdh = $fhdh;
            $khbh =$khbh;
            $sql = "update crhtmbcp set khmc='$khmc',fhlx='$fhlx',khbh='$khbh',fhdh='$fhdh' where tmbh='$tmbh'";
           // $sql = iconv('GB2312//IGNORE', 'utf-8', $sql);
            $res = M()->execute($sql);
            return $res;
        }
    }

    public function cxcpxsfh($zt, $ksrq, $jsrq)
    {
        $sql = "select * from cpxsfh_dj where 1=1";
        if ($zt == "δ���") {
            $sql .= " and sh=0";
        } elseif ($zt == "�����") {
            $sql .= " and sh=1";
        } elseif ($zt == '�ѽᵥ') {
            $sql .= " and jd=1";
        }
        if ($ksrq != '' and $jsrq != '') {
            $sql .= " and rq between '$ksrq 00:00:00' and '$jsrq 23:59:59'";
        }
        $res = M()->query($sql);
        return $res;
    }

    //ɾ������
    public function sccrhtm($dh)
    {
        $sql = "update crhtmcp set khmc='',fhrq='',fhdh='',fhlx='',khbh=''";
        M()->execute($sql);
    }

    //�޸�����
    public function xgtm($tmbh)
    {
        $sql = "update crhtmbcp set khmc='',fhrq='',fhlx='',khbh='' where  tmbh='$tmbh'";
        M()->execute($sql);
    }
    //�Ƿ�����޸ĵ�����Ϣ
    public function sfxgdj($dh,$khmc,$ckmc){
        $dh = $dh;
        $sql ="select yydh from cpxsfh_jl where dh='$dh'";
        $res = M()->query($sql);
        if(empty($res)){
            $sql="update cpxsfh_dj set ckmc='$ckmc',khmc='$khmc',rq=convert(varchar,getdate(),120)  where dh='$dh'";
            M()->execute($sql);
        }
    }
}