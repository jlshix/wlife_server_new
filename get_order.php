<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/7/20
 * Time: 22:48
 *
 * 用于获取命令
 * 参数: gate type
 * 描述: 先不对条数进行限制
 * 返回: 成功返回 {code des info} code状态码 des描述 info为内容 直接ba查询结果转为json放入此字段即可
 *      失败返回相应错误码与描述 参见data.php
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