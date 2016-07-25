<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/6/16
 * Time: 15:15
 * 获取模式与命令
 * type为all时获取全部, 有 mode 和 voice
 */
require_once 'data.php';
if(isset($_POST['gate'])&&isset($_POST['type'])) {
    $gate= $_POST['gate'];
    $type = $_POST['type'];
    $pdo = connect();
    if ($type == "all") {
        $sql = "SELECT * FROM `orders` WHERE `gate`='{$gate}'";
    } else {
        $sql = "SELECT * FROM `orders` WHERE `gate`='{$gate}' AND `type`='{$type}'";
    }

    $stmt = $pdo->query($sql);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dev = $res;
    $res = array(
        "code" => "1",
        "info" => $dev,
        "des"=>"success"
    );
    echo json_encode($res);
}
else {
    echo no_para();
}