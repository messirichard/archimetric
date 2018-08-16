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
				<div class="breadcumb"> Portal Kontribusi</div>
				<div class="clear height-25"></div>
				
				<div class="box-list-usaha-anda">
					<h5 class="name">Papan Job Untuk Liputan Mall Surabaya</h5>
					<div class="clear"></div>
					<table class="table table-bordered">
						<tr>
							<th width="5%">Job</th>
							<th>Area</th>
							<th width="10%">Jml Liput</th>
							<th width="15%">Action</th>
						</tr>
						<?php foreach ($modelMall as $key => $value): ?>
						<tr>
							<td><?php echo $value->id ?></td>
							<td><?php echo $value->desc ?></td>
							<td><?php echo $value->listingCount ?></td>
							<td>
								<a href="<?php echo CHtml::normalizeUrl(array('kontribusiTambah', 'id'=>$value->id, 'area'=>$value->area_id)); ?>">Submit</a>
								|
								<a href="<?php echo CHtml::normalizeUrl(array('kontribusiPost', 'id'=>$value->id, 'area'=>$value->area_id)); ?>">Lihat Post</a>
							</td>
						</tr>
						<?php endforeach ?>
					</table>
					
					<div class="clear"></div>
				</div>

				<div class="box-list-usaha-anda">
					<h5 class="name">Papan Job Untuk Liputan Surabaya</h5>
					<div class="clear"></div>
					
					<table class="table table-bordered">
						<tr>
							<th width="5%">Job</th>
							<th>Jenis</th>
							<th>Deskripsi</th>
							<th width="10%">Jml Liput</th>
							<th width="15%">Action</th>
						</tr>
						<?php foreach ($modelJenis as $key => $value): ?>
						<tr>
							<td><?php echo $value->id ?></td>
							<td><?php echo TbJenisUsaha::model()->findByPk($value->jenis_usaha_id)->nama ?></td>
							<td><?php echo $value->desc ?></td>
							<td><?php echo $value->listingCount ?></td>
							<td>
								<a href="<?php echo CHtml::normalizeUrl(array('kontribusiTambah', 'id'=>$value->id, 'jenis'=>$value->jenis_usaha_id)); ?>">Submit</a>
								|
								<a href="<?php echo CHtml::normalizeUrl(array('kontribusiPost', 'id'=>$value->id, 'jenis'=>$value->jenis_usaha_id)); ?>">Lihat Post</a>

							</td>
						</tr>
						<?php endforeach ?>
					</table>
					<div class="clear"></div>
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