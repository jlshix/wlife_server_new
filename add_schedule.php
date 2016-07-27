<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/6/14
 * Time: 19:25
 * 添加命令
 */
require_once 'data.php';

if(isset($_POST['gate']) && isset($_POST['name']) && isset($_POST['type'])
    && isset($_POST['equal']) && isset($_POST['actions']) && isset($_POST['des'])){

    $gate = $_POST['gate'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $equal = $_POST['equal'];
    $actions = $_POST['actions'];
    $des = $_POST['des'];

    $pdo=connect();
    $sql= "INSERT INTO `orders`(`name`, `gate`, `equal`, `type`, `actions`, `des`)
            VALUES ('{$name}', '{$gate}', '{$equal}', '{$type}', '{$actions}', '{$des}')";
    $pdo->beginTransaction() ;//启动事务处理
    $stat = $pdo->query($sql) ;
    $count = $stat->rowCount() ;

    if ($count == 1) {
        $pdo->commit();
        echo success();
    } else {
        $pdo->rollBack();
        echo fail();
    }
}else{
    echo no_para();
//    echo json_encode($_POST);
    $res = array(
        "code" => "0",
        "info" => $_POST
    );
    echo json_encode($res);
}