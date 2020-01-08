<?php
namespace Home\Model;

class BaseModel
{
    public function cxkhlx($khmc){
        $sql = "select lx from dakhda where khmc='$khmc'";
        $sql = iconv('GB2312//IGNORE','utf-8',$sql);
        $res = M()->query($sql);
        return $res[0]['lx'];
    }
    //查询客户编号
    public function cxkhbh($khmc){
        $sql="select khbh from dakhda where khmc='$khmc'";
       // $sql = iconv('GB2312//IGNORE','utf-8',$sql);
        $res = M()->query($sql);
        return $res[0]['khbh'];
    }
    //查询客户
    public function cxkh(){
        $sql="select khmc from dakhda where sfty=0";
        $res = M()->query($sql);
        return $res;
    }
    //查询仓库
    public function cxck(){
        $sql=" select ckmc from dackda order by id desc";
        $res = M()->query($sql);
        return $res;
    }

}