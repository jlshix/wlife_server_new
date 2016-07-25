<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/6/14
 * Time: 19:25
 * 删除命令
 */
require_once 'data.php';

if(isset($_POST['gate']) && isset($_POST['id'])){
    $gate = $_POST['gate'];
    $id = $_POST['id'];

    $pdo=connect();
    $sql="DELETE FROM `orders`
          WHERE `gate`='{$gate}' AND `id`='{$id}'";
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
    echo no_para();
}