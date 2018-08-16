<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<div class="row-fluid">
	<div class="span8">
		<!-- ----------------- Action ----------------- -->
		<div class="widgetbox block-rightcontent">
		    <div class="headtitle">
		        <h4 class="widgettitle">Data</h4>
		    </div>
		    <div class="widgetcontent">
				<?php if ( ! ($_GET['parent'] == '' OR $_GET['parent'] == '0')): ?>
				<?php echo $form->dropDownListRow($model,'parent_id',TbArea::model()->getMenu(0, ''),array('class'=>'span12')); ?>
				<?php endif ?>

				<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12','maxlength'=>100)); ?>

				<?php echo $form->textAreaRow($model,'deskripsi',array('class'=>'span5 redactor')) ?>
				<div style="height: 10px;"></div>
				
				<?php echo $form->textAreaRow($model,'alamat',array('class'=>'span12')) ?>
				
				<?php echo $form->textAreaRow($model,'jam_buka',array('class'=>'span12')) ?>

				<?php echo $form->textAreaRow($model,'map_location',array('class'=>'span12')) ?>

		    </div>
	    </div>
	</div>
	<div class="span4">
		<!-- ----------------- Action ----------------- -->
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Batal',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    </div>
		</div>

		<!-- ----------------- Status ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Status</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->dropDownListRow($model, 'status', array(
					'1'=>'Di Tampilkan',
					'0'=>'Di Sembunyikan',
				)); ?>

		    </div>
		</div>
		<!-- ----------------- Gambar Utama ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar Utama</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Ukuran gambar adalah 450 x 450px. Gambar yang lebih besar akan ter-crop otomatis', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(400,400, '/images/area/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>

		<!-- ----------------- Gambar Tambahan ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <div class="btn-group">
		            <a class="btn tambah-gambar" href="#"><span class="fa fa-plus-circle"></span> &nbsp;Tambah Gambar</a>
		        </div>
		        <h4 class="widgettitle">Gambar Tambahan</h4>
		    </div>
		    <div class="widgetcontent">
		    	<div class="gambar-tempel"></div>
		    	<div class="gambar-add">
					<input type="file" name="TbAreaImage[][image]" style="width: 100%;">
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
						<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/area/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
						<a href="#" class="delete-gambar"><i class="fa fa-trash-o"></i></a>
						<input type="hidden" name="TbAreaImage2[]" value="<?php echo $value->image ?>">
					</li>
					<?php endforeach ?>
				</ul>
	            <script type="text/javascript">
	            jQuery(function( $ ) {
					$('.tambah-gambar').tambahData({
						targetHtml: '.gambar-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.gambar-tempel',
					});
					$( "#sortable" ).sortable();
					$( "#sortable" ).disableSelection();
					$(document).on('click', '.delete-gambar',function( e ) {
						$(this).parent().remove();
						return false;
					})
				})
	            </script>
				<div class="divider5"></div>
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Drag atau geser gambar untuk mengurutkan
				</div>

		    </div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
    'selector' => '.redactor',
    'options' => array(
        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
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
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})
</script>
