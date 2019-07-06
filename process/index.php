<?php
/**
 * 创建进程 添加事件
 * User: haifeng
 * Date: 2019/6/29
 * Time: 13:58
 */
//  进程池
$workers = [];
//  创建进程数量
$workerNum = 3;
//  创建进程

//  创建进程1
for ($i = 0; $i< $workerNum; $i++){
    $process = new swoole_process('doProcess');
    $pid = $process->start();
    $workers[$pid] = $process;
}
//swoole_process::wait();

//  进程对应的执行函数
function doProcess(swoole_process $worker){
    $worker->write("PID : $worker->pid");
    echo "写入信息到 : $worker->pid ---------- $worker->callback".PHP_EOL;
}
//  向每个子进程添加需要执行的动作
foreach ($workers as $p){
    //  添加进程事件
    swoole_event_add($p->pipe, function ($pipe) use ($p){
        $data = $p->read();
        echo $data.PHP_EOL;
    });
}