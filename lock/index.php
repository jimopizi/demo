<?php
/**
 * swoole 锁机制
 * User: haifeng
 * Date: 2019/7/5
 * Time: 9:18
 */
//  创建锁对象  SWOOLE_MUTEX : 互斥锁
$lock = new swoole_lock(SWOOLE_MUTEX);

echo "创建互斥锁".PHP_EOL;

$lock->lock(); //   开始锁定

if (pcntl_fork() > 0) {
    sleep(1);
    $lock->unlock();        //  解锁
}else{
    echo "子进程等待锁".PHP_EOL;
    $lock->lock();  //  上锁
    echo "子进程获取锁".PHP_EOL;
    $lock->unlock();    //  释放锁
    exit("子进程退出".PHP_EOL);
}
echo "主进程释放锁".PHP_EOL;
unset($lock);
sleep(1);
echo "子进程退出".PHP_EOL;
