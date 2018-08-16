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
				<div class="breadcumb"> Posting listing</div>
				<div class="clear height-25"></div>
				
				<div class="box-list-usaha-anda">
					<h5 class="name">Posting listing di kategori</h5>
					<div class="clear"></div>
					<table class="table table-bordered">
						<tr>
							<th width="10%">Job</th>
							<th>Nama Listing</th>
							<th width="10%">Di Kirim Oleh</th>
						</tr>
						<?php foreach ($model as $key => $value): ?>
						<tr>
							<td><?php echo $value->id ?></td>
							<td><?php echo $value->nama_listing ?></td>
							<td><?php echo $value->inputMember->first_name ?></td>
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