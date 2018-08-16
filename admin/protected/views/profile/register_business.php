<div class="back-white-regandlogin">
	<div class="clear height-40"></div>
	<div class="container2 prelatif">
			<!-- /. Start Content Login Register -->
			<div class="m-ins-content m-ins-myaccount">
				<div class="clear height-25"></div>
				<h1 class="dashboard">Dashboard</h1>
				<div class="clear height-10"></div>
				<div class="height-2"></div>
				<div class="lines-grey"></div>
				<div class="clear height-25"></div>
				
						<div class="row-fluid out-dashboard-grid">
				<div class="span3">
					<?php echo $this->renderPartial('//profile/_left_side_profile', array('active'=>'df_usaha')); ?>
				</div>
				<div class="span9">
					<div class="inside-content tengah text-left">
						<div class="breadcumb">Form Daftar Usaha Anda on OnSurabaya.com</div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
							'id'=>'account-form',
						    // 'type'=>'horizontal',
							'enableAjaxValidation'=>false,
							'clientOptions'=>array(
								'validateOnSubmit'=>false,
							),
							'htmlOptions' => array('enctype' => 'multipart/form-data'),
						)); ?>
						<div class="center box-infomation-account border-left-brown">
							<div class="register-information">
							<div class="clear height-30"></div>
									<?php echo $form->errorSummary($model); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<div class="row-fluid">
	<div class="span8">
		<div class="row-fluid">
			<div class="span6">
				<?php echo $form->dropDownListRow($model,'jenis_usaha_id', CHtml::listData(TbJenisUsaha::model()->findAll(), 'id', 'nama'),array('class'=>'span12','maxlength'=>100)); ?>
			</div>
			<div class="span6">
				<?php echo $form->dropDownListRow($model,'area_id', TbArea::model()->getMenu(0, ''),array('class'=>'span12','maxlength'=>100)); ?>
			</div>
		</div>


		<?php echo $form->textFieldRow($model,'nama_listing',array('class'=>'span12','maxlength'=>100)); ?>

		<div class="row-fluid">
			<div class="span4">
				<?php echo $form->textFieldRow($model,'phone',array('class'=>'span12','maxlength'=>100)); ?>
			</div>
			<div class="span4">
				<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>100)); ?>
			</div>
			<div class="span4">
				<?php echo $form->textFieldRow($model,'website',array('class'=>'span12','maxlength'=>100)); ?>
			</div>
		</div>

		<div class="row-fluid">
			<div class="span8">
				<?php echo $form->textAreaRow($model,'alamat',array('class'=>'span12', 'rows'=>4, 'cols'=>50)); ?>
			</div>
			<div class="span4">
				<?php echo $form->textAreaRow($model,'jam_buka',array('rows'=>4, 'cols'=>50, 'class'=>'span12')); ?>
			</div>
		</div>


		<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>4, 'cols'=>50, 'class'=>'span12 redactor')); ?>

		<?php echo $form->textFieldRow($model,'tag',array('class'=>'span12','maxlength'=>250, 'hint'=>'Ketik pilihan dengan pemisah "koma", contoh: black,white,orange<br>
		Kosongkan jika tidak ada pilihan.')); ?>
	</div>
	<div class="span4">
		<h6>Gambar Utama</h6>
		<?php echo $form->fileFieldRow($model, 'image'); ?>
		
		<div class="height-25"></div>
		<h6>SIUP</h6>
		<?php echo $form->fileFieldRow($model, 'siup'); ?>	

	</div>
</div>


<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.tagit.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.ui.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/tagit.ui-zendesk.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/asset/js/tagit/source/js/tag-it.min.js'); ?>
<script type="text/javascript">
	$('#Listing_tag').tagit({
		allowSpaces: true,
		showAutocompleteOnFocus: true,
		autocomplete: {delay: 0, minLength: 0},
		availableTags: [<?php echo Listing::model()->getTagList() ?>],
	});
	// $('#Listing_area').tagit({
	// 	allowSpaces: true,
	// 	showAutocompleteOnFocus: true,
	// 	autocomplete: {delay: 0, minLength: 0},
	// 	availableTags: [<?php //echo Listing::model()->getAreaList('Surabaya Pusat') ?>],
	// 	tagLimit: 1,
	// });
</script>

								    <!-- /. submit -->
								    <div class="control-group">
									    	<button type="submit" class="btn">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
									    	<button type="reset" class="btn">Cancel</button>
								    </div>
							 </div>

							 <div class="clear height-0"></div>

						</div>
						<?php $this->endWidget(); ?>
					<div class="clear"></div>
					</div>
				</div>

					<div class="clearfix"></div>
				</div>




				<div class="clear"></div>
			</div>
			<!-- /. End Content Login Register -->
			
			<div class="clear height-15"></div>

		<div class="clear"></div>
	</div>
	<!-- End Main Content -->
</div>
