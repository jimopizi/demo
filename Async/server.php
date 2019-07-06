<?php
/**
 * 异步TCP 服务器
 * User: haifeng
 * Date: 2019/6/29
 * Time: 11:05
 */
//  创建TCP 服务器
$server = new swoole_server('0.0.0.0', 9501);

// 设置异步进程工作数量
$server->set([
    'task_worker_num'=>4
]);

//  投递异步任务
$server->on('receive', function ($server, $fd, $reactor_id, $data){
    $taskId = $server->task($data);
    echo "内容 : ". $data.PHP_EOL;
    echo "异步ID : $taskId".PHP_EOL;
});

//  处理异步任务
$server->on('task', function ($server, $taskId, $reactor_id, $data){
    echo "执行异步ID : $taskId".PHP_EOL;
    $server->finish("$data -> OK");
});

//  处理结果
$server->on('finish', function ($server, $taskId, $data){
    echo "执行完成".PHP_EOL;
});

//  开始执行
$server->start();