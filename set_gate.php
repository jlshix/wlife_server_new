<?php
/*
 * 更改网关是否在线的接口
 * 传入online 0 or 1
 * 传入模式 0,1,2...
 */
require_once 'data.php';
require_once 'push.php';
if (isset($_POST['imei']) && isset($_POST['online'])) {
    $pdo = connect();
    $imei = $_POST['imei'];
    $online = $_POST['online'];
    $sql = "UPDATE `gate` SET `online`='{$online}' WHERE `imei`='{$imei}'";
    $pdo->beginTransaction();
    $stmt = $pdo->query($sql);
    $res = $stmt->rowCount();
    if ($res == 1 || $res == 0) {
        $pdo->commit();

        echo success();
    } else {
        $pdo->rollBack();
        echo fail();
//        echo $stmt->errorCode();
//        print_r($stmt->errorInfo());
    }
} elseif (isset($_POST['imei']) && isset($_POST['mode'])) {
    $pdo = connect();
    $imei = $_POST['imei'];
    $mode = $_POST['mode'];
    $sql = "UPDATE `gate` SET `mode`='{$mode}' WHERE `imei`='{$imei}'";
    $pdo->beginTransaction();
    $stmt = $pdo->query($sql);
    $res = $stmt->rowCount();
    if ($res == 1 || $res == 0) {
        $pdo->commit();
        echo success();
    } else {
        $pdo->rollBack();
        echo fail();
//        echo $stmt->errorCode();
//        print_r($stmt->errorInfo());
    }
} else {
    echo no_para();
}