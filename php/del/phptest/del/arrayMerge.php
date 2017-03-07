<?php
/**
 * 数组合并测试
 * @var array
 */
$arr1 = array(3 => 5, 1 => 4, 8 => 2);
$arr2 = array(2 => 5, 4 => 1, 8 => 6);

$a = $arr1 + $arr2; //相同键不覆盖，
echo '$arr1 + $arr2' . "\n";
var_dump($a);
$a = $arr2 + $arr1;
echo '$arr2 + $arr1' . "\n";
var_dump($a);
$a = array_merge($arr1, $arr2);
echo 'array_merge($arr1, $arr2)' . "\n";
var_dump($a);

$a = array_merge($arr2, $arr1);
echo 'array_merge($arr2, $arr1)' . "\n";
var_dump($a);
