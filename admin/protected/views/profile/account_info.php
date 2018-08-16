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
				<?php echo $this->renderPartial('//profile/_left_side_profile', array('active'=>'account_info')); ?>
			</div>
			<div class="span9">

			<div class="inside-content tengah text-left">

			<!-- /. Start Content Login Register -->
			<div class="m-ins-content m-ins-myaccount">
				<div class="clear height-25"></div>
				<div class="breadcumb"> Account info <?php echo $model->first_name ?> <?php echo $model->last_name ?></div>
				<div class="clear height-25"></div>
				
				<div class="row-fluid">
					<div class="span8">
						<div class="center box-infomation-account border-left-brown padding-left-50">
							<div class="basic-information">
							<div class="title">Akun anda</div>
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
								    <?php echo $form->uneditableRow($model,'email',array('class'=>'span4')); ?>
								    <?php echo $form->textFieldRow($model,'first_name',array('class'=>'span4')); ?>
								    <?php echo $form->textFieldRow($model,'last_name',array('class'=>'span4')); ?>
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
													$data_bln_lahir[$i] = $i;
												}
												$data_tahun_lahir = array();
												for ($i=date('Y'); $i >= date('Y')-100 ; $i--) { 
													$data_tahun_lahir[$i] = $i;
												}
											?>
									    	<?php echo CHtml::dropDownList('MeMember[hari_lahir]', $model->hari_lahir, $data_hari_lahir, array('style'=>'width: 60px;')) ?>
									    	<?php echo CHtml::dropDownList('MeMember[bln_lahir]', $model->bln_lahir, $data_bln_lahir, array('style'=>'width: 60px;')) ?>
									    	<?php echo CHtml::dropDownList('MeMember[tahun_lahir]', $model->tahun_lahir, $data_tahun_lahir, array('style'=>'width: 85px;')) ?>
											<?php
											    // $this->widget('zii.widgets.jui.CJuiDatePicker', array(
											    // 'id'=>'reservation',
											    // // 'name'=>'Reservation[date_add]',
											    // 'model'=>$model,
											    // 'attribute'=>'tgl_lahir',
											    // // additional javascript options for the date picker plugin
											    // 'options'=>array(
											    // 	'showAnim'=>'fold',
											    // 	'changeMonth'=>true,
											    // 	'changeYear'=>true,
											    // 	'dateFormat'=>'yy-mm-dd',
											    // ),
											    // 'htmlOptions'=>array(
											    //     'class'=>'span4'
											    // ),
											    // ));
											?>
											<?php echo $form->error($model,'tgl_lahir'); ?>
									    </div>
								    </div>
									<?php echo $form->dropDownListRow($model, 'jenis_kelamin', array('Laki - laki', 'Perempuan')); ?>

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
				<div class="lines-grey"></div>
				<div class="clear height-25"></div>
				<?php /*
				<div class="box-list-usaha-anda">
					<h5 class="name">Usulan / Gambar dari visitor</h5>
					<div class="clear"></div>
					
					<?php 
						$gridDataProvider = new CArrayDataProvider(array(
								    array('id'=>1, 'comment'=>'User "Deo" mengusulkan perubahan untuk "Shichidon"'),
								    array('id'=>2, 'comment'=>'User "Deo" mengusulkan perubahan untuk "Shichidon"'),
								));
					?>
					<?php $this->widget('bootstrap.widgets.TbGridView',array(
							'type'=>'condensed',
							'id'=>'listing-grid',
						    'dataProvider'=>$gridDataProvider,
						    // 'template'=>"{items}",
						    'columns'=>array(
						        array('name'=>'id', 'header'=>'#'),
						        array('name'=>'comment', 'header'=>'Comment'),
						       array(
									'class'=>'bootstrap.widgets.TbButtonColumn',
									'template'=>'{update} {delete}'
								),
						    ),
						)); ?>
						<div class="clear"></div>
				</div>
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