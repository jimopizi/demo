<?php
/**
 * 进程队列信息
 * User: haifeng
 * Date: 2019/6/29
 * Time: 14:55
 */
$workers = [];          //  进程池
$workerMaxNum = 2;      //  最大进程数

for ($i = 0; $i< $workerMaxNum; $i++){
    //  第一个参数 调用的函数, 第二个参数 默认参数false, 第三个参数 是否使用 管道通信 默认true
    $process = new swoole_process('doProcess', false, false);       //创建子进程完成
    $process->useQueue();   //  开启队列
    $pid = $process->start();
    $workers[$pid] = $process;
}
//  进程对应的执行函数
function doProcess(swoole_process $process){
    $recv = $process->pop();    //  最大值8192
    echo "从主进程获取到的数据: $recv".PHP_EOL;
    sleep(5);
    $process->exit(0);
}
//  主 进程 想 子进程添加数据
foreach ($workers as $pid => $process) {
    $process->push("Hello 子进程 $pid".PHP_EOL);
}
//  等待子进程 回收 资源
for ($i = 0; $i< $workerMaxNum; $i++){
   $ret = swoole_process::wait();
   $pid = $ret['pid'];
   unset($workers[$pid]);
   echo "子进程退出 : $pid".PHP_EOL;

}