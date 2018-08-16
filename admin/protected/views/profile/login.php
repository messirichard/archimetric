<div class="clear height-30"></div>
		<div class="container-inside">
			<div class="inside-content">
				<?php echo $this->renderPartial('//layouts/_filter_top_product', array()); ?>

				<!-- /. Start Content About -->
				<div class="m-ins-content m-ins-myaccount">
					<div class="breadcumb"> Welcome to AdoreMyBeauty.com </div>
					<div class="clear height-15"></div>

					<div class="row">
						<div class="span6">
							<div class="center box-account-history">
								<div class="title">Login / My Account</div>
								<div class="clear height-30"></div>
								
								<div class="basic-information">
								<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								    'id'=>'verticalForm',
								    'type'=>'horizontal',
								    //'htmlOptions'=>array('class'=>'well'),
									'enableClientValidation'=>false,
									'clientOptions'=>array(
										'validateOnSubmit'=>false,
									),
								)); ?>
								 
								<?php echo $form->textFieldRow($modelLogin, 'username', array('class'=>'span3')); ?>
								<?php echo $form->passwordFieldRow($modelLogin, 'password', array('class'=>'span3')); ?>
								<?php echo $form->checkboxRow($modelLogin, 'rememberMe'); ?>
							    <div class="control-group">
								    <label class="control-label" for="input"></label>
								    <div class="controls">
								    	<button type="submit" class="bt btn-brown">LOGIN</button>
								    </div>
							    </div>
								 
								<?php $this->endWidget(); ?>

								 </div>
							</div>
						</div>
						<div class="span6">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'account-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
							<div class="center box-infomation-account border-left-brown padding-left-50">
								<div class="basic-information">
								<div class="title">New Customer Sign Up</div>
								<div class="clear height-30"></div>

										<?php echo $form->errorSummary($model); ?>
										<?php echo $form->errorSummary($modelDelivery); ?>
										
									    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($model,'first_name',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($model,'last_name',array('class'=>'span3')); ?>
									    <div class="control-group">
										    <?php echo $form->labelEx($model, 'date_birth', array('class'=>'control-label')) ?>
										    <div class="controls">
												<?php
													$data_tgl_lahir = array();
													for ($i=1; $i <= 31 ; $i++) { 
														$data_tgl_lahir[$i] = $i;
													}
													$data_bln_lahir = array();
													for ($i=1; $i <= 12 ; $i++) { 
														$data_bln_lahir[$i] = $i;
													}
													$data_tahun_lahir = array();
													for ($i=date('Y'); $i >= date('Y')-100 ; $i--) { 
														$data_tahun_lahir[$i] = $i;
													}
												?>
										    	<?php echo CHtml::dropDownList('hari_lahir', $model->hari_lahir, $data_tgl_lahir) ?>
										    	<?php echo CHtml::dropDownList('bln_lahir', $model->bln_lahir, $data_bln_lahir) ?>
										    	<?php echo CHtml::dropDownList('tahun_lahir', $model->tahun_lahir, $data_tahun_lahir) ?>
												<?php
												    // $this->widget('zii.widgets.jui.CJuiDatePicker', array(
												    // 'id'=>'reservation',
												    // // 'name'=>'Reservation[date_add]',
												    // 'model'=>$model,
												    // 'attribute'=>'date_birth',
												    // // additional javascript options for the date picker plugin
												    // 'options'=>array(
												    // 	'showAnim'=>'fold',
												    // 	'changeMonth'=>true,
												    // 	'changeYear'=>true,
												    // 	'dateFormat'=>'yy-mm-dd',
												    // ),
												    // 'htmlOptions'=>array(
												    // 	'class'=>'span3',
												    // ),
												    // ));
												?>
												<?php echo $form->error($model,'date_birth'); ?>
										    </div>
									    </div>
									    <?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span3')); ?>
									    <?php echo $form->passwordFieldRow($model,'passconf',array('class'=>'span3')); ?>


								 </div>

								 <div class="clear height-0"></div>
								 <div class="lines-grey"></div>
								 <div class="clear height-20"></div>
								 <div class="height-2"></div>

								 <div class="basic-information">
								 	<h4>DELIVERY INFORMATION</h4>
								 	<div class="clear height-25"></div>



									    <?php echo $form->textFieldRow($modelDelivery,'hp',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($modelDelivery,'bb',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($modelDelivery,'address',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($modelDelivery,'city',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($modelDelivery,'postcode',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($modelDelivery,'province',array('class'=>'span3')); ?>

									    <div class="control-group">
										    <label class="control-label" for="input"></label>
										    <div class="controls">
										    	<button type="submit" class="bt btn-brown">SIGN UP</button>
										    </div>
									    </div>

								 </div>

							</div>
<?php $this->endWidget(); ?>
						</div>
					</div>

					<div class="clear height-25"></div>

					<div class="clear"></div>
				</div>
				<!-- /. End Content About -->

				<div class="clear height-15"></div>

				<?php echo $this->renderPartial('//layouts/_sc_join_community', array()); ?>
				
				<div class="clear height-15"></div>

			<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- End Main Content -->