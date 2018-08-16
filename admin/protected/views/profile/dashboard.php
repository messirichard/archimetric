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
					<?php echo $this->renderPartial('//profile/_left_side_profile', array('active'=>'overview')); ?>
				</div>
				<div class="span9">

				<div class="inside-content tengah text-left">

				<!-- /. Start Content Login Register -->
				<div class="m-ins-content m-ins-myaccount profile-summary-info">
					<div class="clear height-25"></div>
					<div class="breadcumb">Selamat Datang <?php echo ucwords($this->login['first_name']) ?> <?php echo ucwords($this->login['last_name']).','; ?></div>
						<div class="clear height-30"></div>
						Jumlah Usaha: <?php echo Listing::model()->count('pemilik_member_id = :pemilik_member_id', array(':pemilik_member_id'=>MeMember::model()->getId())) ?> <br>
						Jumlah Kontribusi: <?php echo Listing::model()->count('input_member_id = :input_member_id', array(':input_member_id'=>MeMember::model()->getId())) ?> 
					
					<div class="clear height-35"></div>
					<div class="lines-grey"></div>
					<div class="clear height-50"></div>
					Tahukan anda, berkontribusi di Onsurabaya.com akan mendapat penghargaan sebesar Rp. 5000,- untuk ulasan yang di setujui. <br>
					<a href="#" class="more-summary">Info lebih lanjut</a>
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