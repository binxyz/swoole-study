<?php
$serv = new swoole_server("192.168.10.10", 9501);
$serv->set(array(
    'worker_num' => 1,
    'max_request' => 4
));

$serv->on('connect', function($serv, $fd) {
    echo "客户端：{$fd}连接...\n";
});

$serv->on('receive', function($serv, $fd, $from_id, $data) {
    $serv->send($fd, "服务发送:".$from_id.'数据'.$data."\n");
});

$serv->on('close', function($serv, $fd) {
    echo "客户端关闭\n";
});

$serv->start();