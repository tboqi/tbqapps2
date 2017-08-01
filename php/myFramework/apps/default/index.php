<?php
$app_dir = dirname(__FILE__); //应用跟目录
$base_dir = dirname(dirname(__DIR__)); //框架跟目录

require "{$base_dir}/classes/Application.php";
(new Application())->run();