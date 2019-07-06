<?php
/**
 * 客户端
 * User: haifeng
 * Date: 2019/6/28
 * Time: 13:20
 */
const HOST = '192.168.1.133';
$client = new Swoole\Client(SWOOLE_SOCK_TCP);
$config = [
    'host' => HOST,
    'user' => 'root',
    'password' => '123456',
    'database' => 'swoole',
    'charset' => 'utf8',
];
$db = new Swoole\Mysql();
$db->connect($config, function ($db, $r) {
    if ($r === false) {
        var_dump($db->connect_errno, $db->connect_error);
        die;
    }
    $sql = 'select `user` from `account` WHERE `id`=1';

    $db->query($sql, function(swoole_mysql $db, $r) {
        if ($r === false)
        {
            var_dump($db->error, $db->errno);
        }
        elseif ($r === true )
        {
            var_dump($db->affected_rows, $db->insert_id);
        }
        $this->sqlResult = $r;
        $db->close();
    });
});

if (!$client->connect(HOST, 9500, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}

$client->send("$this->sqlResult\n");
echo $client->recv();

$client->close();