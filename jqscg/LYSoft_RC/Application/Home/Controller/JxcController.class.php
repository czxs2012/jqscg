<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-09-27
 * Time: 15:16
 */

namespace Home\Controller;


use Home\Entity\Jxc;

class JxcController extends CommonController
{
    public function cxtm()
    {
        $tmbh = I('tmbh');
        $jxc = new Jxc();
        $res = $jxc->cxtm($tmbh);
        /* $wxtms = S('wxtms');
         if(!$res){
             $wxtms = $wxtms + 1;
             S('wxtms', $wxtms);
             $json['status'] =0;
             $json['wxtms'] =$wxtms;
             $this->ajaxReturn($json,'json');
         }
         if(!S('res')){
             S('res',$res,3600*24);
         }else{
             $res1 = $jxc->cxtm($tmbh);
             $this->tmsfks($res1,$tmbh,$wxtms);
             if ($res1[0]['khmc'] != '') {
                 $json['status'] = 0;
                 $wxtms = $wxtms + 1;
                 S('wxtms', $wxtms);
                 $json['wxtms'] = $wxtms;
                 $this->ajaxReturn($json, 'json');

             }
             $res = array_merge($res,$res1);
             S('res',$res,3600*24);
         }*/


        $this->ajaxReturn($res, 'json');


    }

    public function tmsfks($res, $tmbh)
    {
        foreach ($res as $val) {
            if ($val['tmbh'] == $tmbh) {
                $json['status'] = 0;
                $this->ajaxReturn($res, 'json');

            }
        }
    }

    public function cpxsfh()
    {
        $dh = $this->cjdh();
        $zdr = cookie('bmid');
        $cpinfo = I('msg');
        $ckmc = I('ckmc');
        $khmc = I('khmc');
        $khbh = D('base')->cxkhbh($khmc);
        $jxc = new Jxc();
        $fhlx = '销售发货';
        foreach ($cpinfo as $value) {
            $tmbh = $value['tmbh'];
            $jxc->xgcrhtmb($tmbh, $khmc, $fhlx, $khbh, $dh);
        }

        $res = $jxc->bccpfhdj($dh, $zdr, $ckmc, $khmc, $khbh);
        /*  $cpinfo = array(
              array('dh' => $dh, 'bh' => '0001', 'pm' => '牛奶丝003', 'ps' => 10, 'sl' => 123, 'gh' => '', 'ysmc' => '红色', 'gg' => '1200*1200', 'dw' => '条'),
              array('dh' => $dh, 'bh' => '0002', 'pm' => '牛奶丝003', 'ps' => 10, 'sl' => 123, 'gh' => '', 'ysmc' => '黄色', 'gg' => '1200*1200', 'dw' => '条')
          );*/
        $i = 1;
        foreach ($cpinfo as $value) {
            $values['dh'] = $dh;
            $values['xh'] = $this->cjxh() . $i;
            $values['bh'] = $value['bh'];
            $values['pm'] = $value['pm'];
            $values['ps'] = $value['ps'];
            $values['sl'] = $value['sl'];
            $value['gh'] = $value['gh'];
            $values['ysmc'] = $value['ysmc'];
            $values['gg'] = $value['gg'];
            $values['dw'] = $value['dw'];
            $values['yydh'] = $value['yydh'] ? $values['yydh'] : '';
            $arr[] = $values;
            $i++;

        }

        if ($res) {
            $sql = $this->insert($arr, 'cpxsfh_jl');
            $res = $this->cz($sql);
            if ($res) {
                $this->jsonReturnSuccess();
            }
        }


        // $array = array(array('name'=>'李白1','sex'=>'男','gz'=>5000),array('name'=>'李强','sex'=>'男','gz'=>3000));
        /* foreach ($cpinfo as $value) {
             $dh = $dh;
             $xh = $this->cjxh();
             $bh = $value['bh'];
             $pm = $value['pm'];
             $ps = $value['ps'];
             $sl = $value['sl'];
             $ysmc = $value['ysmc'];
             $gg = $value['gg'];
             $dw = $value['dw'];
             $gh = $value['gh'];
             $sql=D('jxc')->tjcpxsfhjl($dh, $xh, $bh, $ps, $sl, $gh, $ysmc, $gg, $dw,$pm);
             $res = $this->cz($sql);
         }
         if ($res) {
             $this->jsonReturnSuccess();
         }*/


    }

    //查询产品销售发货(未审核)
    public function cxcpxsfhwsh()
    {

        $ksrq = I('ksrq');
        $jsrq = I('jsrq');
        $res = D('jxc')->cxcpxsfhwsh($ksrq, $jsrq);


        $this->ajaxReturn($res, 'json');
    }

    //查询产品销售发货(未审核)
    public function cxcpxsfhysh()
    {

        $ksrq = I('ksrq');
        $jsrq = I('jsrq');
        $res = D('jxc')->cxcpxsfhysh($ksrq, $jsrq);
        $this->ajaxReturn($res, 'json');
    }

    //查询产品销售发货(已结单)
    public function cxcpxsfhyjd()
    {

        $ksrq = I('ksrq');
        $jsrq = I('jsrq');
        $res = D('jxc')->cxcpxsfhyjd($ksrq, $jsrq);
        $this->ajaxReturn($res, 'json');
    }

    //查询产品销售明细
    public function cxcpxsfhmx()
    {
        $dh = I('dh');
        $res = D('jxc')->cxcpxsfhmx($dh);
        $this->ajaxReturn($res, 'json');

    }

    //查询产品销售汇总
    public function cxcpxsfhhz()
    {
        $dh = I('dh');
        $res = D('jxc')->cxcpxsfhhz($dh);
        $this->ajaxReturn($res, 'json');
    }


    //产品销售发货修改
    public function cpxsfhxg()
    {
        $cpinfo = I('msg');
        $dh = I('dh');
        $jxc = new Jxc();
        $jxc->sccpxsjl($dh);
        $jxc->sccpxsmx($dh);
        $jxc->xgcpxsfhdj($dh);
        $khmc = I('khmc');
        $ckmc = I('ckmc');

        $jxc->sfxgdj($dh, $khmc, $ckmc);
        foreach ($cpinfo as $value) {
            if ($value['tmbh'] != '') {
                $jxc->xgtm($value['tmbh']);
            }

        }
        /* foreach ($cpinfo as $value) {
             $values['dh'] = $dh;
             $values['xh'] = $this->cjxh();
             $values['bh'] = $value['bh'];
             $values['pm'] = $value['pm'];
             $values['ps'] = $value['ps'];
             $values['sl'] = $value['sl'];
             $value['gh'] = $value['gh'];
             $values['ysmc'] = $value['ysmc'];
             $values['gg'] = $value['gg'];
             $values['dw'] = $value['dw'];

             $arr[] = $values;
         }*/
        //  $sql = $this->insert($arr, 'cpxsfh_jl');
        //echo $sql;
        // $sql = iconv('GB2312//IGNORE','utf-8',$sql);
        foreach ($cpinfo as $value) {
            $dh = $dh;
            $xh = $this->cjxh();
            $bh = $value['bh'];
            $pm = $value['pm'];
            $ps = $value['ps'];
            $sl = $value['sl'];
            $gh = $value['gh'];
            $ysmc = $value['ysmc'];
            $gg = $value['gg'];
            $dw = $value['dw'];
            $yydh = $value['yydh'];
            $sql = D('jxc')->tjcpxsfhjl($dh, $xh, $bh, $ps, $sl, $gh, $ysmc, $gg, $dw, $pm);
            $res = $this->cz($sql);
            if (!$res) {
                $this->jsonReturnError();
            }

        }
        D('jxc')->sfsccpxsdj($dh);
        if ($res) {
            $this->jsonReturnSuccess();
        } else {
            $this->jsonReturnError();
        }

    }

    //产品销售发货删除订单
    public function sccpxsfh()
    {
        $dh = I('dh');
        if ($dh != '') {
            $res = D('jxc')->sccpxsdall($dh);
            if ($res) {
                $this->jsonReturnSuccess();
            }
        }

    }

    //审核产品销售发货
    public function shcpxsfh()
    {
        $dh = I('dh');
        if ($dh != '') {
            $res = D('jxc')->shcpxsfh($dh);
            if ($res) {
                $this->jsonReturnSuccess();
            }
        }
    }
     //作废销售发货单
    public function zfxsfhd(){
        $dh = I('dh');
        if($dh!=''){
            $res = D('jxc')->zfxsfhd($dh);
            if($res){
                $this->jsonReturnSuccess();
            }
        }
    }
    //创建单号
    public function cjdh()
    {
        $sql = "select top 1 dh from cpxsfh_dj where dh like   'XSFH'+
                 substring(convert(varchar(50),getdate(),112),3,len(convert(varchar(50),getdate(),112))-2)
                  +'%' order by dh desc";
        $res = M()->query($sql);
        if (!empty($res)) {
            $str = substr($res[0]['dh'], -4);
            $dhs = $str + 1;
        } else {
            $dhs = 1;
        }
        $dh = "XSFH" . date("ymd") . str_pad($dhs, 4, "0", STR_PAD_LEFT);
        /* $json['dh'] = $dh;
         $this->ajaxReturn($json,'json');*/
        return $dh;

    }

    //创建序号
    public function cjxh()
    {
        return date('ymdhis') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

    }

    //删除产品销售发货单
    public function sccpxsd()
    {
        $dh = I('dh');
        $res = D('jxc')->sccpxsd($dh);
        if ($res) {
            jsonReturnSuccess();
        } else {
            jsonReturnError();
        }
    }

    public function cxyydh()
    {
        $khmc = I('khmc');
        $ysmc = I('ysmc');
        $gg = I('gg');
        $res = D('jxc')->cxyydh($khmc, $ysmc, $gg);
        $this->ajaxReturn($res, 'json');
    }


}