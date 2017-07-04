<?php
//phpinfo();

$conn = mysqli_connect('127.0.0.1', 'root', 'root');
if ($conn) {
    die('lian 接失败');
} else {
    die('no');
}
