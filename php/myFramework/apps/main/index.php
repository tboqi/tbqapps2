<?php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

switch (ENVIRONMENT) {
case 'development':
    error_reporting(-1);
    ini_set('display_errors', 1);
    break;

case 'testing':
case 'production':
    ini_set('display_errors', 0);
    if (version_compare(PHP_VERSION, '5.3', '>=')) {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    } else {
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
    break;

default:
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'The application environment is not set correctly.';
    exit(1); // EXIT_ERROR
}

// Set the current directory correctly for CLI requests
if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

// Path to the system directory 框架安装目录
define('BASEPATH', dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR);
define('APPPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR); //应用目录
define('VIEWPATH', APPPATH . 'views'); //视图目录

//静态文件地址
define('SPATH', '/statics/'); //可以直接填入带域名的地址, 实现动静分离

define('LOGPATH', APPPATH . 'logs/runtime/');

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */
// require_once BASEPATH . 'core/CodeIgniter.php';
