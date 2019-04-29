<?php
    header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
include_once 'config/config.php';

	$username = isset($_POST['name']) ? $_POST['name'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	// var_dump($username);
	// var_dump($password);
	$where = "a_username='$username' and a_password='$password'";
	// $where = 'id = 1';
	$r = getOne('admin', $where);
	echo echo_json(0,$r);die;
?>