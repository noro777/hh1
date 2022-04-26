<?php
require './vendor/autoload.php';
$redis = new Predis\Client();

function error($e){
    return json_encode([
        'status' => false,
        'code' => 500,
        'data' => [
            'message' => $e
        ]
    ]);
}

function index(){
    $redis = new Predis\Client();
    $list = $redis->keys("*");
    sort($list);
    $data = [];
    foreach ($list as $key)
    {
        $value = $redis->get($key);
        $data[$key] = $value;
    }
    $redis->disconnect();
    $datas = [
        'status' => true,
        'code' => 200,
        'data' => $data
    ];
    return json_encode($datas);
}

function delete($key){
    $redis = new Predis\Client();

    $redis->del($key);

    $redis->disconnect();

    return json_encode([
        'status' => true,
        'code' => 200,
        'data' => []
    ]);
}

function addRedis($key,$value){
    $redis = new Predis\Client();
    $redis->set($key,$value);
    $redis->expire($key,3600);
    $redis->disconnect();
}

