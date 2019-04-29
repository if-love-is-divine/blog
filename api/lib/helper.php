<?php
/**
 * [dump 打印变量]
 * @author JunJuaHuang
 * @DateTime 2018-12-26T14:31:39+0800
 * @param    [type]                   $value [变量]
 * @return   [type]                          [打印的结果]
 */
function dump($value) {
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
}

//传入数据 转换成数组形式
function echo_json($error = 0, $data = null, $msg = ''){
	$arr = array(
		'error' => $error,
		'data' => $data,
		'msg' => $msg
	);
	return json_encode( $arr);
}

/**
 * [fsize 转换文件大小格式]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $size [数值]
 * @return   [type]                         [字符串]
 */
function fsize($size) {
	$types = array('b','kb','M','G','T');

	$type = $types['0']; // kb
	if( $size > pow(1024, 4) ) {
		$type = $types['4']; // T 
		$size = $size / pow(1024, 4);
	}else if( $size > pow(1024, 3) ) {
		$type = $types['3']; // G
		$size = $size / pow(1024, 3);
	}else if( $size > pow(1024, 2)) {
		$type = $types['2']; // M
		$size = $size / pow(1024, 2);
	}else if( $size > pow(1024, 1)) {
		$type = $types['1']; // k
		$size = $size / pow(1024, 1);
	}

	return ceil($size) . $type;
}

function show_msg($msg, $url = '') {
	if(!$msg) return false;

	echo "<script>alert('{$msg}');</script>";

	if($url) {
		echo "<script>location.href='{$url}';</script>";
	}else{
		echo "<script>history.go(-1)</script>";
	}

}

/**
 * [deldir 删除文件夹]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $dir [文件夹]
 * @return   [type]                        [布尔值]
 */
function deldir($dir) {
	if( file_exists( $dir ) ) {
		$files = scandir($dir);
		foreach($files as $value) {
			if($value != '.' && $value != '..') {
				$value = $dir . '/' . $value;
				if(is_dir($value)) {
					deldir($value);
				}
				if(is_file($value)) {
					unlink($value);
				}
			}
		}
		$r = rmdir($dir);
		return $r;
	}
	return false;
}
/**
 * [upload_file 上传图片]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $filename [上传文件名]
 * @param    [type]                   $uploads  [上传路径]
 * @param    [type]                   $$fsize   [允许上传大小]
 * @return   [type]                          [数组]
 */
function upload_file( $filename , $uploads = './uploads/', $fsize = 1048576 ){
 	
	if( !file_exists( $uploads ) ) {
		mkdir( $uploads , 0777);
	}

	if ( !$_FILES[$filename] ){
		return '没有该字段文件';
	}

	// 获取文件信息
	$fileInfo = $_FILES[$filename];

	// 判断错误
	$fileError = $fileInfo['error'];
	if( $fileError > 0) {
		switch( $fileError ) {
			case 1: 
				return '上传的文件大小超出了 upload_max_filesize指令指定的值';
				break;
			case 2:
				return '试图上传的文件大小超出了MAX_FILE_SIZE指令指定的值';
				break;
			case 3:
				return '文件没有完全上传';
				break;
			case 4:
				return '没有指定上传的文件';
				break;
			default;
		}
	}

	// 判断文件格式是否符合设置格式
	$fileType = explode('/',$fileInfo['type']);
	$fileType = end($fileType);


	$types = array('jpg', 'jpeg', 'gif', 'png');
	if( !in_array( $fileType, $types )) {
		return '上传文件不符合格式';
	}

	// 图片后缀
	$ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);

	// 判断文件大小是否符合设置大小
	$fileSize = $fileInfo['size'];
	if($fileSize > $fsize ) {
		return '上传文件超过设置大小';
	}

	// 重命名文件
	$newFile = $uploads . date('YmdHis') . mt_rand(0,10000)  . '.'. $ext;
	
	if( is_uploaded_file( $fileInfo['tmp_name']) ) { // 是否上传到临时目录
		$r = move_uploaded_file($fileInfo['tmp_name'] , $newFile);
		if($r) return $newFile;
	}
	return false;
}
/**
 * [thumbnail 上传缩略图]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $filename [原图]
 * @param    [type]                   $dest_w   [缩略图宽]
 * @param    [type]                   $dest_h   [缩略图高]
 * @return   [type]                             [数组]
 */
function thumbnail($filename, $dest_w = '', $dest_h = '', $newFile = '' ){

	// 同时没有宽高时，其中宽高有一个小于0
	if( !$dest_w || !$dest_h) return false;

	if( $dest_w && $dest_w < 0) return false;
	
	if( $dest_h && $dest_h < 0) return false;

	// 获取原图大小和类型
	list($s_w, $s_h, $type) = getimagesize($filename);
	// 根据原图类型设置图片的函数
	switch($type){
		case 1:
			$type = 'gif';
			break;
		case 2:
			$type = 'jpeg';
			break;
		case 3:
			$type = 'png';
			break;
		default;	
	}

	// $s_w/$dest_w = $s_h/$dest_h;
	// 只有一个值时，根据比例去求得另一个值
	if($dest_w && !$dest_h) {
		$dest_h = $s_h/$s_w*$dest_w;
	}
	if($dest_h && !$dest_w) {
		$dest_w = $s_w/$s_h*$dest_h;
	}
	
	$imgcreateFn = 'imagecreatefrom'.$type; // 拼接成动态函数
	// 原图
	$source_img = $imgcreateFn($filename);
	// 缩略图
	$dest_img = imagecreatetruecolor($dest_w, $dest_h );
	// 重采样拷贝部分图像并调整大小
	imagecopyresampled($dest_img, $source_img, 0 ,0 ,0 ,0, $dest_w, $dest_h, $s_w, $s_h);
	// 输出到浏览器显示
	// 生成新的图片
	$imageFn = 'image'.$type; // 拼接成动态函数

	if( !$newFile ) {
		header("Content-Type: image/{$type}");
		$imageFn($dest_img, null);
		imagedestroy($source_img);
		imagedestroy($dest_img);
		exit;
	}
	
	$r = $imageFn($dest_img, $newFile );
	imagedestroy($source_img);
	imagedestroy($dest_img);

	return $r;
}
/**
 * [connect 连接数据库]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $dblocahost   [服务器名称]
 * @param    [type]                   $dbuser       [登录名]
 * @param    [type]                   $dbpassword   [密码]
 * @param    [type]                   $dbname       [数据库]
 * @return   [type]                                 [对象]
 */
function connect( $dblocahost, $dbuser, $dbpassword, $dbname ){
	//连接数据库
	$cn = new mysqli($dblocahost, $dbuser, $dbpassword, $dbname );
	if( $cn->connect_errno ) {
		die('数据库链接失败：' . $cn->connect_error );
	}
	$cn->set_charset('utf8');//设置编码
	return $cn;
}
/**
 * [getAll 获取多条数据]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $table [表名]
 * @param    [type]                   $where [获取条件]
 * @return   [type]                          [数组]
 */
function getAll($table, $where = '1') {
	global $cn;
	global $dbpre;
	//根据传入的where获取{$DBPRE}{$table}里面的数据
	$sql = "SELECT * FROM {$dbpre}{$table} where {$where}";
	$r = $cn->query($sql);	//执行sql语句
	if($r && $r->num_rows > 0 ) {
		$data = [];
		while( $res = $r->fetch_assoc() ){ // 获取关联数组
			$data[] = $res;
		}
		return $data;	//返回结果数组
	}
	return false;
}

/**
 * [getOne 获取单条数据]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $table [表名]
 * @param    [type]                   $where [获取条件]
 * @return   [type]                          [数组]
 */
function getOne($table, $where = '1') {
	global $cn;
	global $dbpre;
	//根据$where查询{$dbpre}{$table}并且限制为1条
	$sql = "SELECT * FROM {$dbpre}{$table} where {$where} limit 1";
	$r = $cn->query($sql);	//执行sql语句

	if($r && $r->num_rows > 0 ) {
		return $r->fetch_assoc();	// 返回结果
	}
	return false;
}

/**
 * [getSql ]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:18:30+0800
 * @param    [type]                   $sql 	 [sql语句]
 * @return   [type]                          [数组]
 */
function getSql( $sql) {
	global $cn;
	global $dbpre;
	
	$r = $cn->query($sql);//执行传入的sql语句

	if($r && $r->num_rows > 0 ) {//返回值必须存在并且大于零
		$data = [];
		while( $res = $r->fetch_assoc() ){ // 获取关联数组
			$data[] = $res;
		}
		return $data;
	}
	return false;
}


/**
 * [getBySql 自定义查询语句]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:01:55+0800
 * @param    [type]                   $table [数据库名]
 * @param    string                   $field [字段名]
 * @param    string                   $where [条件语句]
 * @param    [type]                   $join  [连表查询]
 * @param    [type]                   $order [顺序]
 * @param    [type]                   $limit [控制语句]
 * @return   [type]                          [结果数组]
 */
function getBySql($table, $field = '*', $where = '', $join = '', $order = '', $limit = '') {
	global $cn;
	global $dbpre;
	//判断是否有$where传入，如果有就进行拼接
	if( $where ) $where = " where " . $where;

	$sql = "SELECT {$field} FROM {$dbpre}{$table} ";

	//拼接要连接的表
	if($join) $sql = $sql . $join;

	//拼接上条件语句
	$sql = $sql . $where;

	//如果有传入排序语句就拼接排序语句
	if($order) $sql = $sql . " order by " . $order;

	//如果有传入控制语句就拼接控制语句
	if($limit) $sql = $sql . " limit " . $limit;

	 //执行sql语句，返回值是true或false
	$r = $cn->query($sql);
	if($r) {
		$data = [];
		while( $res = $r->fetch_assoc() ){ // 获取关联数组
			$data[] = $res;
		}
		return $data;
	}
	return false;
}

/**
 * [counts 获取数据总条数]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:24:52+0800
 * @param    [type]                   $table [表名]
 * @param    string                   $id    [主键]
 * @return   [type]                          [数组]
 */
function counts($table, $id = 'id' ) {
	global $cn;
	global $dbpre;

	//函数返回匹配指定条件的行数
	$sql = "SELECT count('{$id}') as c FROM `{$dbpre}{$table}` limit 1";
	
	$r = $cn->query($sql);	//执行sql语句
	
	if($r) {  
		return  $r->fetch_assoc();
	}
	return false;
}

/**
 * [insert 插入数据]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:40:29+0800
 * @param    [type]                   $table [数据表]
 * @param    [type]                   $data  [数组]
 * @return   [type]                          [是否插入成功]
 */
function insert($table, $data){ 
	global $cn;
	global $dbpre;

	$name = array_keys($data);	//获得所有健名
	$value = array_values($data);	//获得所有值
	
	$name = implode(',', $name);	//转换成字符串

	//转换成字符串并且拼接引号
	$value = "'" . implode("','", $value) . "'";

	//根据健名去插入值
	$sql = "INSERT INTO {$dbpre}{$table} ({$name}) VALUES ({$value})";
	
	$r = $cn->query($sql);	//执行sql语句

	if($r) {
		return $cn->insert_id > 0;
	}
	return false;

}
/**
 * [update 更新数据]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T17:51:00+0800
 * @param    [type]                   $table [表名]
 * @param    [type]                   $data  [数组数据]
 * @param    string                   $where [条件]
 * @return   [type]                          [布尔值，成功为true]
 */
function update($table, $data, $where = ''){ 
	global $cn;
	global $dbpre;

	$field = '';
	foreach($data as $key => $value) {
		$field .= $key . "='" . $value . "',";
	}
	//清除右边多出的逗号
	$field = rtrim($field, ',');

	 //更新(更改){$dbpre}{$table}里面符合{$where}控制条件的列，更改成{$field} 
	$sql = "UPDATE {$dbpre}{$table} SET {$field} WHERE {$where}";
	
	$r = $cn->query($sql);

	return $r;
}
/**
 * [delete 删除数据]
 * @author JunJuaHuang
 * @DateTime 2018-12-30T18:19:25+0800
 * @param    [type]                   $table [数据表]
 * @param    string                   $where [条件语句]
 * @return   [type]                          [布尔值，删除成功与否]
 */
function delete($table, $where = ''){ 
	global $cn;
	global $dbpre;

	$sql = "DELETE FROM {$dbpre}{$table} WHERE {$where}";
	
	$r = $cn->query($sql);

	if($r ) {
		return $cn->affected_rows > 0;
	}

	return false;
}

