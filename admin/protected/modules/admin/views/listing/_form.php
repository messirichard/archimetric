<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'listing-form',
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
		        <h4 class="widgettitle">Data Listing</h4>
		    </div>
		    <div class="widgetcontent">
		    	<div class="row-fluid">
		    		<div class="span6">
						<?php echo $form->dropDownListRow($model,'area_id', TbArea::model()->getMenu(0, ''), array('class'=>'span12')); ?>
		    		</div>
		    		<div class="span6">
						<?php echo $form->dropDownListRow($model,'jenis_usaha_id', CHtml::listData(TbJenisUsaha::model()->findAll(), 'id', 'nama'),array('class'=>'span12')); ?>
		    		</div>
		    	</div>
				<?php echo $form->textFieldRow($model,'nama_listing',array('class'=>'span12')); ?>
		    	<div class="row-fluid">
		    		<div class="span4">
						<?php echo $form->textFieldRow($model,'phone',array('class'=>'span12')); ?>
		    		</div>
		    		<div class="span4">
						<?php echo $form->textFieldRow($model,'email',array('class'=>'span12')); ?>
		    		</div>
		    		<div class="span4">
						<?php echo $form->textFieldRow($model,'website',array('class'=>'span12')); ?>
		    		</div>
		    	</div>
		    	<div class="row-fluid">
		    		<div class="span8">
						<?php echo $form->textAreaRow($model,'alamat',array('rows'=>6, 'cols'=>50, 'class'=>'span12')); ?>
		    		</div>
		    		<div class="span4">
						<?php echo $form->textAreaRow($model,'jam_buka',array('rows'=>6, 'cols'=>50, 'class'=>'span12')); ?>
		    		</div>
		    	</div>
				<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span5 redactor')); ?>
				<div style="height: 15px;"></div>
			</div>
		</div>

		<!-- ----------------- Arsip ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Arsip</h4>
		    </div>
		    <div class="widgetcontent">
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Upload file pdf, untuk menjelaskan lebih detail tentang listing yang ada
				</div>
				
                <h4 class="widgettitle">Detail</h4>
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>Judul Arsip</th>
                            <th>Arsip</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="voucher-tempel">
                    	<?php foreach ($modelArsip as $key => $value): ?>
                        <tr>
                            <td><input type="hidden" name="ListingArsip2[id][]" value="<?php echo $value->id ?>">
                            	<input type="text" name="ListingArsip2[title][]" value="<?php echo $value->title ?>" class="input-block-level"></td>
								<td>
									<div class="filter-container">
										<input type="hidden" name="ListingArsip2[arsip][]" value="<?php echo $value->arsip ?>">
										<span class="select-file-name"><?php echo $value->arsip ?></span>
									</div>
								</td>
                            <td><button type="button" class="btn btn-danger delete-voucher"><i class="fa fa-trash-o"></i> Delete</button></td>
                        </tr>
                    	<?php endforeach ?>
                    </tbody>
                    <tbody class="voucher-add">
                        <tr>
                            <td><input type="hidden" name="ListingArsip[id][]">
                            	<input type="text" name="ListingArsip[title][]" class="input-block-level"></td>
							<td>
								<div class="filter-container">
									<input type="file" class="select-file-change" name="ListingArsip[arsip][]">
									<span class="select-file-name"></span>
								</div>
							</td>
							<td><a href="#" class="btn btn-primary delete-data">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
				<div class="divider5"></div>
                <button type="button" class="btn btn-primary tambah-voucher">Tambah Arsip</button>
                <script type="text/javascript">
                jQuery(function( $ ) {
					$('.tambah-voucher').tambahData({
						targetHtml: '.table tbody.voucher-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.table tbody.voucher-tempel',
					});
					$(document).on('click', '.delete-voucher',function( e ) {
						$(this).parent().parent().remove();
						return false;
					})
				})

                </script>
		    </div>
		</div>

		<?php /*
		<!-- ----------------- Action ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Arsip</h4>
		    </div>
		    <div class="widgetcontent">
				<div class="grid-view">
					<table class="table">
						<tr>
							<th>Judul Arsip</th>
							<th>Arsip</th>
							<th>&nbsp;</th>
						</tr>
						<?php if ($model->scenario == 'update'): ?>
						<tbody class="option-edit-data">
							<?php foreach ($modelArsip as $key => $value): ?>
							<tr class="filters">
								<td>
									<div class="filter-container">
										<input type="hidden" name="arsip[id][]" value="<?php echo $value->id ?>">
										<input type="hidden" name="arsip[updt][]" value="1">
										<input type="text" name="arsip[title][]" value="<?php echo $value->title ?>">
									</div>
								</td>
								<td>
									<div class="filter-container">
										<a class="btn btn-primary select-file-gambar">Pilih Arsip ...</a>
										<input type="file" class="select-file-change" name="arsip[arsip][]" style="display: none;">
										<span class="select-file-name"><?php echo $value->arsip ?></span>
									</div>
								</td>
								<td><a href="#" class="btn btn-primary delete-data">Delete</a></td>
							</tr>
							<?php endforeach ?>
						</tbody>
						<?php endif ?>
						<tbody class="option-data">
							<tr class="filters">
								<td>
									<div class="filter-container">
										<input type="hidden" name="arsip[id][]" value="">
										<input type="hidden" name="arsip[updt][]" value="0">
										<input type="text" name="arsip[title][]">
									</div>
								</td>
								<td>
									<div class="filter-container">
										<a class="btn btn-primary select-file-gambar">Pilih Arsip ...</a>
										<input type="file" class="select-file-change" name="arsip[arsip][]" style="display: none;">
										<span class="select-file-name"></span>
									</div>
								</td>
								<td><a href="#" class="btn btn-primary delete-data">Delete</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<a href="#" class="btn btn-primary option-add">Tambah Arsip</a>
				<script type="text/javascript">
				$('.select-file-gambar').live('click',function(){
			        // Simulate a click on the file input button
			        // to show the file browser dialog
			        $(this).parent().find('input').click();
			        return false;
			    });
				$('.select-file-change').live('change',function(){
			        // Simulate a click on the file input button
			        // to show the file browser dialog
			        $(this).parent().find('.select-file-name').html($(this).val());
			        return false;
			    });
				</script>
				<script type="text/javascript">
					$(document).ready(function() {
						var optionHtml = $('.option-data').html();
						$('.delete-data').live('click', function() {
							$(this).parent().parent().remove();
							return false;
						})
						$('.option-add').live('click', function () {
							$('.option-data').append(optionHtml);
							return false;
						})
					})
				</script>
		    </div>
	    </div>
	    */ ?>
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
				<?php echo $form->textFieldRow($model,'tag',array('class'=>'span12','maxlength'=>250, 'hint'=>'Ketik pilihan dengan pemisah "koma", contoh: black,white,orange<br>
				Kosongkan jika tidak ada pilihan.')); ?>

				<?php if ($this->login_member['group_id'] == 8): ?>
				<?php echo $form->dropDownListRow($model, 'status', array(
					'1'=>'Di Tampilkan',
					'0'=>'Di Sembunyikan',
				)); ?>
				<?php endif ?>

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
				</script>
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
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(400,400, '/images/listing/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
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
					<input type="file" name="ListingGallery[][image]" style="width: 100%;">
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
						<a href="#" class="delete-gambar"><i class="fa fa-trash-o"></i></a>
						<input type="hidden" name="ListingGallery2[]" value="<?php echo $value->image ?>">
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