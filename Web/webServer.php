<?php
/**
 * User: haifeng
 * Date: 2019/6/29
 * Time: 10:12
 */
$server = new swoole_http_server("0.0.0.0", 9501);
/**
 * @var $request : 请求信息
 * @var $response : 响应信息
 */
$server->on('request', function ($request, $response){
    var_dump($request);
    $response->header('Content-Type', 'text/html', 'charset=utf-8');
    $response->end('Hello World'.rand(100,999));
});
$server->start();