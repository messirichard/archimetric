
<div class="inside-content white">
	<div class="prelatif container2">
				<div class="ins-mid prelatif">
					<div class="clear height-40"></div>
						<!-- /. Start ins telusur -->
								<div class="inside-telusur">
									<div class="clear height-30"></div>
									<div class="height-20"></div>
									<div class="in-text-telusur">
										<h1 class="title">Surabaya:</h1>
										<div class="clear height-10"></div>
										<div class="dec-telusur">
											<p>Kota Pahlawan, Surga Kuliner, Pusat Perdangan
											dan Sebuah Rumah yang ‘Ramah’ bagi para pengunjung...</p>
										</div>
									</div>
									<div class="clear height-50"></div>
									<!-- <div class="height-10"></div> -->
									<div class="t-telusur-kota"><div class="line-side-tlsr-kota left margin-top-15"></div><div class="middle left">"<?php echo $cari ?>" Di Seluruh Surabaya</div><div class="line-side-tlsr-kota right margin-top-15"></div></div>
									<div class="clear height-20"></div>
									<div class="tengah w1074 prelatif">
										<div class="slider-bx-1 list-item-telusurhome">
											
											<?php foreach ($data as $key => $value): ?>
											<div class="slide">
												<div class="item prelatif">
													<div class="pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/banner-1.jpg" alt=""></div>
													<div class="back-text">
														<div class="clear height-2"></div>
														<h1 class="title"><?php echo $value['area'] ?></h1>
														<div class="clear"></div>
														<h5 class="count"><?php echo number_format($value['jml'], 0, ',', '.') ?> tempat terdaftar</h5>
														<div class="clear height-15"></div>
														<?php
														$link['area'] = $value['area'];
														?>
														<div class="db-button"><a class="lnk-view" href="<?php echo CHtml::normalizeUrl($link); ?>">LIHAT</a></div>
													</div>
												</div>
												<div class="clear"></div>
												<div class="tx-d-meliputi prelatif">
													<span>Meliputi Sub Area:</span>
													<div class="clear height-5"></div>
													<?php echo $value['sub_area'] ?>
													<div class="clearfix"></div>
												</div>
											</div>
											<?php endforeach ?>

										</div>
									</div>

									<div class="clear"></div>	
								</div>
								
							<!-- /. End ins telusur -->
								<div class="clear"></div>

					<div class="clear height-50"></div>
				</div>

			<div class="clear"></div>
		</div>

		<div class="clear"></div>
</div>
<!-- End Main Content -->