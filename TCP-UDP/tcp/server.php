<?php
/**
 * 服务端
 * @var $server = 服务
 * @var $fd = 客户端标识
 * User: haifeng
 * Date: 2019/6/28
 * Time: 11:02
 */
//  构造一个服务
$server = new Swoole\Server('0.0.0.0', 9500, SWOOLE_BASE, SWOOLE_SOCK_TCP);
//  设置运行时参数
$server->set(array(
    //'daemonize' => true //  后台运行
));
//  注册事件 connect 连接事件
$server->on('connect', function ($server, $fd){
    echo "有新的客户端连接, 连接标识----------$fd".PHP_EOL;
});
//  注册事件 receive 数据接收时的回调函数
$server->on('receive', function ($server, $fd, $reactor_id, $data){
    echo '接收客户端消息-------------'.$data.PHP_EOL;
    $server->send($fd, '我收到了'.PHP_EOL);
});
//  注册事件 close TCP客户端连接关闭后的毁掉函数
$server->on('close', function ($server, $fd){
    echo "有客户端关闭, 关闭标识----------$fd".PHP_EOL;
});
//  启动服务器
$server->start();