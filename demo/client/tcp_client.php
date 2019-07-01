<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);

//连接到服务器
if (!$client->connect('192.168.10.10', 9501, 0.5))
{
    die("连接 失败.");
}
//向服务器发送数据
//if (!$client->send("hello world"))
//{
//    die("send failed.");
//}
while (true) {
    fwrite(STDOUT, "请输入消息：");
    $msg = trim(fgets(STDIN));
    if ($msg == 'exit') {
        break;
    }
    $client->send($msg);
//从服务器接收数据
    $data = $client->recv();
    if (!$data)
    {
        die("接收失败.");
    }
    echo $data;
}

//关闭连接
$client->close();