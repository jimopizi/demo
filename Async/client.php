<?php
/**
 * 同步客户端
 * User: haifeng
 * Date: 2019/6/29
 * Time: 11:18
 */
const HOST = '192.168.1.133';
//  创建TCP 客户端
$client = new swoole_client(SWOOLE_SOCK_TCP);
//  连接服务器
if (!$client->connect(HOST, 9501, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$client->send("Hello World".rand(100,999).PHP_EOL);
echo $client->recv();
$client->close();