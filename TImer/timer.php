<?php
/**
 * 定时器
 * User: haifeng
 * Date: 2019/6/29
 * Time: 10:51
 */
//   循环执行的定时器
swoole_timer_tick(2000, function ($timerId){
    echo "执行$timerId".PHP_EOL;
});

//    单次执行
swoole_timer_after(3000, function (){
    echo "3000后执行".PHP_EOL;
});