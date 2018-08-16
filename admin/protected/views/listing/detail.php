<div class="inside-content white">
	<!-- <div class="clear height-25"></div> --> <div class="clear"></div>
	<div class="back-breadcumb">
		<div class="prelatif container2">
			<div class="left tx-breadcumb">
				<?php foreach ($breadcrump as $key => $value): ?>
				<?php if (count($breadcrump) == $key + 1): ?>
					<span class="white"><?php echo $value['label'] ?></span>
				<?php else: ?>
					<a href="<?php echo $value['url'] ?>"><?php echo $value['label'] ?></a> <span class="green">&gt;</span> 
				<?php endif ?>
				<?php endforeach ?>
			</div>
			<div class="right share-postin">
				Share listing ini &nbsp;&nbsp;&nbsp;&nbsp; 
				<?php 
				$this->widget('ext.SocialShareWidget.SocialShareWidget', array(
				    // 'url' => 'http://example.org',          //required
				    'services' => array('facebook'),   //optional
				    'htmlOptions' => array('class' => 'someClass'), //optional
				    'popup' => true,               //optional
				));
				?>&nbsp;&nbsp;
				<?php 
				$this->widget('ext.SocialShareWidget.SocialShareWidget', array(
				    // 'url' => 'http://example.org',          //required
				    'services' => array('twitter'),   //optional
				    'htmlOptions' => array('class' => 'someClass'), //optional
				    'popup' => true,               //optional
				));
				?>&nbsp;&nbsp;
				<?php 
				$this->widget('ext.SocialShareWidget.SocialShareWidget', array(
				    // 'url' => 'http://example.org',          //required
				    'services' => array('google'),   //optional
				    'htmlOptions' => array('class' => 'someClass'), //optional
				    'popup' => true,               //optional
				));
				?>
				<!-- <a href="#"><i class="icon-pinterest"></i></a> -->
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="prelatif container2 garis-vertical">
			<div class="ins-mid detail">
				<!-- left content -->
				<div class="left box-deskripsi-detailouter">
					<div class="clear height-15"></div>
					<!-- start box title detail -->
					<div class="box-dj-title-detail">
						<div class="left w761">
							<h1 class="title"><?php echo $data->nama_listing ?></h1>
							<div class="clear"></div>
							<div class="address"><?php echo $data->alamat ?></div>
						</div>
						<?php if ($data->rating != 0): ?>
						<div class="right">
							<div class="clear height-10"></div>
							<div class="score">
								Rating
								<div class="clear height-10"></div>
								<div class="bck-score-big"><div class="tx"><?php echo $data->rating; ?></div></div>
							</div>
						</div>
						<?php endif ?>
					</div>
					<!-- End box title detail -->
					<div class="clear height-20"></div>
					<?php if(Yii::app()->user->hasFlash('success')): ?>
					
					    <?php $this->widget('bootstrap.widgets.TbAlert', array(
					        'alerts'=>array('success'),
					    )); ?>
					<div class="clear height-20"></div>
					
					<?php endif; ?>
					<!-- start box additional infoadd  -->
					<div class="box-additional-infoadd">
						<div class="row-fluid">
							<?php if ($data->phone != ''): ?>
							<div class="span4 left">
								<dl class="dl-horizontal">
								  <dt><i class="icon-phone-info"></i></dt>
								  <dd><span class="black">Phone:</span></dd>
								  <dt>&nbsp;</dt>
								  <dd><span><?php echo $data->phone ?></span></dd>
								</dl>
							</div>
							<?php endif ?>
							<?php if ($data->email != ''): ?>
							<div class="span4 left">
								<dl class="dl-horizontal">
								  <dt><i class="icon-email-info"></i></dt>
								  <dd><span class="black">Email:</span></dd>
								  <dt>&nbsp;</dt>
								  <dd><span><a href="mailto:<?php echo $data->email ?>"><?php echo $data->email ?></a></span></dd>
								</dl>
							</div>
							<?php endif ?>
							<?php if ($data->website != ''): ?>
							<div class="span4 left">
								<dl class="dl-horizontal">
								  <dt><i class="icon-website-info"></i></dt>
								  <dd><span class="black">Website:</span></dd>
								  <dt>&nbsp;</dt>
								  <dd><span><a href="<?php echo $data->website ?>">View Website</a></span></dd>
								</dl>
							</div>
							<?php endif ?>
						</div>
						<div class="clear"></div>
					</div>
					<!-- End box additional infoadd  -->
					<div class="clear height-20"></div>
					<div class="clear height-3"></div>

					<!-- start desk content middle  -->
					<div class="desk-content-middle-data">
						<div class="left w300">
							<div class="pic"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(266,266, '/images/listing/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt=""></div>
							<div class="clear height-15"></div>
							<?php if ($data->jam_buka != ''): ?>
							<div class="d-hours">
								<dl class="dl-horizontal">
								  <dt><i class="icon-hours-info"></i></dt>
								  <dd><span class="black">Hours:</span></dd>
								  <dt>&nbsp;</dt>
								  <dd><span><?php echo nl2br($data->jam_buka) ?></span></dd>
								</dl>
							</div>
							<?php endif ?>
						</div>
						<div class="left w548">
							<div class="text-content">
								<?php if ($data->deskripsi != ''): ?>
								<span class="overview">Overview <?php echo $data->nama_listing ?>:</span>
								<div class="clear height-2"></div>
								<?php echo $data->deskripsi ?>
								<div class="clearfix height-10"></div>
								<div class="lines-grey"></div>
								<?php endif ?>

								<div class="advice-gall-info">
									<div class="clear height-15"></div>
									<div class="left w255">
										<a href="#"><i class="icon-pencil-green"></i> &nbsp;Usulkan perubahan pada listing</a>
									</div>
									<div class="right w295">
										<a href="#"><i class="icon-login-green"></i> &nbsp;Anda pemilik usaha ini? Klaim listing ini!</a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clear height-20"></div>

								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>

						<div class="lines-grey"></div>
						<div class="clear height-10"></div>
						<div class="height-3"></div>

						<div class="gallery-detail">
							<div class="title"><i class="icon-list-pi-gal"></i> &nbsp;Gallery <?php echo $data->nama_listing ?></div>
							<div class="clear height-10"></div>
							<div class="height-3"></div>
							<div class="list-gallery">
								<?php foreach ($gallery as $key => $value): ?>
									<div class="item"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(97,97, '/images/listing/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt=""></div>
								<?php endforeach ?>
								<?php if ($this->login['id'] == ''): ?>
									<div class="item none"><a href="<?php echo CHtml::normalizeUrl(array('/profile/login', 'ret'=>CHtml::normalizeUrl(array('/listing/detail', 'slug'=>$data->slug)) )); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/dg-img-gallerynone.jpg" alt=""></a></div>
								<?php else: ?>
									<div class="item none"><a href="#" id="click-file-gallery"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/dg-img-gallerynone.jpg" alt=""></a></div>
								<?php endif ?>
							</div>
							<?php if ($this->login['id'] != ''): ?>
							<form action="" method="post" enctype="multipart/form-data" style="display:none;"  id="form-gallery">
								<input type="file" name="file" style="display:none;" id="file-gallery">
								<input type="hidden" name="type" value="gallery">
							</form>
							<script type="text/javascript">
							$(function() {
								
							    $('#click-file-gallery').click(function(){
							        $('#file-gallery').click();
							        return false;
							    });
							    $('#file-gallery').change(function() {
							    	$('#form-gallery').submit();
							    })
							})
							</script>
							<?php endif ?>
							<div class="clearfix"></div>
							<div class="height-10"></div>
							<div class="height-3"></div>
							<div class="t-gallery">Lihat seluruh Gallery <?php echo $data->nama_listing ?> &nbsp; <i class="icon-chev-right-gallerych"></i></div>
							<div class="clear height-15"></div>
							<div class="lines-grey"></div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>

						<!-- /. Start Arsip dcontent -->
						<div class="gallery-detail">
							<div class="title"><i class="icon-list-pi-gal"></i> &nbsp;Arsip <?php echo $data->nama_listing ?></div>
							<div class="clear height-10"></div>
							<div class="height-3"></div>
							<div class="list-gallery">
								<?php foreach ($arsip as $key => $value): ?>
									<div class="item back-grey-border">
										<a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/images/listing_arsip/<?php echo $value->arsip ?>">
											<div class="text">
												<i class="icon-attachment-gl-front"></i>
												<br class="clear height-3">
												<?php echo $value->title ?>
											</div>
										</a>
									</div>
								<?php endforeach ?>
									<div class="item">
										<?php if (Member::model()->isGuest()): ?>
										<a href="<?php echo CHtml::normalizeUrl(array('/profile/login', 'ret'=>CHtml::normalizeUrl(array('/listing/detail', 'slug'=>$data->slug)) )); ?>">
											<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/tm-arsip-d-none.jpg" alt="">
										</a>
										<?php else: ?>
										<a href="#" class="btn-input-arsip">
											<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/tm-arsip-d-none.jpg" alt="">
										</a>
										<?php endif ?>
									</div>
							</div>
							<div class="clear height-25"></div>
							<?php if ( ! Yii::app()->user->isGuest): ?>
							<div class="input-arsip" style="display: none;">
								<div class="title"><i class="icon-list-pi-gal"></i> &nbsp;Input Arsip <?php echo $data->nama_listing ?></div>
								<div class="clear height-10"></div>
								<div class="height-3"></div>
								<form method="post" action="" id="listing-form" class="form-horizontal" enctype="multipart/form-data">
									<p class="help-block">Fields with <span class="required">*</span> are required.</p>
									<div class="height-3"></div>
									<?php echo CHtml::errorSummary($modelArsip, 'Please fix the following input errors:', '',array('class'=>'alert alert-block alert-error')); ?>
									<div class="control-group ">
										<label for="ListingArsip_title" class="control-label required">Judul Arsip <span class="required">*</span></label>
										<div class="controls">
											<input type="text" id="ListingArsip_title" name="ListingArsip[title]" maxlength="100" class="span5">
										</div>
									</div>
									<div class="control-group ">
										<label for="ListingArsip_arsip" class="control-label required">File Arsip (PSD) <span class="required">*</span></label>
										<div class="controls">
											<input type="file" id="ListingArsip_arsip" name="arsip" class="span5">
										</div>
									</div>
									<input type="hidden" name="type" value="arsip">
									<div class="control-group ">
										<label class="control-label required">&nbsp;</label>
										<div class="controls">
											<button type="submit" name="ListingArsip[submit]" class="btn btn-primary">Kirim</button>
											<button class="btn btn-cancel-input-arsip">Batal</button>
										</div>
									</div>
								</form>								
								<div class="clear height-5"></div>
							</div>
							<script type="text/javascript">
							$('.btn-input-arsip').click(function() {
								$('.input-arsip').slideDown();
								return false;
							})
							$('.btn-cancel-input-arsip').click(function() {
								$('.input-arsip').slideUp();
								return false;
							})
							</script>
							<?php endif ?>

							<div class="lines-grey"></div>
							<div class="clear"></div>
						</div>

						<div class="clear height-10"></div>
						<!-- /. End Arsip dcontent -->

						<!-- /. Start ulasan komen dcontent -->
						<div class="gallery-detail">
							<div class="title"><i class="icon-list-pi-gal"></i> &nbsp;Ulasan <?php echo $data->nama_listing ?></div>
							<div class="clear height-20"></div>

							<div class="box-grey1-createcomment">
								<form method="post" action="">
									<div class="left add-comment">
										<div class="clear height-5"></div>
										<div class="height-4"></div>
										<div class="bc-pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/vw-imcomm-human.jpg" alt=""></div>
										<div class="gd-comment prelatif">
											<div class="bck-gd-l-comment"></div>
											<textarea name="ulasan" class="foc-comment" rows="3"></textarea>
											<input type="hidden" name="type" value="ulasan">
											<input type="hidden" name="rating" id="rating-comment-slider" value="0">
									</div>
									</div>
									<div class="right gv-score">
										<div class="clear height-5"></div>
										<div class="height-4"></div>
										<div class="back-gd-cs-scoredata">
											<div class="left txt-nilai">
												Beri Nilai
											</div>
											<div class="right dg-gv-score prelatif">

												<div class="progress bck-progdet-scre">
												  <!-- <div class="bar" style="width: 60%;"></div> -->
												</div>
												<div class="tm-box-slide-comment">
													<div id="slider-comment"></div>
												</div>

											</div>
										</div>

										<div class="clear"></div>
										<div class="bt-cncel-dt-comment">
											<div class="clear height-50"></div>
											<div class="right margin-right-10">
												<div class="linked">
													<a href="#" class="cancl hd-fet-comm-sr">Batal</a>&nbsp;&nbsp;|&nbsp;&nbsp;
													<button type="submit" class="savnl">kirim</button>
												</div>
												<div class="clear height-10"></div>
											</div>
											<div class="clear"></div>
										</div>

									</div>
								</form>
								<script type="text/javascript">
									// slider comment
									$( "#slider-comment" ).slider({
										  // value:1,
									      min: 1,
									      max: 10,
									      step: 1,
									      slide: function( event, ui ) {
									        $( ".ui-widget-content .ui-state-default" ).html(ui.value );
									        $('#rating-comment-slider').val(ui.value);
									      },
									      create: function( event, ui ) {
									        $( ".ui-widget-content .ui-state-default" ).html("1");
									        $('#rating-comment-slider').val(1);
									      },
									});
								</script>
								<div class="clearfix"></div>
							</div>

							<div class="clear height-20"></div>
							<?php foreach ($ulasan as $key => $value): ?>
							<?php
							$member = Member::model()->findByPk($value->user_id);
							?>
							<div class="back-list-grey2-comment">
								<div class="top">
									<div class="left pict"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/vw-imcomm-human.jpg" alt=""></div>
									<div class="left data-top">
										<div class="left w421">
											<div class="t-author">
												<span class="ulas">Ulasan <?php echo $data->nama_listing ?></span>
												<div class="clear"></div>
												Oleh <?php echo $member->first_name ?> <?php echo $member->last_name ?>, <?php echo date('d F Y',strtotime($value->date_input)); ?>
											</div>
										</div>
										<div class="right w326">
											<div class="bsc-scre-comment">
												<div class="left p-score"><div class="bck-score-child"><div class="tx"><?php echo $value->rating ?></div></div></div>
												<div class="left t-scre-comment margin-left-10">
													<span class="ulas">Nilai yang diberikan <?php echo $member->first_name ?> <?php echo $member->last_name ?> untuk:</span>
													<div class="clear"></div>
													<?php echo $data->nama_listing ?>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix height-10"></div>
								<div class="lines-grey"></div>
								<div class="clear height-25"></div>
								
								<div class="middle">
									<div class="text-content">
										<span class="subject"><?php echo $value->title ?></span>
										<div class="clear height-15"></div>
										<?php echo Common::replaceBr(nl2br($value->ulasan)) ?>

										<div class="clear height-15"></div>
										<p class="caution">Laporkan jika: <span class="green">Ulasan ini adalah SPAM</span> atau <span class="green">Ulasan ini sudah tidak relevan</span>.</p>
									</div>
								</div>

								<div class="clearfix"></div>
							</div>
							<div class="clear height-20"></div>
							<?php endforeach ?>
							

							<div class="clear height-25"></div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<!-- /. End ulasan komen dcontent -->					

						<div class="clear height-35"></div>
							
						<div class="clear"></div>
					</div>
					<!-- End desk content middle  -->

					<div class="clear"></div>
				</div>
				<!-- End left content -->
				
				<?php echo $this->renderPartial('//layouts/_right_area_detail', array(
					'keyword'=>$keyword,
					'right_listing'=>$right_listing,
					'link'=>$link,
					'data'=>$data,
					'jenisSlug'=>$data->jenis_usaha_id,
				)); ?>
				
				<div class="clear"></div>
			</div>

		<div class="clear"></div>
	</div>
</div>
<!-- End Main Content -->