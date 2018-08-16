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
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/styles.css" />


	<?php Yii::app()->bootstrap->registerCoreCss(); ?>
	<?php Yii::app()->bootstrap->registerYiiCss(); ?>
	<?php Yii::app()->bootstrap->registerCoreScripts(); ?>
</head>
<body>
<div class="wfull header">
	<div class="container">
		<div class="logo-top">
			<a href="<?php echo CHtml::normalizeUrl(array('/site/index', 'lang'=>Yii::app()->language)); ?>">
				<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-dsessionhotel.png" alt="">
			</a>
		</div>
		<div class="btn-member-login">
			<a href="<?php echo CHtml::normalizeUrl(array('/member/login')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/btn-member-login.png" alt=""></a>
		</div>
		<div class="header-right">
			<div class="language-chose">
				<?php
				$urlSekarang = $_GET; 
				$urlSekarang['lang']='en';
				?>
				<?php echo CHtml::link('English',$this->createUrl($this->route,$urlSekarang), array('class'=>(Yii::app()->language == 'en')?'active':'')); ?>  |
				<?php $urlSekarang['lang']='id'; ?>
				<?php echo CHtml::link('Indonesia',$this->createUrl($this->route,$urlSekarang), array('class'=>(Yii::app()->language == 'id')?'active':'')); ?> <!--|
				<?php $urlSekarang['lang']='ja'; ?>
				<?php echo CHtml::link('中国',$this->createUrl($this->route,$urlSekarang), array('class'=>(Yii::app()->language == 'ja')?'active':'')); ?> |
				<?php $urlSekarang['lang']='zn_ch'; ?>
				<?php echo CHtml::link('日本語',$this->createUrl($this->route,$urlSekarang), array('class'=>(Yii::app()->language == 'zn_ch')?'active':'')); ?> -->
			</div>
			<div class="contact-top">
				<?php echo Yii::t('main', 'Book your stay now:') ?>  <i class="icon-phone"></i> <span class="icon-aja">(+62 31)</span> <?php echo($this->setting['phone']['value_'.Yii::app()->language]) ?>
			</div>
			<div class="clear"></div>
			<div class="garis-1"></div>
			<div class="top-menu">
				<?php $this->widget('zii.widgets.CMenu', array(
				    'items'=>array(
				        array('label'=>Yii::t('main', 'Home'), 'url'=>array('site/index', 'lang'=>Yii::app()->language)),
				        array('label'=>Yii::t('main', 'About Us'), 'url'=>array('about/index', 'lang'=>Yii::app()->language)),
				        array('label'=>Yii::t('main', 'Room & Rates'), 'url'=>array('rates/index', 'lang'=>Yii::app()->language)),
				        array('label'=>Yii::t('main', 'Facilities'), 'url'=>array('facilities/index', 'lang'=>Yii::app()->language, 'lang'=>Yii::app()->language)),
				        array('label'=>Yii::t('main', 'Promotions'), 'url'=>array('promotion/index', 'lang'=>Yii::app()->language)),
				        array('label'=>Yii::t('main', 'Our Locations'), 'url'=>array('location/index', 'lang'=>Yii::app()->language)),
				        array('label'=>Yii::t('main', 'Contact Us'), 'url'=>array('contact/index', 'lang'=>Yii::app()->language)),
				    ),
				)); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div class="height-15"></div>
		<div class="container-fcs member">
			<div class="shadow-fcs-r"></div>
			<div class="shadow-fcs-l"></div>
			<div class="fcs-box theme-default">
				<?php echo $content ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="container footer">
	<div class="height-10"></div>
	<?php if ($this->contactFooterShow == true): ?>
	<div class="contact-footer">
		<div class="contact-phone"><?php echo Yii::t('main', 'Phone.') ?> <span>(+62 31)</span> <b><?php echo($this->setting['phone']['value_'.Yii::app()->language]) ?></b></div>
		<p><?php echo($this->setting['address1']['value_'.Yii::app()->language]) ?></p>
	    <dl class="dl-horizontal">
		    <dt><?php echo Yii::t('main','Fax.') ?></dt>
		    <dd>: <?php echo($this->setting['fax']['value_'.Yii::app()->language]) ?></dd>
		    <dt><?php echo Yii::t('main', 'Email') ?></dt>
		    <dd>: <a href="mailto:<?php echo($this->setting['email']['value_'.Yii::app()->language]) ?>"><?php echo($this->setting['email']['value_'.Yii::app()->language]) ?></a></dd>
	    </dl>
	</div>
	<?php endif ?>
	<div class="connect-footer">
		<p><?php echo Yii::t('main', 'Connect with us:') ?></p>
		<p>
			<?php if ($this->setting['facebook']['value_en']): ?>
			<a href="<?php echo $this->setting['facebook']['value_en']; ?>" target="_blank"><i class="icon-facebook"></i></a>
			<?php endif ?>
			<?php if ($this->setting['twitter']['value_en']): ?>
			<a href="<?php echo $this->setting['twitter']['value_en']; ?>" target="_blank"><i class="icon-twitter"></i></a>
			<?php endif ?>
			<?php if ($this->setting['google_plus']['value_en']): ?>
			<a href="<?php echo $this->setting['google_plus']['value_en']; ?>" target="_blank"><i class="icon-gplus"></i></a>
			<?php endif ?>
		</p>
	</div>
	<div class="logo-footer">
		<a href="<?php echo CHtml::normalizeUrl(array('/site/index', 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-dsessionhotel-footer.png" alt=""></a><br>
Copyright © 2012 - d’Season Hotel Surabaya <br>
Website design by <a href="http://markdesign.net" target="_blank">Mark Design</a>.
	</div>
	<div class="clear"></div>
	<div class="height-20"></div>
</div>
</body>
</html>
