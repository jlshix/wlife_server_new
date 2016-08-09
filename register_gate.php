<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 2016/7/20
 * Time: 22:43
 *
 * 用于网关首次启动时注册或者之后修改code
 * 参数:imei code dt
 * 描述:先判断是否有含有此imei的记录 没有则insert 有则update
 * 返回:成功返回 success() 失败返回相应错误码与描述 参见data.php
 */
require_once "data.php" ;
if(isset($_POST['imei'])){
    $imei = $_POST['imei'] ;

    $sql_Select = "SELECT * FROM `gate` WHERE imei='{$imei}'" ;
    $sql_Insert = "INSERT INTO `gate`(`imei`) VALUES ('{$imei}')" ;
    $stmt_Select = $pdo->query($sql_Select) ;
    $rowCount_Select = $stmt_Select->rowCount() ;
    if($rowCount_Select > 0){//有此imei的记录
        echo fail();
    }else{//没有此imei的记录
        $pdo->beginTransaction() ;
        $stmt_Insert = $pdo->query($sql_Insert) ;
        $rowCount_Insert = $stmt_Insert->rowCount() ;
        if($rowCount_Insert == 1){
            $pdo->commit() ;
            echo success() ;
        }else{
            $pdo->rollBack() ;
            echo fail() ;
        }
    }
}else{
    echo no_para() ;
}