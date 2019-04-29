<?php
    header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
include_once 'config/config.php';
	// 获取传递过来的权限
	$level = isset($_GET['level']) ? $_GET['level'] : '';
	if($level != ''){
		// 查询分类表，查询权限小于或等于$level的并且其父类id为0
		$sql = 'SELECT * FROM m_albumclassfiy where acy_jurisdiction<=' . $level . ' and acy_parent=0';
		$acate = getSql($sql);
		// 定义空数组
		$arr = array();
		// 循环查询出来的分类，获取到id
		foreach($acate as $value){
			// 根据获取的分类id去查询所有子分类
			$s = 'SELECT acy_id FROM m_albumclassfiy where acy_parent='.$value[acy_id];
			$zi = getSql($s);
			// 定义相片的个数
			$number = 0;
			// 判断是否有子分类
			if($zi){
				// 先查询父分类下面的照片
				$fu1 = getSql('SELECT count(*) as Allnum FROM m_abl_classfiy WHERE acy_id='.$value[acy_id]);
				// 存储数量
				$number += intval($fu1[0]['Allnum']);
				// 循环得到的子分类数组，获取每一个子分类id
				foreach($zi as $v){
					//	根据得到的子分类id去获取此分类下面的照片数量 
					$znum = getSql('SELECT count(*) as Allnum FROM m_abl_classfiy WHERE acy_id='.$v[acy_id]);
					// 存储数量
					$number += intval($znum[0]['Allnum']);
					// 查询此子分类下面的分类
					$zz = getSql('SELECT acy_id FROM m_albumclassfiy WHERE acy_parent='.$v[acy_id]);
					// 判断是否还有分类
					if($zz){
						// 循环获取子分类id
						foreach ($zz as $zv) {
							// 根据获取到的id查询数量
							$zzn = getSql('SELECT count(*) as Allnum from m_abl_classfiy WHERE acy_id='.$zv[acy_id]);
							// 存储数量
							$number += intval($zzn[0]['Allnum']);
						}	
					}
				}
				if($number != 'NUll'){
					// 将数量添加到数组
					array_push($arr, $number);
				}
			}else{
				// 没有子类就直接查询父类并且添加到数组
				$fu = getSql('SELECT count(*) as Allnum from m_abl_classfiy WHERE acy_id='.$value[acy_id]);
				array_push($arr,intval($fu[0][Allnum]));
			}
		}
		// 存储到一个数组里面方便放回数据
		for($x = 0; $x < count($acate); $x ++){
			$acate[$x]['number'] = $arr[$x];
		}
		// 返回数据
		echo echo_json(0,$acate);die;
	}
	
	
?>

<!-- 可修改的地方： 循环遍历子分类可以通过递归来实现，使得代码更加简洁 -->