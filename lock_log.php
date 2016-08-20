<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/6/14
 * Time: 19:25
 * 获取消息列表
 */

require_once 'data.php';
if(isset($_POST['gate'])) {
    //账号->设备imei->消息
    $gate= $_POST['gate'];
    $pdo = connect();
    $sql = "SELECT * FROM `lockLog` WHERE `gate`='{$gate}' ORDER BY `dt` DESC " ;

    $stmt = $pdo->query($sql);
    $dev = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $res = array(
        "code" => "1",
        "info" => $dev
    );
    echo json_encode($res);
} else {
    echo no_para();
}