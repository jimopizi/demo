<?php
/**
 * 协程
 * User: haifeng
 * Date: 2019/6/28
 * Time: 14:45
 */
use Swoole\Coroutine as Co;
$s = microtime();
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
echo '开始:'.$s.PHP_EOL;
for ($i = 0; $i < 10; $i++){
    //  创建一个协程
    //$txt = "协程".$i.PHP_EOL;
    //fwrite($myfile, $txt);


    go(function () use($i, $myfile){
        $txt = "协程".$i.PHP_EOL;
        fwrite($myfile, $txt);
    });

}
$e = microtime();
$x = $e - $s;
echo '结束:'.$e.PHP_EOL;
echo '消耗:'.$x.PHP_EOL;
