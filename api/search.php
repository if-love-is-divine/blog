<?php
date_default_timezone_set('PRC'); //设置中国时区 
include_once 'config/config.php';
	if($_GET){
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if( $action == 'index_blog') {
		$limit = isset($_GET['limit']) ? $_GET['limit'] : '';
		$r = getAll("article","art_cate_id = 1 limit {$limit}" );
		echo echo_json(0, $r);die;
	}

	//确定传过来的参数等于blog
	if( $action == 'blog') {
		//如果有传控制条数语句limit就把用它 否则为空
		$limit = isset($_GET['limit']) ? $_GET['limit'] : '';
		//如果有传控制条数语句limit就把用它否则为空
		$art_cate_id = isset($_GET['art_cate_id']) ? $_GET['art_cate_id'] : 1;
		
		//获取多条数据
		$r = getAll("article","art_cate_id = {$art_cate_id} limit {$limit}" );

		echo echo_json(0, $r);die;
	}

	if( $action == 'one_blog') {
		$art_cate_id = isset($_GET['art_cate_id']) ? $_GET['art_cate_id'] : 1;

		$id = isset($_GET['id']) ? $_GET['id'] : '';

			
		if(!$id || !$art_cate_id) {
			echo echo_json(1, '', '缺少参数');die;
		}

		$r = getOne("article","art_cate_id = {$art_cate_id} and art_id = {$id}");

		echo echo_json(0, $r);die;
	}
	//查询指定表和指定id的数据 
	if( $action == 'one') {
		//如果没有传入值就为空
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$table = isset($_GET['table']) ? $_GET['table'] : '';

		//id为空或不存在就结束
		if(!$id || !$table){
			echo echo_json(1, '', '缺少参数');die;
		}

		$r = getOne("{$table}","{$id}");

		echo echo_json(0, $r);die;
	}
	if( $action == 'common_nav') {
		$limit = isset($_GET['limit']) ? $_GET['limit'] : 4;
		$r = getAll("nav", "is_show = 1 order by nav_order desc  limit {$limit}" );
		echo echo_json(0, $r);die;
	}

	if( $action == 'common_setting') {
		$logo = getOne("setting", "set_name='logo'");
		$introl = getOne("setting", "set_name='introl'");
		$copyright = getOne("setting", "set_name='copyright'");

		$r = array(
			"logo" => $logo,
			"introl" => $introl,
			"copyright" => $copyright
		);

		echo echo_json(0, $r);die;

	}

	if( $action == 'get_message') {
		$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 7;
		$message = getAll("message", "is_show = 1 order by msg_id desc limit {$limit}");
		foreach($message as $key => $value) {
			$message[$key]['create_time'] = date('Y-m-d H:i:s', $value['create_time']);
		}

		if($message) {
			echo echo_json(0, $message);die;
		}
		echo echo_json(500);die;
	}
}

if($_POST){
	//获得通过POST传入的值，如果没有就为空
	$action = isset($_POST['action']) ? $_POST['action'] : ''; 
	if( $action == 'login'){
		echo 1;die;
		// $data = isset($_POST['data']) ? $_POST['data'] : '';

		// foreach($data as $key => $value){
		// 	//strip_tags 剥去字符串中的 HTML 标签：
		// 	// trim 去除两边的空格
		// 	// 把预定义的字符 "<" （小于）和 ">" （大于）转换为 HTML 实体 ENT_QUOTES 则是包括双引号和单引号 默认。仅编码双引号
		// 	$data[$key] = htmlspecialchars(trim(strip_tags($value)), ENT_QUOTES);
		// }
		// $data['create_time'] = time();

		// if($data) {
		// 	$r = insert('message', $data);	//插入数据
		// 	if($r) {
		// 		echo echo_json(0, $r, '插入成功');die;
		// 	}
		// }
		// echo echo_json(500,'','插入失败');die;
	}
}
