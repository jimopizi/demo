<?php
/**
 * 异步客户端
 * User: haifeng
 * Date: 2019/6/28
 * Time: 13:48
 */
$client = new Swoole\Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
//  绑定相应事件 绑定之后 才能去连接
//  连接
$client->on('connect', function ($client){
    $client->send('哈哈哈');
});
//  收到消息
$client->on('receive', function ($client, $data){
    echo $data.'123'.PHP_EOL;
});
//  错误
$client->on('error', function ($client){

});
//  关闭服务
$client->on('close', function ($client){

});
if (!$client->connect('192.168.1.133', 9500, 500))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
echo "xian".PHP_EOL;