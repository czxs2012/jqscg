<?php
namespace Home\Controller;
use Think\Controller;
class PlusController extends Controller {
    public function sm(){
        $this->display('barcode_scan');
    }

}