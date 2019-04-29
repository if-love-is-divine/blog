<?php
$dblocahost = 'localhost';
$dbuser = 'root';
$dbpassword = 'root';
$dbname = 'myblog';
$dbpre = 'm_';

// 开启除了错误提示
error_reporting(E_ALL ^ E_NOTICE);

// 引入助手函数库
include_once 'lib/helper.php';

// 链接数据库
$cn = connect( $dblocahost, $dbuser, $dbpassword, $dbname);



