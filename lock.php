<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/8/20
 * Time: 21:29
 */
require_once 'data.php';
if (isset($_POST['gate']) && isset($_POST['name']) && isset($_POST['action'])) {

    $gate = $_POST['gate'];
    $name = $_POST['name'];
    $action = $_POST['action'];

    $pdo = connect();

    $sql = "INSERT INTO `lockLog`(`gate`, `name`, `action`) VALUES ('{$gate}', '{$name}', '{$action}')";

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


} else {
    echo no_para();
}