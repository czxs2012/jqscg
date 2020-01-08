<?php
namespace Home\Controller;
use Think\Controller;

class ConController extends Controller {
public $ym;
	function __construct() {
		//执行父类的构造方法
		parent::__construct();

		//中文编码以utf-8显示
		header("Content-type: text/html; charset=utf-8");
        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

		if (!cookie('userName')) {
			//$this -> U('Index/index');
		}
//		$this->ym = cookie('ym');
//		$this->username = cookie('userName');
//		$config = array(
//			'DB_TYPE' => 'sqlsrv', 
//			'DB_HOST' => cookie('ym'), 
//			'DB_NAME' => cookie('sjkmc'), 
//			'DB_USER' => 'sa', 
//			'DB_PWD' => cookie('sjkmm'), 
//			'DB_CHARSET' => 'utf8',
//			);
//			//更新配置
//			C($config);
		//exit(C('DB_HOST'));
	}	
	}
	
?>