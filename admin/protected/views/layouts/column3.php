<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="main-wrapper">
	<div class="wrapper">
		<?php echo $this->renderPartial('//layouts/_header'); ?>
		<div class="main-content">
			<div class="container tengah prelatife">
				<div class="inner-content">
					<div class="height-20"></div>
					<div class="clear height-0"></div>
					<?php echo $this->renderPartial('//layouts/_left_option_filter'); ?>
					
					<?php echo $content; ?>

					<?php echo $this->renderPartial('//layouts/_show_more_product', array()); ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
		<div class="clear height-0"></div>
	</div>
</div>
<?php $this->endContent(); ?>