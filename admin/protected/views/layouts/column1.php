<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="main-wrapper">
	<div class="wrapper prelatif">
		
		<?php echo $content; ?>
				
		<?php $this->renderPartial('//layouts/_footer') ?>
		
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<?php $this->endContent(); ?>