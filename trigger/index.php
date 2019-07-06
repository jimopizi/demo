<?php
/**
 * 触发器
 * User: haifeng
 * Date: 2019/7/5
 * Time: 9:09
 */
//  触发函数   异步执行
swoole_process::signal(SIGALRM, function (){
    static $i = 0;
    echo "$i".PHP_EOL;
    $i++;
    if ($i > 10){
        swoole_process::alarm(-1);
    }
});
//  定时信号 参数 微秒
swoole_process::alarm(100*1000);

