<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/7/20
 * Time: 22:48
 *
 * 用于获取家庭成员
 * 参数: gate
 * 描述: select name from account where gate
 * 返回: 成功返回 success() 失败返回相应错误码与描述 参见data.php
 */
require_once 'data.php';
if (isset($_POST['gate'])) {
    $gate = $_POST['gate'];
    $pdo = connect();
    $sql = "SELECT `name` FROM `account` WHERE `gate_imei`='{$gate}'";
    $stmt = $pdo->query($sql);
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $res = array(
        "code" => "1",
        "des" => "success",
        "info" => $info
    );
    echo json_encode($res);
} else {
    echo no_para();
}