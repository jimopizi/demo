<?php
/**
 * User: haifeng
 * Date: 2019/6/29
 * Time: 10:33
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script>
    var wsServer = 'ws://haifeng.test.com:9501/04/webSocketServer.php';
    var webSocket = new WebSocket(wsServer);
    webSocket.onopen = function (event) {
        console.log('连接成功');
    }
    webSocket.onclose = function (event) { 
        console.log('关闭成功');
    }
    webSocket.onmessage = function (event) {
        console.log(event.data);
    }
    webSocket.onerror = function (event, e) { 
        console.log('error');
    }
</script>
</body>
</html>
