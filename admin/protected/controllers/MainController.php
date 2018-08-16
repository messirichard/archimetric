<?php

class MainController extends Controller
{
	
	public function actionIndex()
	{	
	$this->redirect(array('/admin'));
	}

	// public function actionSearchlist($term)
 //    {
    
 //        if (isset($_GET["term"]))
 //        { 
 //            $res = array();

 //            $criteria=New CDbCriteria ; 
 //            $criteria->addSearchCondition('area', $term , true);
 //            $criteria->group = 'area';
 //            $list = Listing::model()->findAll($criteria);
            
 //            foreach($list as $listing)
 //            {
	//             $res[]= array(
	//             	'value'=>$listing->area, 
	// 				'id'=>intval($user->id) , 
	// 			);
                                                    
 //            }

 //            $criteria=New CDbCriteria ; 
 //            $criteria->addSearchCondition('nama_listing', $term , true);
 //            $list = Listing::model()->findAll($criteria);
            
 //            foreach($list as $listing)
 //            {
	//             $res[]= array(
	//             	'value'=>$listing->nama_listing, 
	// 				'id'=>intval($user->id) , 
	// 			);
                                                    
 //            }
            
             
 //            echo CJSON::encode( $res);
 //            Yii::app()->end();
 //        } 
            
            
 //    }

	public function actionError()
	{
		$this->layout = '//layouts/mainKosong';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->render('error', array('error'=>$error));
			}
		}
	}

	public function actionSugest()
	{

		if ($_POST['q'] != '') {
			$str = '<p id="searchresults">';
			// if ($_POST['area'] == 'All') { // pencarian semua area
	  //           $criteria=New CDbCriteria ; 
	  //           $criteria->addSearchCondition('nama_listing', $_POST['cari'] , true);
	  //           $criteria->order = 'area_id, nama_listing ASC';
	  //           $criteria->limit = 8;
	  //           $list = Listing::model()->findAll($criteria);
	            
   //          	$area = '';
   //          	$sub_area = '';
	  //           foreach($list as $listing)
	  //           {
	  //           	if ($listing->area != $sub_area AND $listing->sub_kota != $area) {
	  //           		$sub_area = $listing->area;
	  //           		$area = $listing->sub_kota;
			// 			$str .= '<span class="category">'.$area.' &gt; '.$sub_area.'</span>';
	  //           	}
	  //           	$contact = array();
	  //           	if ($listing->phone != '')
	  //           		$contact['phone'] = 'Phone: '.$listing->phone;
	  //           	if ($listing->email != '')
	  //           		$contact['email'] = 'Email: '.$listing->email;
	  //           	if ($listing->website != '')
	  //           		$contact['website'] = 'Website: '.$listing->website;
	            	
			// 		$str .= '<a href="'.CHtml::normalizeUrl(array('/listing/detail', 'slug'=>$listing->slug)).'">
			// 			<img src="'.Yii::app()->baseUrl.ImageHelper::thumb(49,49, '/images/listing/'.$listing->image , array('method' => 'adaptiveResize', 'quality' => '90')).'" alt="">
			// 			<span class="searchheading">'.$listing->nama_listing.'</span>
			// 			<span>
			// 				'.$listing->alamat.'<br>
			// 				'.implode(', ', $contact).'</span>
			// 		</a>';
			// 	}
			// }else{
	            $criteria=New CDbCriteria ; 
	            $params = $criteria->params;
	            $criteria->addCondition('(nama_listing LIKE :q OR deskripsi LIKE :q)');
	            $params[':q'] = '%'.$_POST['q'].'%';
	            if ($_POST['area'] != '') {
		            $criteria->addCondition('area_id = :area_id');
		            $params[':area_id'] = $_POST['area'];
	            }
	            if ($_POST['jenis'] != '') {
	            	$criteria->addCondition('jenis_usaha_id = :jenis_usaha_id');
		            $params[':jenis_usaha_id'] = $_POST['jenis'];
	            }

	            $criteria->order = 'input_date DESC';
	            $criteria->limit = 8;
	            $criteria->params = $params;
	            $list = Listing::model()->findAll($criteria);
	            
				$str .= '<span class="category">Cari: '.$_POST['q'].'</span>';
	            foreach($list as $listing)
	            {
	            	$contact = array();
	            	if ($listing->phone != '')
	            		$contact['phone'] = 'Phone: '.$listing->phone;
	            	if ($listing->email != '')
	            		$contact['email'] = 'Email: '.$listing->email;
	            	if ($listing->website != '')
	            		$contact['website'] = 'Website: '.$listing->website;
	            	
					$str .= '<a href="'.CHtml::normalizeUrl(array('/listing/detail', 'slug'=>$listing->slug, 'id'=>$listing->id)).'">
						<img src="'.Yii::app()->baseUrl.ImageHelper::thumb(49,49, '/images/listing/'.$listing->image , array('method' => 'adaptiveResize', 'quality' => '90')).'" alt="">
						<span class="searchheading">'.$listing->nama_listing.'</span>
						<span>
							'.$listing->alamat.'<br>
							'.implode(', ', $contact).'</span>
					</a>';
				}
			// }
			$str .= '<span class="seperator"><a href="#" title="Sitemap">Lihat hasil lainnya untuk '.$_POST['cari'].' &gt;</a></span>
			<br class="break">
			</p>
			';
			echo $str;
		}
	}


}