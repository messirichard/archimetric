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
		        <h4 class="widgettitle">Data Katalog</h4>
		    </div>
		    <div class="widgetcontent">
	
				<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12','maxlength'=>100)); ?>
				<?php if ($model->scenario == 'update'): ?>
				<a href="<?php echo Yii::app()->baseUrl ?>/images/katalog/<?php echo $model->pdf ?>">Lihat File PDF</a> hapus, jika ingin mengganti
				<?php else: ?>
				<?php echo $form->fileFieldRow($model,'pdf',array(
				'hint'=>'<b>Note:</b> Ukuran file jangan melebihi 5MB, untuk kenyamanan pengungjung website, dan masukkan hanya file PDF', 'style'=>"width: 100%")); ?>
				<?php endif; ?>

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
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(400,400, '/images/katalog/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php else: ?>
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Ukuran gambar adalah 246 x 246px. Gambar yang lebih besar akan ter-crop otomatis', 'style'=>"width: 100%")); ?>
				<?php endif; ?>
		    </div>
		</div>
		
	</div>
</div>


<?php $this->endWidget(); ?>
