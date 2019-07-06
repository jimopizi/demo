<?php
/**
 * 服务端
 * User: haifeng
 * Date: 2019/6/28
 * Time: 14:12
 */
//  构造一个服务
$server = new Swoole\Server('0.0.0.0', 9500, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);
//  设置运行时参数
$server->set(array(
    //'daemonize' => true //  后台运行
));
//  注册事件 packet
$server->on('packet', function ($server, $data, $client_info){
    echo '接收客户端消息-------------'.$data.PHP_EOL;
    $server->sendto($client_info['address'], $client_info['port'], '我是UDP');
});

//  注册事件 receive 数据接收时的回调函数
$server->on('receive', function ($server, $fd, $reactor_id, $data){
    echo '接收客户端消息-------------'.$data.PHP_EOL;
    $server->send($fd, '我收到了'.PHP_EOL);
});
//  启动服务器
$server->start();