<?php

class ListingController extends Controller
{

	public function actionIndex()
	{
		// check area / sub area
		$listingModel = new Listing;
		$listingModel->isiJenisDanArea();

		$breadcrump = array();
		$breadcrump[] = array(
			'label'=>'Home',
			'url'=>CHtml::normalizeUrl(array('/')),
		);

		$cekArea = $listingModel->cekArea($_GET['area']);
		if ($cekArea) {
			$cekArea = 'area';

			$breadcrump[] = array(
				'label'=>$listingModel->area_data[$_GET['area']],
				'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$_GET['area'])),
			);
		}else{
			$cekArea = 'subarea';

			if ($_GET['area'] != '') {
				$parentAreaId = $listingModel->getParentAreaId($_GET['area']);
				$breadcrump[] = array(
					'label'=>$listingModel->area_data[$parentAreaId],
					'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$parentAreaId)),
				);
				$breadcrump[] = array(
					'label'=>$listingModel->area_data[$_GET['area']],
					'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$_GET['area'])),
				);
			}
		}
		if ($_GET['jenis'] != '') {
			$breadcrump[] = array(
				'label'=>$listingModel->jenis_data[$_GET['jenis']],
				'url'=>CHtml::normalizeUrl(array('/listing/index', 'jenis'=>$_GET['jenis'])),
			);
		}
		if ($_GET['tag'] != '') {
			$breadcrump[] = array(
				'label'=>$_GET['tag'],
				'url'=>CHtml::normalizeUrl(array('/listing/index', 'tag'=>$_GET['tag'])),
			);
		}

		$model = new SearchForm;

		$data = $listingModel->getData();

		$tag = $listingModel->getTag();

		// create link
		$this->render('index',array(
			'model'=>$model,
			'data'=>$data,
			'cekArea'=>$cekArea,
			'tag'=>$tag,
			'listingModel'=>$listingModel,
			'breadcrump'=>$breadcrump,
		));
	}
	
	// public function actionCariarea()
	// {
	// 	$model = new SearchForm;

	// 	$sub_kota = $_GET['area'];
	// 	$cari = $_GET['cari'];
	// 	$jenis = $_GET['jenis'];

	// 	if ($sub_kota != "All") {
	// 		$this->redirect(array('/listing/index', 'cari'=>$cari, 'area'=>$sub_kota));
	// 	}

	// 	$link = array(
	// 		'/listing/index',
	// 		'cari'=>$cari,
	// 	);

	// 	$data = Listing::model()->getAreaSurabaya($cari, $jenis);

	// 	if ($cari != '') {
	// 		$link['cari']=$cari;
	// 	}
	// 	if ($jenis != '') {
	// 		$cari = ListingJenis::model()->getJenisBySlug($_GET['jenis']);
	// 		$link['jenis']=$jenis;
	// 	}

	// 	$this->render('cariarea',array(
	// 		'model'=>$model,
	// 		'cari'=>$cari,
	// 		'data'=>$data,
	// 		'link'=>$link,
	// 	));
	// }

	public function actionDetail($id)
	{
		$model = new SearchForm;

		$data = Listing::model()->findByPk($id);
		$data->views = $data->views + 1;
		$data->save();
		$data->isiJenisDanArea();

		if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');

		if ($_POST['type'] == 'gallery') {
			$_FILES['file']['type'] = strtolower($_FILES['file']['type']);

			$dir = Yii::getPathOfAlias('webroot').'/images/listing/';

			// cek file type
			if (
			   $_FILES['file']['type'] == 'image/jpg'
			|| $_FILES['file']['type'] == 'image/jpeg'
			|| $_FILES['file']['type'] == 'image/pjpeg')
			{
			    // setting file's mysterious name
			    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$_FILES['file']['name'];

			    // copying
			    move_uploaded_file($_FILES['file']['tmp_name'], $dir.$file);

			    $modelGallery = new ListingGallery;
			    $modelGallery->listing_id = $data->id;
			    $modelGallery->image = $file;
			    $modelGallery->user_id = Member::model()->getId();
			    $modelGallery->status = 0;
			    $modelGallery->save();

				Yii::app()->user->setFlash('success','Trimakasih sudah menambahkan foto, kami akan memfilter foto anda dan menampilkannya jika layak untuk di tampilkan');
			    $this->refresh();		    
			}
		}

		if ($_POST['type'] == 'ulasan') {
		    $modelUlasan = new ListingUlasan;
		    $modelUlasan->listing_id = $data->id;
		    $modelUlasan->user_id = Member::model()->getId();
		    $modelUlasan->ulasan = $_POST['ulasan'];
		    $modelUlasan->rating = $_POST['rating'];
		    $modelUlasan->date_input = date('Y-m-d H:i:s');
		    $modelUlasan->status = 0;
			if($modelUlasan->validate()){
			    $modelUlasan->save();
			    $this->refresh();
			}
		}

	    $modelArsip = new ListingArsip;
		if ($_POST['type'] == 'arsip') {
		    $modelArsip->listing_id = $data->id;
		    $modelArsip->user_id = Member::model()->getId();
		    $modelArsip->title = $_POST['ListingArsip']['title'];
		    $modelArsip->date_input = date('Y-m-d H:i:s');
		    $modelArsip->status = 0;
			if($modelArsip->validate()){
			$_FILES['arsip']['type'] = strtolower($_FILES['arsip']['type']);

				$dir = Yii::getPathOfAlias('webroot').'/images/listing_arsip/';

				// cek file type
				if (
				   $_FILES['arsip']['type'] == 'application/pdf'
				|| $_FILES['arsip']['type'] == 'application/x-download')
				{
				    // setting file's mysterious name
				    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$_FILES['arsip']['name'];

				    // copying
				    move_uploaded_file($_FILES['arsip']['tmp_name'], $dir.$file);

				    $modelArsip->arsip = $file;

				    $modelArsip->save();

					Yii::app()->user->setFlash('success','Trimakasih sudah menambahkan arsip, kami akan memfilter arsip anda dan menampilkannya jika layak untuk di tampilkan');
				    $this->refresh();		    
				}else{
					$modelArsip->addError('arsip','File harus berextensi PDF.');
				}
			}
		}

		$gallery = ListingGallery::model()->findAll('listing_id = :listing_id AND status = 1', array(':listing_id'=>$data->id));

		$arsip = ListingArsip::model()->findAll('listing_id = :listing_id AND status = 1', array(':listing_id'=>$data->id));

		$ulasan = ListingUlasan::model()->findAll('listing_id = :listing_id AND status = 1', array(':listing_id'=>$data->id));

		$keyword = ListingTag::model()->findAll('listing_id = :listing_id', array(':listing_id'=>$data->id));

		$right_listing = Listing::model()->findAll(array(
			'limit'=>5,
			'order'=>'input_date desc',
		));

		$breadcrump = array();
		$breadcrump[] = array(
			'label'=>'Home',
			'url'=>CHtml::normalizeUrl(array('/')),
		);

		$cekArea = $data->cekArea($data->area_id);
		if ($cekArea) {
			$cekArea = 'area';

			$breadcrump[] = array(
				'label'=>$data->area_data[$data->area_id],
				'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$data->area_id)),
			);
		}else{
			$cekArea = 'subarea';

			if ($data->area_id != '') {
				$parentAreaId = $data->getParentAreaId($data->area_id);
				$breadcrump[] = array(
					'label'=>$data->area_data[$parentAreaId],
					'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$parentAreaId)),
				);
				$breadcrump[] = array(
					'label'=>$data->area_data[$data->area_id],
					'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$data->area_id)),
				);
			}
		}
		if ($data->jenis_usaha_id != '') {
			$breadcrump[] = array(
				'label'=>$data->jenis_data[$data->jenis_usaha_id],
				'url'=>CHtml::normalizeUrl(array('/listing/index', 'area'=>$data->area_id, 'jenis'=>$data->jenis_usaha_id)),
			);
		}
		$breadcrump[] = array(
			'label'=>$data->nama_listing,
			'url'=>CHtml::normalizeUrl(array('/listing/index', 'id'=>$data->id)),
		);

		$this->render('detail',array(
			'data'=>$data,
			'breadcrump'=>$breadcrump,
			'gallery'=>$gallery,
			'arsip'=>$arsip,
			'ulasan'=>$ulasan,
			'keyword'=>$keyword,
			'right_listing'=>$right_listing,
			'modelArsip'=>$modelArsip,
		));
	}

}