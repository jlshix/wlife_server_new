<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/8/20
 * Time: 15:50
 */
require_once 'data.php';
$pdo = connect();
$sql = "SELECT `master` FROM `gate` WHERE `imei`='356612040388664'";
$stmt = $pdo->query($sql);
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($res);