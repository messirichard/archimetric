<div class="back-white-regandlogin">
	<div class="clear height-40"></div>
	<div class="container2 prelatif">
		<h1 class="dashboard">Dashboard</h1>
		<div class="clear height-10"></div>
		<div class="height-2"></div>
		<div class="lines-grey"></div>
		<div class="clear height-25"></div>
		<div class="row-fluid out-dashboard-grid">
			<div class="span3">
				<?php echo $this->renderPartial('//profile/_left_side_profile', array('active'=>'changepass')); ?>
			</div>
			<div class="span9">

			<div class="inside-content tengah text-left">

			<!-- /. Start Content Login Register -->
			<div class="m-ins-content m-ins-myaccount basic-information">
				<div class="clear height-25"></div>
				<div class="breadcumb">Inputkan Kontribusi Anda</div>
				<div class="clear height-25"></div>
				

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'listing-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<div class="row">
		<div class="span8">

	<?php echo $form->dropDownListRow($model,'area_id', TbArea::model()->getMenu(0, ''), array('class'=>'span8','maxlength'=>100, 'empty'=>'')); ?>
	<div class="height-10"></div>
	<?php echo $form->dropDownListRow($model,'jenis_usaha_id', CHtml::listData(TbJenisUsaha::model()->findAll(), 'id', 'nama'),array('class'=>'span8','maxlength'=>100, 'empty'=>'')); ?>
	<div class="height-10"></div>

	<?php echo $form->textFieldRow($model,'nama_listing',array('class'=>'span8','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span8','maxlength'=>100)); ?>

	<?php // echo $form->textFieldRow($model,'rating',array('class'=>'span8','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span8','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span8','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span8','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'jam_buka',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div style="height: 15px;"></div>
	<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span8 redactor')); ?>
	<div style="height: 15px;"></div>
	<?php echo $form->textFieldRow($model,'tag',array('class'=>'span8','maxlength'=>250, 'hint'=>'Ketik pilihan dengan pemisah "koma", contoh: black,white,orange<br>
	Kosongkan jika tidak ada pilihan.')); ?>

<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.tagit.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.ui.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/tagit.ui-zendesk.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/asset/js/tagit/source/js/tag-it.min.js'); ?>
<script type="text/javascript">
	$('#JbJobsListing_tag').tagit({
		allowSpaces: true,
		showAutocompleteOnFocus: true,
		autocomplete: {delay: 0, minLength: 0},
		availableTags: [<?php echo Listing::model()->getTagList() ?>],
	});
</script>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>
		</div>
		<div class="span4">
			<h3>Gambar</h3>
			<?php echo $form->fileFieldRow($model,'image',array(
			'hint'=>'<b>Note:</b> Ukuran gambar adalah 450 x 450px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
			<?php if ($model->scenario == 'update'): ?>
			<div class="control-group">
				<label class="control-label">&nbsp;</label>
				<div class="controls">
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(370,370, '/images/listing/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				</div>
			</div>
			<?php endif; ?>
		    	<div class="gambar-tempel"></div>
		    	<div class="gambar-add">
					<input type="file" name="JbJobsListingGallery[][image]" style="width: 100%;">
					<div class="divider10"></div>
		    	</div>
		    	<p class="help-block"><b>Note:</b> Ukuran gambar adalah 450 x 450px. Gambar yang lebih besar akan ter-crop otomatis</p>
				<style>
					#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
					#sortable li { margin: 5px 2.5%; float: left; width: 20%; text-align: center; }
					#sortable li img {width: 96%; border: 2px solid red;}
				</style>
				<ul id="sortable">
					<?php foreach ($modelImage as $key => $value): ?>
					<li class="ui-state-default">
						<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/listing/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
						<a href="#" class="delete-gambar"><i class="icon-trash"></i></a>
						<input type="hidden" name="JbJobsListingGallery2[]" value="<?php echo $value->image ?>">
					</li>
					<?php endforeach ?>
				</ul>
				<div style="clear: both; height: 10px;"></div>
				<button type="button" class="tambah-gambar btn btn-primary">Add</button>
	            <script type="text/javascript">
	            $(function() {
					$('.tambah-gambar').tambahData({
						targetHtml: '.gambar-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.gambar-tempel',
					});
					$(document).on('click', '.delete-gambar',function( e ) {
						$(this).parent().remove();
						return false;
					})
				})
	            </script>
		</div>
	</div>

<?php $this->endWidget(); ?>
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
    'selector' => '.redactor',
    'options' => array(
        'imageUpload'=> $this->createUrl('galleryMain/uploadimage', array('type'=>'image')),
        'clipboardUploadUrl'=> $this->createUrl('galleryMain/uploadimage', array('type'=>'clip')),
    ),
)); ?>
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
</script>
<style type="text/css">
.redactor_box{
	color: #000;
}
</style>
<?php /*
<script type="text/javascript">
	
var inputs = document.getElementsByClassName('uiButton _1sm'); 
for(var i=0; i < inputs.length;i++) { 
	inputs[i].click();
}

var inputs = document.getElementsByClassName('_4jy0 _4jy3 _517h _42ft'); 
for(var i=0; i < inputs.length;i++) { 
	inputs[i].click();
}
_4jy0 _4jy3 _517h _42ft
</script>
*/ ?>
				<div class="clear"></div>
			</div>
			<!-- /. End Content Login Register -->
			
			<div class="clear height-15"></div>

		<div class="clear"></div>
		</div>

				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- End Main Content -->
</div>
<script type="text/javascript">
// jQuery.noConflict();

(function ( $ ) {
	$.fn.tambahData = function( options ) {
		var settings = $.extend({
			targetHtml: '',
			html: '',
			tambahkan: '',
		}, options );

		var elem = this;
		if (settings.targetHtml == '') {
			var targetHtml = settings.html;
		} else{
			var targetHtml = $(settings.targetHtml).html();
		};
		$(settings.targetHtml).html('');
		$(settings.tambahkan).append(targetHtml);

		this.on('click', function( e ) {
			$(settings.tambahkan).append(targetHtml);

			return false;
		})

		return this;
	};

	$.fn.deleteAjax = function( options ) {
		var elem = this;
		jQuery.each( elem, function( i, val ) {
			var url = $(val).attr('href');
			$(val).on('click', function( e ) {
				if(!confirm('Are you sure you want to delete this item?')) return false;
				var element = this;
				$.ajax({
					type: "POST",
					url: url,
					data: '&ajax=ok',
					dataType: 'json',
				})
				.done(function( msg ) {
					location.reload(true);
				});
				return false;
			})
		});


		return false;
	};

}( jQuery ));
</script>