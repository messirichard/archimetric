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
			<div class="m-ins-content m-ins-myaccount">
				<div class="clear height-25"></div>
				<div class="breadcumb"> Ganti Password <?php echo $model->first_name ?> <?php echo $model->last_name ?></div>
				<div class="clear height-25"></div>
				
				<div class="row-fluid">
					<div class="span8">
						<div class="center box-infomation-account border-left-brown padding-left-50">
							<div class="basic-information">
							<div class="title">Ganti Password Akun anda</div>
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
									<?php if(Yii::app()->user->hasFlash('success')): ?>
									
									    <?php $this->widget('bootstrap.widgets.TbAlert', array(
									        'alerts'=>array('success'),
									    )); ?>
									
									<?php endif; ?>

								    <?php echo $form->passwordFieldRow($model,'passold',array('class'=>'span4')); ?>
								    <?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span4')); ?>
								    <?php echo $form->passwordFieldRow($model,'passconf',array('class'=>'span4')); ?>


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