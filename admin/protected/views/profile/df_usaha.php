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
					<?php echo $this->renderPartial('//profile/_left_side_profile', array('active'=>'df_usaha')); ?>
				</div>
				<div class="span9">

				<div class="inside-content tengah text-left">

				<!-- /. Start Content Login Register -->
				<div class="m-ins-content m-ins-myaccount profile-summary-info">
					<div class="clear height-25"></div>
					<div class="breadcumb">Daftar Usaha <?php echo ucwords($model->first_name) ?> <?php echo ucwords($model->last_name).','; ?></div>
						<div class="clear height-30"></div>
						<div class="box-list-usaha-anda">
						<h5 class="name">Daftar Usaha di On Surabaya</h5>
						<div class="clear"></div>
						<div class="height-10"></div>
						<a class="btn" href="<?php echo CHtml::normalizeUrl(array('/profile/registerbusiness')); ?>"><i class="fa fa-send-o"></i> &nbsp;Daftarkan Bisnis Anda Di Sini</a>
						<div class="clear"></div>
<?php
$listing = Listing::model()->findAll('pemilik_member_id = :pemilik_member_id', array(':pemilik_member_id'=>MeMember::model()->getEmail()));
?>
						<?php 
							$gridDataProvider = new CArrayDataProvider(array(
									    array('id'=>1, 'name_bussiness'=>'Restoran Ayam Goreng Delima'),
									    array('id'=>2, 'name_bussiness'=>'Nasi Bebek Pak Qomar'),
									    array('id'=>3, 'name_bussiness'=>'Nasi Bebek Pak Jenggot'),
									    array('id'=>4, 'name_bussiness'=>'Ayam Bakar Tumpeng'),
									));
						?>
						<?php $this->widget('bootstrap.widgets.TbGridView',array(
								'type'=>'striped bordered condensed',
								'id'=>'listing-grid',
							    'dataProvider'=>$gridDataProvider,
							    // 'template'=>"{items}",
							    'columns'=>array(
							        array('name'=>'id', 'header'=>'#'),
							        array('name'=>'name_bussiness', 'header'=>'Nama Bisnis'),
							       array(
										'class'=>'bootstrap.widgets.TbButtonColumn',
										'template'=>'{update} {delete}'
									),
							    ),
							)); ?>
					</div>
					<div class="clear height-10"></div>
					<div class="lines-grey"></div>
					<div class="clear height-25"></div>
					<div class="clear height-20"></div>
				</div>


					<div class="clear"></div>
				</div>
				<!-- /. End Content Login Register -->
				
				<div class="clear height-15"></div>

			<div class="clear"></div>
			</div>

					<div class="clearfix"></div>
				</div>
			<div class="clear height-50"></div>
				<div class="clearfix"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- End Main Content -->
	</div>