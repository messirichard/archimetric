<div class="reservation-form">
	<div class="shadow-reservation-r"></div>
	<div class="shadow-reservation-l"></div>
	<div class="height-5"></div>
	<div class="margin-5">
		<div style="margin-left: 23px;">
			<h3 class="title"><?php echo Yii::t('main', 'Make Reservation') ?></h3>
		</div>
		<div class="garis-2"></div>
	</div>
	<div style="margin-left: 28px;">
		<?php $form = $this->beginWidget('CActiveForm', array(
			'action'=>array('/reservation/index', 'lang'=>Yii::app()->language),
		    'id'=>'reservation-form',
		    'enableAjaxValidation'=>false,
		    'enableClientValidation'=>false,
		    // 'focus'=>array($this->model,'from'),
		)); ?>
		<div class="height-5"></div>
		<div class="row-form-reservation">
			<?php echo $form->labelEx($this->model,'date_add'); ?>
			<div class="input-box-med">
				<div class="inner-box">
					<?php
					    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					    // 'name'=>'Reservation[date_add]',
					    'model'=>$this->model,
					    'attribute'=>'date_add',
					    // additional javascript options for the date picker plugin
					    'options'=>array(
					    	'showAnim'=>'fold',
					    	'showOn'=> "button",
							'buttonImage'=> Yii::app()->baseUrl."/asset/images/icon-calender.png",
							'buttonImageOnly'=> true,
					    ),
					    'htmlOptions'=>array(
					    'style'=>'height:20px; width: 180px;'
					    ),
					    ));
					?>
					<?php // echo $form->textField($this->model,'from'); ?>
				</div>
		    </div>
		    <div class="clear"></div>
		</div>
		<div class="height-10"></div>
		<div class="row-form-reservation">
			<?php echo $form->labelEx($this->model,'date_end'); ?>
			<div class="input-box-med">
				<div class="inner-box">
					<?php
					    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					    // 'name'=>'Reservation[date_add]',
					    'model'=>$this->model,
					    'attribute'=>'date_end',
					    // additional javascript options for the date picker plugin
					    'options'=>array(
						    'showAnim'=>'fold',
					    	'showOn'=> "button",
							'buttonImage'=> Yii::app()->baseUrl."/asset/images/icon-calender.png",
							'buttonImageOnly'=> true,
					    ),
					    'htmlOptions'=>array(
					    'style'=>'height:20px; width: 180px;'
					    ),
					    ));
					?>
					<?php // echo $form->textField($this->model,'to'); ?>
				</div>
		    </div>
		    <div class="clear"></div>
		</div>
		<div class="height-20"></div>
		<?php /*
		<div class="row-form-reservation">
			<div class="reservation-occupants">
				<label for="Reservation_adults"><?php echo Yii::t('main', 'Adult per room') ?></label>
				<div class="input-box-vsmall">
					<div class="inner-box">
						<?php echo $form->dropDownList($this->model,'adults',array(
						'1'=>'1',
						'2'=>'2',
						'3'=>'3',
						'4'=>'4',
						'5'=>'5',
						'6'=>'6',
						'7'=>'7',
						'8'=>'8',
						'9'=>'9',
						)); ?>
					</div>
			    </div>
			    <div class="clear"></div>
		    </div>
			<div class="reservation-rooms">
				<label for="Reservation_children"><?php echo Yii::t('main', 'Children per room') ?></label>
				<div class="input-box-vsmall">
					<div class="inner-box">
						<?php echo $form->dropDownList($this->model,'children',array(
						'0'=>'0',
						'1'=>'1',
						'2'=>'2',
						'3'=>'3',
						'4'=>'4',
						'5'=>'5',
						'6'=>'6',
						'7'=>'7',
						'8'=>'8',
						'9'=>'9',
						)); ?>
					</div>
			    </div>
			    <div class="clear"></div>
		    </div> 
		    <div class="clear"></div>
		</div>
		<div class="height-10"></div>
		*/ ?>
		<div class="row-form-reservation">
			<div class="button-back">
				<div class="inner-box">
					<input type="submit" name="submit" value="<?php echo Yii::t('main', 'Book Now') ?>" />
				</div>
		    </div>
		    <div class="clear"></div>
		</div>
	<?php $this->endWidget(); ?>
	</div>

</div>
<script type="text/javascript">
	$('#reservation-form').live('submit',function() {
		// alert('Maaf Reservasi masih belum aktif saat ini');
		// return false;
	})
</script>