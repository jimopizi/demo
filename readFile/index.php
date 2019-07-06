<?php
/**
 * 读取文件
 * User: haifeng
 * Date: 2019/7/5
 * Time: 9:37
 */
use Swoole\Coroutine as co;
$filename = __DIR__ . "/1.text";
co::create(function () use ($filename)
{
    $r =  co::readFile($filename);
    var_dump($r);
});