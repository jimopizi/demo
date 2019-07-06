<?php
/**
 * DNS查询 现在不需要了, 底层 自动解析域名
 * User: haifeng
 * Date: 2019/7/5
 * Time: 9:26
 */
//  执行DNS 查询 不好使 找不到 方法
//swoole_async_dns_lookup("www.baidu.com", function($host, $ip){
//    echo "{$host} : {$ip}\n";
//});