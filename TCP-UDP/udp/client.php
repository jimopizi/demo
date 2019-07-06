<?php
/**
 * 客户端
 * User: haifeng
 * Date: 2019/6/28
 * Time: 14:12
 */
$client = new Swoole\Client(SWOOLE_SOCK_UDP);

$client->sendto('127.0.0.1', 9500, "UDP\n");

echo $client->recv().PHP_EOL;