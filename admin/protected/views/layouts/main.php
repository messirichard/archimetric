<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language; ?>" />

	<meta name="keywords" content="hotel d'season, deseason hotel, hotel surabaya, accommodation surabaya, hotel tenggilis, hotel jemursari">
	<meta name="description" content="d'Season Hotel Surabaya, Surabaya 3 star Accommodation - jl. Tenggilis Utara 14">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="robots" content="index, follow">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/comon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/fonts.css" />
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<!-- css bootstrap -->
	<?php Yii::app()->bootstrap->register(); ?>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/lib/bootstrap/js/bootstrap.js" /> -->

	<!-- Jquery ui slider all -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/styles.css" />	
	<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
	    'target'=>'',
	    'config'=>array(),
	    )
	); ?>


	<?php  
		$baseUrl = Yii::app()->baseUrl; 
		$cs = Yii::app()->getClientScript();
		// bootstrap
		$cs->registerScriptFile($baseUrl.'/asset/lib/bootstrap-2.3/js/bootstrap.min.js');
		//register parallax
		$cs->registerScriptFile($baseUrl.'/asset/js/parallax/parallax.js');

		$cs->registerScriptFile('http://code.jquery.com/ui/1.10.4/jquery-ui.js');

		//register js isotop
		$cs->registerScriptFile($baseUrl.'/asset/js/isotope/jquery.isotope.min.js');
		//register all js
		$cs->registerScriptFile($baseUrl.'/asset/js/all.js');
		$cs->registerScriptFile($baseUrl.'/asset/js/css3-mediaqueries.js');
		$cs->registerScriptFile($baseUrl.'/asset/js/jquery.history.js');

		$cs->registerScriptFile($baseUrl.'/asset/js/jqzoom/js/jquery.jqzoom-core.js');

		// register js nivo slider

	?>

	<!-- bxslider -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/js/bx-slider/jquery.bxslider.css" type="text/css" />
	<script src="<?php echo Yii::app()->baseUrl; ?>/asset/js/bx-slider/jquery.bxslider.js"></script>

	<!-- font awesome -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/font-awesome/css/font-awesome.css">
	
	<!-- Scrollto -->
	<script src="<?php echo Yii::app()->baseUrl; ?>/asset/js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript"></script>
	
</head>
<body>
<?php echo $content ?>
</body>
</html>
