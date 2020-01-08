<?php
namespace Home\Controller;
class IndexController extends ConController{
    public function index(){

       $this->display('index');
    }

    public function sm(){
        $this->display('index/sm');
    }


    // 查询部门
    public function bm(){
        $bmid = $_SESSION['bmid'];
        $pwd = $_SESSION['pwd'];
        $sql = " select * from dabmda where id = '$bmid' ";
        $res = M()->query($sql);
        if (!empty($res)){
            echo "
                <option value='".$res[0]['id']."'>".$res[0]['bm']."</option>
            ";
        }

        $sql = " select * from dabmda where id <> '$bmid' order by id ";
        $res = M()->query($sql);
        for ($i = 0; $i < count($res); $i++){
            echo "
                <option value='".$res[$i]['id']."'>".$res[$i]['bm']."</option>
            ";
        }
        echo "&".$pwd;

    }

    // 登录
    public function login(){
        // 获取部门id
        $ygbh = $_POST['ygbh'];
        $pwd = $_POST['pwd'];
        $zddl = $_POST['zddl'];
       // $sql = " select * from dabmda where id = '$bmid' and mm = '$pwd' ";
        $sql="select * from daygda where txbh='$ygbh' and appmm='$pwd'";
        $res = M()->query($sql);
        // 登录成功后保存登录信息
        if (count($res) == 1){
           // session_start();
            if($zddl==1){
                setcookie('ygbh',$ygbh,time()+3600*24,"/");
                setcookie('pwd',$pwd,time()+3600*24,"/");
//                exit;
            }

            $_SESSION['ygbh'] = $ygbh;
            $_SESSION['pwd'] = $pwd;
            $_SESSION['ygmc']= $res[0]['ygmc'];
            $_SESSION['yggh']=$res[0]['yggh'];
          /*  $sql = "select gx from dabmda where id='$bmid'";
            $res = M()->query($sql);
            if($res[0]['gx']==''){
                echo 2;
            }else{
                echo 1;
            }*/
          echo 1;
        } else {
            echo 0;
        }
    }
    //自动登录
    public function autoLogin(){
        if(cookie('ygbh')&&cookie('pwd')){
            $ygbh = cookie('ygbh');
            $pwd = cookie('pwd');
            $sql = " select * from daygda where txbh ='$ygbh'  and appmm = '$pwd' ";
            $res = M()->query($sql);
            if(count($res)==1){
                if($res[0]['bm']=='车间'){
                    echo 1;
                }else{
                    echo 2;
                }
            }else{
                echo 0;exit;
            }
        }/*else{
            echo "1"."&";
        }*/
    }
    public function zxdl(){
        setcookie("pwd","",time()-3600,"/");
        setcookie("ygbh","",time()-3600,"/");
        echo 1;
    }
    public function xgmm(){
        $bmid = $_SESSION['bmid'];
        $pwd = I('pwd');
        if($pwd!=''){
           $sql = "update dabmda set mm='$pwd' where id='$bmid'";
           $res = M()->execute($sql);
           if($res){
               $json['status'] = $res;
               $json['message'] ='修改密码成功';
               $this->ajaxReturn($json,'json');
           }else{
               $json['status'] = 0;
               $json['message'] ='无法修改密码';
               $this->ajaxReturn($json,'json');
           }
        }else{
            $json['status'] = 0;
            $json['message'] ='请输入密码！';
            $this->ajaxReturn($json,'json');
        }
    }
    //查询客户
    public function cxkh(){
        $res = D('base')->cxkh();
        $this->ajaxReturn($res,'json');
    }
    //查询仓库
    public function cxck(){
        $res = D('base')->cxck();
        $this->ajaxReturn($res,'json');
    }
}