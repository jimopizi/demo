<?php
/**
 * User: haifeng
 * Date: 2019/7/5
 * Time: 9:47
 */
$db = new swoole_mysql();
$config = [
    'host'=>'192.168.1.133',
    'user'=>'root',
    'password'=>'123456',
    'database'=>'swoole',
    'charset'=>'utf8'
];
//连接数据库
$db->connect($config,function($db,$r){
    //mysql操作
    if($r === false){
        var_dump($db->connect_errno,$db->connect_error);
        die("连接数据库失败");
    }
    $sql = 'show tables';
    $db->query($sql,function(swoole_mysql $db,$r){
        if($r === false){
            var_dump($db->error);
            die("操作失败");
        }
        var_dump($r[0]); //若有操作成功打印取出数据的第一个数组元素
        $db->close();
    });
});

