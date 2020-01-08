<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-09-28
 * Time: 15:40
 */

namespace Home\Controller;


use Think\Controller;

class CsController extends Controller
{
    public function hc(){
        $tmbh = I('tmbh');
        if(!S('res')){
            $sql="select tmbh  from  crhtmbcp where tmbh='$tmbh'";
            $res = M()->query($sql);
            S('res',$res,3600*24);
        }else{
            $res = S('res');
           $wxtms = S('wxtms');
            foreach ($res as $val){
                if($val['tmbh']==$tmbh){
                    $wxtms+=1;
                    echo "条码已经扫过了,无效条码数为".$wxtms;exit();
                }
            }
            $sql="select tmbh  from  crhtmbcp where tmbh='$tmbh'";
            $res1 = M()->query($sql);
            $res = array_merge($res,$res1);
            S('res',$res,3600*24);

        }



    }
    public function qchc(){
        S('res',null);
    }

    public function cateList(){
        $books = array(array('name'=>'123','type'=>1,'price'=>100),array('name'=>'321','type'=>2,'price'=>10000),
            array('name'=>'234','type'=>1,'price'=>200));
        $array = array();
        foreach ($books  as $value){
            $array['type'][] = $value;
        }
        print_r($array);
    }

}