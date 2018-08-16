	<div class="back-white-regandlogin">
		<div class="clear height-40"></div>
		<div class="container2 prelatif">
			<div class="inside-content tengah w830">

				<!-- /. Start Content Login Register -->
				<div class="m-ins-content m-ins-myaccount">
					<div class="clear height-25"></div>
					<div class="breadcumb"> Welcome to OnSurabaya.com </div>
					<div class="clear height-25"></div>
					
					<div class="row-fluid">
						<div class="span5">
							<div class="center box-account-history">
								<div class="title">Login</div>
								<div class="clear height-20"></div>
								
								<div class="basic-information left_login">
								<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								    'id'=>'verticalForm',
								    'type'=>'horizontal',
								    //'htmlOptions'=>array('class'=>'well'),
									'enableClientValidation'=>false,
									'clientOptions'=>array(
										'validateOnSubmit'=>false,
									),
								)); ?>
								<?php echo $form->errorSummary($modelLogin); ?>
								<?php echo $form->textFieldRow($modelLogin, 'username', array('class'=>'span3')); ?>
								<?php echo $form->passwordFieldRow($modelLogin, 'password', array('class'=>'span3')); ?>
								<?php echo $form->checkboxRow($modelLogin, 'rememberMe'); ?>
							    <div class="control-group">
								    <label class="control-label" for="input"></label>
								    <div class="controls">
								    	<button type="submit" class="btn">Login</button>
								    </div>
							    </div>
								<?php $this->endWidget(); ?>

								 </div>
							</div>
						</div>
						<div class="span7">
							<div class="center box-infomation-account border-left-brown padding-left-50 form-login-rightacc">
								<div class="basic-information">
								<div class="title">Daftarkan diri anda</div>
								<div class="clear height-30"></div>
									<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
										'id'=>'account-form',
									    'type'=>'horizontal',
										'enableAjaxValidation'=>false,
										'clientOptions'=>array(
											'validateOnSubmit'=>false,
										),
									)); ?>
										<?php echo $form->errorSummary($model); ?>
									    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($model,'first_name',array('class'=>'span3')); ?>
									    <?php echo $form->textFieldRow($model,'last_name',array('class'=>'span3')); ?>
									    <?php echo $form->dropDownListRow($model,'jenis_kelamin',array(
									    	'1'=>'Laki-Laki',
									    	'0'=>'Perempuan',
									   	),array('class'=>'span3')); ?>
									    <div class="control-group">
										    <?php echo $form->labelEx($model, 'tgl_lahir', array('class'=>'control-label')) ?>
										    <div class="controls">
												<?php
													$data_hari_lahir = array();
													for ($i=1; $i <= 31 ; $i++) { 
														$data_hari_lahir[$i] = $i;
													}
													$data_bln_lahir = array();
													for ($i=1; $i <= 12 ; $i++) { 
														$data_bln_lahir[$i] = Yii::app()->locale->getMonthName($i);
													}
													$data_tahun_lahir = array();
													for ($i=date('Y')-15; $i >= date('Y')-100 ; $i--) { 
														$data_tahun_lahir[$i] = $i;
													}
												?>
										    	<?php echo CHtml::dropDownList('Member[hari_lahir]', $model->hari_lahir, $data_hari_lahir, array('style'=>'width: 60px;')) ?>
										    	<?php echo CHtml::dropDownList('Member[bln_lahir]', $model->bln_lahir, $data_bln_lahir, array('style'=>'width: auto;')) ?>
										    	<?php echo CHtml::dropDownList('Member[tahun_lahir]', $model->tahun_lahir, $data_tahun_lahir, array('style'=>'width: 85px;')) ?>
												<?php echo $form->error($model,'tgl_lahir'); ?>
										    </div>
									    </div>
									    <?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span3')); ?>
									    <?php echo $form->passwordFieldRow($model,'passconf',array('class'=>'span3')); ?>

									    <!-- /. submit -->
									    <div class="control-group">
										    <label class="control-label" for="input"></label>
										    <div class="controls">
										    	<button type="submit" class="btn">Submit</button>
										    </div>
									    </div>
								 </div>

								 <div class="clear height-0"></div>

							</div>
<?php $this->endWidget(); ?>
						</div>
					</div>

					<div class="clear height-25"></div>

					<div class="clear"></div>
				</div>
				<!-- /. End Content Login Register -->
				
				<div class="clear height-15"></div>

			<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- End Main Content -->
	</div>