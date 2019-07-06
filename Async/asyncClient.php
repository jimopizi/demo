<?php
/**
 * 异步客户端
 * User: haifeng
 * Date: 2019/6/29
 * Time: 13:35
 */
//  创建异步TCP客户端
$client = new Swoole\Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
//  注册连接成功的回调
$client->on('connect', function ($cli){
    $cli->send("Hello".PHP_EOL);
});

//  注册数据接收
$client->on('receive', function ($cli, $data){
    var_dump($data);
    echo PHP_EOL;
});
//  注册失败
$client->on('error', function ($cli, $err){
    echo $err.PHP_EOL;
});
//  注册关闭
$client->on('close', function ($cli){
    echo "关闭".PHP_EOL;
});

$client->connect("192.168.1.133", 9501, 30);