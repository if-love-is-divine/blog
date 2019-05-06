<?php
    header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
include_once 'config/config.php';
	$id = isset($_GET['id']) ? $_GET['id'] :'';
	$group = isset($_GET['group']) ? $_GET['group'] : '';
	$sql = 'SELECT * FROM m_abl_classfiy AS mac JOIN m_album AS ma on mac.a_id = ma.a_id WHERE mac.acy_id = '.$id;
	$name = getSql('SELECT acy_name FROM m_albumclassfiy WHERE acy_id=' .$id);
	$r = getSql($sql);

	$zi = getSql('SELECT acy_id FROM m_albumclassfiy WHERE acy_parent=' . $id);
	$arr = array();
	$data = array();
	if($zi){
		foreach ($zi as $value) {
			$zis = getSql('SELECT * FROM m_abl_classfiy AS mac JOIN m_album AS ma on mac.a_id = ma.a_id WHERE mac.acy_id = '.$value['acy_id']);
			foreach ($zis as $v) {
				if($r){	
					array_push($r, $v);

				}else{
					array_push($arr,$v);
				};

			}
			$zzs = getSql('SELECT acy_id FROM m_albumclassfiy WHERE acy_parent=' . $value['acy_id']);
			if($zzs){
				foreach ($zzs as $v) {
					$zzv = getSql('SELECT * FROM m_abl_classfiy AS mac JOIN m_album AS ma on mac.a_id = ma.a_id WHERE mac.acy_id = '.$v['acy_id']);
					foreach ($zzv as $va) {
						if($r){	
							array_push($r, $va);

						}else{
							array_push($arr,$va);
						};
					}
				}
			}
		}
	}
	if($r){
		foreach ($r as $key => $value) {
			if($key >= $group && $key <= $group + 25){
				array_push($data,$value);
			}
		}
	}else{
		foreach ($arr as $key => $value) {
			if($key >= $group && $key <= $group + 25){
				array_push($data,$value);
			}
		}
	}
	echo echo_json(0,$data,$name);die;
?>