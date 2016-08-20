<?php
/**
 * Created by PhpStorm.
 * User: zbc
 * Date: 2016/8/13
 * Time: 20:45
 * 参数：date(日期)，gimei(网关imei)，nodeid(节点id)
 */

require_once 'data.php' ;
if(isset($_POST['date']) && isset($_POST['gate']) && isset($_POST['no']) && !isset($_POST['count']) ){
    $date = $_POST['date'] ;
    $gImei = $_POST['gate'] ;
    $nodeId = $_POST['no'] ;
    if ($date == 'all') {
        $sql = "SELECT `state`,`date`,`time` FROM `statistics` WHERE `gate`='{$gImei}' AND `no`='{$nodeId}' AND `time` IS NULL " ;
    } else {
        $sql = "SELECT `state`,`date`,`time` FROM `statistics` WHERE `gate`='{$gImei}' AND `no`='{$nodeId}' AND
`date`='{$date}' AND `time` IS NOT NULL " ;
    }

    $stmt = $pdo->query($sql) ;
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

    $res_success = array(
       "code" => "1",
        "info" => $res,
        "des" => "statistics"
    ) ;
    echo json_encode($res_success);

} elseif (isset($_POST['date']) && isset($_POST['gate']) && isset($_POST['no']) && isset($_POST['count'])){
    $date = $_POST['date'] ;
    $gImei = $_POST['gate'] ;
    $nodeId = $_POST['no'] ;
    $count = $_POST['count'];

    $sql = "SELECT `state`,`date`,`time` FROM `statistics`
            WHERE `gate`='{$gImei}' AND `no`='{$nodeId}' AND `date` <= '{$date}' AND `time` IS NULL
            ORDER BY `date` DESC LIMIT {$count}";

    $stmt = $pdo->query($sql) ;
    $res = array();
    if ($stmt) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $res_success = array(
        "code" => "1",
        "info" => $res,
        "des" => "statistics"
    ) ;
    echo json_encode($res_success) ;

}

else{
    echo no_para() ;
}