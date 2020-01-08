<?php

namespace Home\Controller;


use Think\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        header("Content-type: text/html; charset=utf-8");
        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

    }

    protected function insert($array,$table){
        $values = array();

        foreach ($array  as $k=>$arr){
            $key = array_keys($arr);

            $value = array();
            foreach ($arr as $val){
                $value[] = $this->parseValue($val);
            }
           // $values[] = '('.implode(',',$value).')';
            $values[] ='('.implode(',',$value).')';

        }
        $values = implode(',',$values);
        $key = implode(',',$key);

        $sql="insert into $table(".$key.")values ".$values;
        return $sql;



    }
    public function parseValue($value){
        if(is_string($value)){
            $value='\''.$value.'\'';
        }
        return $value;

    }
    public function escapeString($str){
        return addcslashes($str);
    }

    public function cz($sql){
        $res = M()->execute($sql);
        return $res;

    }
    function jsonReturnSuccess()
    {
        $json['status']=1;
        $this->ajaxReturn($json);
    }
    function jsonReturnError(){
        $json['status']=0;
        $this->ajaxReturn($json);
    }
}