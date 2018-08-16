<?php
$sub_aream = TbArea::model()->getMenu_subfront();

$jenis = TbJenisUsaha::model()->findAll();

?>
<!-- Start main -->
<header class="head">
	<div class="prelatif container2">
		<div class="left logo2-head">
			<a href="<?php echo CHtml::normalizeUrl(array('/main/index')); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/on_surabaya.jpg" alt=""></a>
		</div>

		<div class="left box-sch-toph">
			<div class="clear height-5"></div>
			<div class="clear height-2"></div>
		    <form class="form-search" id="search-homepage" action="<?php echo CHtml::normalizeUrl(array('/listing/index')); ?>" method="get">
			    <?php if ($sub_aream): ?>
			    <select class="input-medium" name="area" id="select_area" style="width: 150px;">
			    	<option value="">Semua Area</option>
			    	<?php foreach ($sub_aream as $ky => $v_subr): ?>
			    	<option value="<?php echo $ky ?>"><?php echo $v_subr; ?></option>
			    	<?php endforeach; ?>
			    </select>
			    <?php endif ?>
			    <?php if ($jenis): ?>
			    <select class="input-medium" name="jenis" id="jenis_usaha" style="width: 150px;">
			    	<option value="">Semua Jenis Usaha</option>
			    	<?php foreach ($jenis as $key => $v_jenis): ?>
						<option value="<?php echo $v_jenis->id; ?>"><?php echo $v_jenis->nama ?></option>
			    	<?php endforeach ?>
			    </select>
			    <?php endif ?>
			    <input type="text" class="input-medium chcari" name="q" onkeyup="lookup()" onfocus="lookup()" style="width: 150px;" placeholder="Keyword" id="cari" autocomplete="off" />
				<!-- suggestions input -->
				<div id="suggestions" class="suggest2 w380" style="display: none;">
				</div>
				<!-- End suggestions input -->

			    <script type="text/javascript">
			    	$('#search_header').val('<?php echo $_GET['area'] ?>');
			    </script>
			    <button type="submit" class="btn bt-green"><i class="icon-search-h-child"></i>&nbsp;Cari</button>
			</form>
<script type="text/javascript">
$(document).bind('click', function(e) {
 	var target = $( e.target );
 	if ( target.closest('#suggestions').length < 1 ) {
	 	$('#suggestions').fadeOut(10);
        return;
    }
});
var xhr = null;
function lookup(inputString) {
	if($('#cari').val().length == 0) {
		$('#suggestions').fadeOut(10); // Hide the suggestions box
	} else {
		if (xhr != null) {xhr.abort();};
   		$('#suggestions').html('<div class="loadingajax">'+
   			'<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/loading.gif" alt="">'+
   		'</div>');
		xhr = $.post("<?php echo CHtml::normalizeUrl(array('/main/sugest')); ?>", $('#search-homepage').serialize(), function(data) { // Do an AJAX call
			console.log(data);
			$('#suggestions').fadeIn(10); // Show the suggestions box
			$('#suggestions').html(data); // Fill the suggestions box
		});
	}
}
</script>

		</div>

		<div class="left bc-daftarkantemptusaha margin-left-20">
			<div class="clear height-10"></div>
			<div class="clear height-3"></div>
			<i class="icon-d-direction"></i><a href="<?php echo CHtml::normalizeUrl(array('/profile/registerbusiness')); ?>">Daftarkan Tempat Usaha Anda</a>
		</div>

		<div class="right bc-login-nregister-ins">
			<div class="txt">
				<?php if (MeMember::model()->isGuest()): ?>
				<a href="<?php echo CHtml::normalizeUrl(array('/profile/login')); ?>">Login</a>
				&nbsp; | &nbsp;
				<a href="<?php echo CHtml::normalizeUrl(array('/profile/login')); ?>">Daftar</a>
				<?php else: ?>
				<a href="<?php echo CHtml::normalizeUrl(array('/profile/index')); ?>">Akunku</a>
				&nbsp; | &nbsp;
				<a href="<?php echo CHtml::normalizeUrl(array('/profile/logout')); ?>">Logout</a>
				<?php endif ?>
			</div>
		</div>

		<div class="clear"></div>
	</div>
</header>