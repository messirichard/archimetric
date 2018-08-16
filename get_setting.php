<?php 
// function get database

// mysql_connect($dbcon['host'],$dbcon['user'],$dbcon['pass']);
// mysql_select_db($dbcon['db']);

	function connectDb(){
		$dbcon = array(
	            'host'=>'localhost',
	            'user'=>'root',
	            'pass'=>'',
	            'db'=>'archimetric',
	    );
			
		$mysqli = mysqli_connect($dbcon['host'], $dbcon['user'], $dbcon['pass'], $dbcon['db']); 
		if (!$mysqli) {
		    die('Could not connect: ' . mysqli_connect_errno() . ' - ' . mysqli_connect_error());
		}

		return $mysqli;
	}

	function getSetting($lang)
	{

		$squery = mysqli_query(connectDb(), "select * from setting");
		$data = array();
		while ($result = mysqli_fetch_assoc($squery)) {
			// print_r($result); exit;
			if ($result['dual_language']=='y') {
				$v = getSettingModel($result['name'], $lang);
				$data[$result['name']]= ($v['value']);
			} else {
				$data[$result['name']]= ($result['value']);
			}		
		}
		return $data;
	}


	function getSettingModel($setting_name, $language_code)
	{
		$setting_id = mysqli_fetch_assoc(mysqli_query(connectDb(), "SELECT * FROM setting where name='$setting_name'"));
		$setting_id = $setting_id['id'];
		$language_id = mysqli_fetch_assoc(mysqli_query(connectDb(), "SELECT * FROM language where code='$language_code'"));
		$language_id = $language_id['id'];

		$model = mysqli_fetch_assoc(mysqli_query(connectDb(), "SELECT * FROM setting_description where setting_id='$setting_id' and language_id='$language_id'"));

		return $model;
	}

	function getViewSlide()
	{
		$squery_slide = mysqli_query(connectDb(), "select * from view_slide where language_id = '2' AND active = '1' ORDER BY `id` ASC");
		$data = array();
		while ($result_slide = mysqli_fetch_assoc($squery_slide)) {
			$data[] = $result_slide;
		}
		return $data;
	}

	function getViewService()
	{
		$squery_category = mysqli_query(connectDb(), "select * from view_service where language_id = '2' order by `id` ASC");
		$data = array();
		while ($result_gallery = mysqli_fetch_assoc($squery_category)) {
			$data[] = $result_gallery;
		}
		return $data;
	}

	function getViewLeader()
	{
		$squery_category = mysqli_query(connectDb(), "select * from view_leader where language_id = '2' order by `id` ASC");
		$data = array();
		while ($result_gallery = mysqli_fetch_assoc($squery_category)) {
			$data[] = $result_gallery;
		}
		return $data;
	}
	
	function getViewGallery()
	{
		$squery_category = mysqli_query(connectDb(), "select * from view_gallery where language_id = '2' order by `id` DESC");
		$data = array();
		$i = 0;
		while ($result_gallery = mysqli_fetch_assoc($squery_category)) {
			$sub_query = mysqli_query(connectDb(), "select * from gal_gallery_image where gallery_id = '".$result_gallery['id']."'");
			$sub_res = array();
			while ($res_sub = mysqli_fetch_assoc($sub_query)){
				$sub_res[] = $res_sub['image'];
			}
			$data[$i] = $result_gallery;
			$data[$i]['sub_image'] = $sub_res;
			$i++;
		}

		return $data;
	}

	function getGallery($id)
	{
		$squery_categoryf = mysqli_query(connectDb(), "select * from prd_category_product where category_id = '".$id."' order by `product_id` DESC");
		$arr_ids = array();
		while ($results_sn_id = mysqli_fetch_assoc($squery_categoryf)) {
			$arr_ids[] = $results_sn_id['product_id'];
		}
		if ( count($arr_ids) > 0 ) {
		
			$str_ids = implode(",", $arr_ids);
			$squery_category = mysqli_query(connectDb(), "select * from view_gallery where language_id = '2' AND `id` IN(".$str_ids.") order by `id` DESC");

			$data = array();
			while ($result_gallery = mysqli_fetch_assoc($squery_category)) {
				$data[] = $result_gallery;
			}
		} else {
			$data = array();
		}

		return $data;
	}

	function getAllcategory()
	{
		$squery_category = mysqli_query(connectDb(), "select * from view_category where language_id = '2' order by `id` ASC");
		$data = array();
		while ($result_gallery = mysqli_fetch_assoc($squery_category)) {
			$data[] = $result_gallery;
		}

		return $data;
	}

	function getCategory($id)
	{
		if ($id == '') {
			$squery_category = mysqli_query(connectDb(), "select * from view_category where language_id = '2' order by `id` ASC");
		}else{
			$squery_category = mysqli_query(connectDb(), "select * from view_category where language_id = '2' AND id = '".$id."' order by `sort` ASC");
		}
		return mysqli_fetch_assoc($squery_category);
	}

	/*
	function getViewCarapasangImage()
	{
		$squery_cara = mysqli_query(connectDb(), "select * from cara_image");
		$data = array();
		while ($result_cara = mysqli_fetch_assoc($squery_cara)) {
			$data[] = $result_cara;
		}
		return $data;
	}

	function getViewGalleryByid($id)
	{
		$data = mysqli_fetch_assoc(mysqli_query(connectDb(), "select * from view_gallery where id = '$id'"));
		return $data;
	}

	$view_galleryFu = getViewGallery();
	$view_caraimage = getViewCarapasangImage();
	*/

	$Gsetting = getSetting('en');

	// echo "<pre>";
	// print_r($Gsetting);
	// echo "</pre>";
	// exit;
	
	// $data_a_fcs = array(
 //            // 'fcs-1.jpg',
 //            "arch-slide-c0537b.jpg",
 //            "kakuu-slide-c072ed.jpg",
 //            "arch-slide-06045e.jpg",
 //            "arch-slide-81730d.jpg",
 //            "arch-slide-71397a.jpg",
 //            "arch-slide-50f600.jpg",
 //            "kakuu-slide-f54750.jpg",
 //            "kakuu-slide-d3c3d5.jpg",
 //            "arch-slide-729791.jpg",
 //            "kakuu-slide-1c47f7.jpg",
 //            "kakuu-slide-726e47.jpg",
 //            "kakuu-slide-795d95.jpg",
 //            "kakuu-slide-e0a03c.jpg",
 //            "kakuu-slide-78e29a.jpg",
 //            "arch-slide-b5593b.jpg",
 //        );
 
	$data_a_fcs = getViewSlide();

	$data_service = getViewService();

	$data_leader = getViewLeader();

	$data_gallery = getViewGallery();

	$data_lcategory = getAllcategory();
