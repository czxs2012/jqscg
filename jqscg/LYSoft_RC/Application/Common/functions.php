<?php
function jsonReturnSuccess()
{
    $json['status']=1;
    echo json_decode($json);
    exit;
}
function jsonReturnError(){
    $json['status']=0;
    echo json_decode($json);
    exit;
}