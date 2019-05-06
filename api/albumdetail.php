<?php
    header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
include_once 'config/config.php';
	$id = isset($_GET['id']) ? $_GET['id'] :'';
	$group = isset($_GET['group']) ? $_GET['group'] : '';
	$sql = 'SELECT * FROM m_abl_classfiy AS mac JOIN m_album AS ma on mac.a_id = ma.a_id WHERE mac.acy_id = '.$id;
	echo $sql;die;

	$r = getSql($sql);
	echo echo_json(0,$r);die;
?>