<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/7/23
 * Time: 21:00
 * for getActionByDialog 's dialog
 */
require_once 'data.php';
if(isset($_POST['gate']) && isset($_POST['place']) && isset($_POST['type'])) {
    $gate = $_POST['gate'];
    $place = $_POST['place'];
    $type = $_POST['type'];

    $pdo = connect();
    $sql = "SELECT `no`, `name` FROM `device` WHERE `gate`='{$gate}' AND `type`='{$type}' AND `place`='{$place}'";
    $stmt = $pdo->query($sql);
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $res = array(
        "code" => "1",
        "des" => "success",
        "info" => $info
    );
    echo json_encode($res);
} else {
    $arr = array(
        "code" => "-1",
        "info"=> $_POST,
        "des" => "no parameters"
    );
    echo json_encode($arr);
}