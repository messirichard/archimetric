<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'jenis-usaha-form',
	'enableAjaxValidation'=>false,
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
		        <h4 class="widgettitle">Data Promo</h4>
		    </div>
		    <div class="widgetcontent">
	
				<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12','maxlength'=>100)); ?>

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

		<!-- ----------------- Gambar Utama ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar Utama</h4>
		    </div>
		    <div class="widgetcontent">
				<?php if ($model->scenario == 'update'): ?>
				<p>Hapus jika ingin mengganti gambar</p>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1440,523, '/images/promo/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php else: ?>
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Ukuran gambar adalah 1440 x 523px. Gambar yang lebih besar akan ter-crop otomatis', 'style'=>"width: 100%")); ?>
				<?php endif; ?>
		    </div>
		</div>
		
	</div>
</div>


<?php $this->endWidget(); ?>
