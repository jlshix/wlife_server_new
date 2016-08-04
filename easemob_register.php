<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/8/2
 * Time: 11:06
 */
include_once('Easemob.class.php');
$options['client_id']="YXA6jhnjUPTZEeW5mTkx4owsGg";
$options['client_secret']="YXA6e1xOW6_1R3ws9nEYAIITtiZXwqk";
$options['org_name']="wlife";
$options['app_name']="wlife";
$easemob=new Easemob($options);
if(isset($_POST['username']) && isset($_POST['password'])){
    $account['username']=$_POST['username'] ;
    $account['password']=$_POST['password'];
    //这里处理自己服务器注册的流程
    //自己服务器注册成功后向环信服务器注册
    $result=$easemob->accreditRegister($account);
    echo $result;
}else{
    $res['status']=404;
    $res['message']="params is not right";
    echo json_encode($res);
}