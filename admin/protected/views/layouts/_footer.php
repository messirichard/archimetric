<section id="terhubung" class="section parallax">
			<div class="prelatif container">
				<div class="ins-terhubung">
					<div class="clear height-50"></div>
					<div class="clear height-50"></div>

					<div class="t-telusur-kota"><div class="line-side-tlsr-kota left margin-top-15"></div><div class="middle left white">TERHUBUNG DENGAN ON SURABAYA</div><div class="line-side-tlsr-kota right margin-top-15"></div></div>
					<div class="clear height-50"></div>
					<div class="clear height-5"></div>
					<div class="gd-net-icon tengah tcenter">
						<a href="http://facebook.com" target="_blank"><i class="icon-facebook"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://twitter.com" target="_blank"><i class="icon-twitter"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://plus.google.com" target="_blank"><i class="icon-googleplus"></i></a>
					</div>
					<div class="clear height-50"></div>
					<div class="clear height-10"></div>
					<div class="db-email tengah tcenter"><a href="mailto:info@onSurabaya.com">info@OnSurabaya.com</a></div>
					<div class="clear height-5"></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</section>
		<div class="clear"></div>

		<section id="footer" class="section parallax">
			<div class="pralatif container">
				<div class="ins-footer">
					
					<div class="clear height-30"></div>
					<div class="clear height-2"></div>

					<div class="row">

						<div class="span6 left w704">
							<div class="menu-left-footer-top">
								<a href="<?php echo CHtml::normalizeUrl(array('static/about')); ?>">Tentang Kami </a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo CHtml::normalizeUrl(array('static/iklan')); ?>">Beriklan di On Surabaya</a>
							</div>
							<div class="clear height-50"></div>
							<div class="box-bottom-left-footer">
								<span class="white">Telah tergabung bersama portal direktori OnSurabaya:</span>
								<div class="clear"></div>
								<p>
<?php
$jenis = TbJenisUsaha::model()->findAll();
?>
<?php foreach ($jenis as $key => $value): ?>
<?php
$jml = Listing::model()->count('jenis_usaha_id = :jenis_usaha_id AND status = 1', array(':jenis_usaha_id'=>$value->id))
?>
	<?php echo number_format($jml, 0); ?> <?php echo $value->nama ?>,
<?php endforeach ?>
								dan masih banyak lagi.</p>
							</div>
						</div>
						<div class="span4 right w468 t-right">
							<div class="t-top-footer-right t-right">&copy; 2014 OnSurabaya.com - Portal Direktori kota Surabaya.</div>
							<div class="clear height-50"></div>
							<div class="clear height-20"></div>
							<div class="logo-footer"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-footer.png" alt=""></div>
							<div class="cpright">OnSurabaya.com - All rights reserved.</div>
						</div>

					</div>

				</div>
			</div>
			<div class="clear"></div>
		</section>