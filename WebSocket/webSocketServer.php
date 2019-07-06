<?php
/**
 * 服务端
 * User: haifeng
 * Date: 2019/6/29
 * Time: 10:26
 */
$ws = new swoole_websocket_server('0.0.0.0', 9501);
//  建立连接
$ws->on('open', function ($ws, $request){
    print_r($request);
    $ws->push($request->fd, '欢迎光临 webSocket'.PHP_EOL);
});
//  接收信息
$ws->on('message', function ($ws, $request){
    echo 'Message : '.$request->data;
    $ws->push($request->fd, '接收到了');
});
//  关闭连接
$ws->on('close', function ($ws, $request){
    echo '关闭连接'.PHP_EOL;
});

$ws->start();