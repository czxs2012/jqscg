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
    //��ѯ�ͻ����
    public function cxkhbh($khmc){
        $sql="select khbh from dakhda where khmc='$khmc'";
       // $sql = iconv('GB2312//IGNORE','utf-8',$sql);
        $res = M()->query($sql);
        return $res[0]['khbh'];
    }
    //��ѯ�ͻ�
    public function cxkh(){
        $sql="select khmc from dakhda where sfty=0";
        $res = M()->query($sql);
        return $res;
    }
    //��ѯ�ֿ�
    public function cxck(){
        $sql=" select ckmc from dackda order by id desc";
        $res = M()->query($sql);
        return $res;
    }

}