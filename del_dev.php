<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/6/14
 * Time: 19:25
 * 删除设备
 */
require_once 'data.php';

if(isset($_POST['gate']) && isset($_POST['type']) && isset($_POST['no'])){
    $gate = $_POST['gate'];
    $type = $_POST['type'];
    $no = $_POST['no'];
    $pdo=connect();
    $sql="DELETE FROM `device`
          WHERE `gate`='{$gate}' AND `type`='{$type}' AND `no`='{$no}'";
    $pdo->beginTransaction();
    $stmt = $pdo->query($sql);
    $res = $stmt->rowCount();
    if ($res == 1) {
        $pdo->commit();
        echo success();
    } else {
        $pdo->rollBack();
        echo fail();
    }
}else{
//    echo no_para();
    $res = array(
        "code" => "0",
        "info" => $_POST
    );
    echo json_encode($res);
}