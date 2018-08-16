<div class="block-left-side">
	<div class="clear height-25"></div>
	<ul class="left-side-pr">
		<li <?php echo ($active == 'overview')? 'class="active"': ''; ?>><a href="<?php echo CHtml::normalizeUrl(array('profile/index')); ?>">Overview <i class="fa fa-chevron-right"></i></a></li>
		<li <?php echo ($active == 'df_usaha')? 'class="active"': ''; ?>><a href="<?php echo CHtml::normalizeUrl(array('profile/daftarusaha')); ?>">Daftar Usaha <i class="fa fa-chevron-right"></i></a></li>
		<?php /*
		<li <?php echo ($active == 'kontribusi')? 'class="active"': ''; ?>><a href="<?php echo CHtml::normalizeUrl(array('profile/kontribusi')); ?>">Kontribusi <i class="fa fa-chevron-right"></i></a></li>
		*/ ?>
		<li <?php echo ($active == 'account_info')? 'class="active"': ''; ?>><a href="<?php echo CHtml::normalizeUrl(array('profile/accountinfo')); ?>">Account Info <i class="fa fa-chevron-right"></i></a></li>
		<li <?php echo ($active == 'changepass')? 'class="active"': ''; ?>><a href="<?php echo CHtml::normalizeUrl(array('profile/changepass')); ?>">Change Password <i class="fa fa-chevron-right"></i></a></li>
	</ul>
	<div class="clearfix"></div>
</div>