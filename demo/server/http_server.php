<?php
$http = new swoole_http_server("0.0.0.0", 8888);
$http->set(array(
    'enable_static_handler' => true,
    'document_root' => '/home/vagrant/code/swoole/data'
));
$http->on('request', function ($request, $response) {
    var_dump($request->get, $request->post);
//    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});

$http->start();