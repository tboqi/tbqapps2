<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->set('test','hello world!');
echo $redis->get('test');
