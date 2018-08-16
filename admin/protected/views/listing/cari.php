
<div class="inside-content white">
	<div class="prelatif container2">
				<div class="ins-mid">
					<div class="clear height-40"></div>
					<?php echo $this->renderPartial('//layouts/_left_area_result', array(
                        'jenis'=>$jenis,
                        'subArea'=>$subArea,
                    )); ?>
					
					<!-- /. right content -->
					<div class="right w964">
						<div class="ins">
							<div class="left t-big-onres-surabaya">Surabaya Timur</div>
							<div class="clear height-5"></div>
							<div class="left count-scrh-big-surabya">
								Ditemukan 200 tempat makan:
							</div>
							
							<div class="clear height-30"></div>

							<?php /*
							<div class="box-listing-data grey prelatif">
								<div class="box-title-listing-utama">Listing Utama <span class="keyword">“Tempat Makan”</span> di Surabaya Timur</div>
								
								<div class="clear height-45"></div>
								
								<div class="list-item-data row mrgn-lft-5" >
									<div class="item span4">
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/samp-list-utama-1.jpg" alt=""></div>
										<div class="clear height-4"></div>
										<div class="left w242 margin-left-5"> 
											<div class="b-title">Urrutia Design</div>
												<div class="clear height-2"></div>
												<span class="chl-b">Urrutia Design</span>
										</div>
										<div class="right score">
											<div class="abs-score"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/score/icon-score-10.png" alt=""></div>
										</div>
									</div>

									<div class="item span4">
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/samp-list-utama-2.jpg" alt=""></div>
										<div class="clear height-4"></div>
										<div class="left w242 margin-left-5"> 
											<div class="b-title">Eclectic Bedroom</div>
												<div class="clear height-2"></div>
												<span class="chl-b">Kristin Peake Interiors, LLC</span>
										</div>
										<div class="right score">
											<div class="abs-score"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/score/icon-score-9.png" alt=""></div>
										</div>
									</div>

									<div class="item span4">
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/samp-list-utama-3.jpg" alt=""></div>
										<div class="clear height-4"></div>
										<div class="left w242 margin-left-5"> 
											<div class="b-title">Chalet Interiors</div>
												<div class="clear height-2"></div>
												<span class="chl-b">Chalet</span>
										</div>
										<div class="right score">
											<div class="abs-score"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/score/icon-score-8.png" alt=""></div>
										</div>
									</div>
								</div>
									
								<div class="clear"></div>
							</div>

							<div class="clear height-40"></div>
							*/ ?>
							
							<!-- /.  bx list all -->
							<div class="bx-list-all">
								<div class="padd">
									<div class="tp-filter">
										<div class="left t-l-filter margin-left-20">Lihat listing <b>“Tempat Makan”</b> di Surabaya Timur berdasar </div>
										<div class="left middle-l-filter margin-left-10">
											<a class="f-filter-list" href="#">Alfabet</a>&nbsp;&nbsp;
											<a class="f-filter-list active" href="#">Tanggal Terbaru</a>&nbsp;&nbsp;
											<a class="f-filter-list" href="#">Nilai Tertinggi</a>
										</div>
										<div class="right tl-pagination margin-right-20">page 1 <span class="next"><i class="icon-chevron-right-paginat"></i></span></div>
									</div>
									<div class="clear height-20"></div>

									<!-- /. Draf listing -->
									<div class="bx-draf-listing">
										<div class="list-item-data row mrgn-lft-5" >

											<?php foreach ($data['data'] as $key => $value): ?>
											<div class="item span4">
												<div class="pic">
                                                    <a href="<?php echo CHtml::normalizeUrl(array('/listing/detail', 'slug'=>$value['slug'])); ?>">
                                                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(301,301, '/images/listing/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                                    </a>
                                                </div>
												<div class="clear height-4"></div>
												<div class="left w242 margin-left-5"> 
													<div class="b-title"><?php echo $value['nama_listing'] ?></div>
														<div class="clear height-2"></div>
														<span class="chl-b"><?php echo $value['area'] ?></span>
												</div>
												<div class="right score">
													<div class="abs-score"><div class="bck-score-child"><div class="tx"><?php echo $value['rating'] ?></div></div></div>
												</div>
											</div>
                                            <?php endforeach ?>

											<div class="clear"></div>
										</div>

										<div class="clear"></div>
									</div>
									<!-- /. End Draf listing -->

									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<!-- /. End bx list all -->

							<div class="clear height-20"></div>

							<div class="pagination">
							<?php $this->widget('CLinkPager', array(
							    'pages' => $data['pages'],
							    'cssFile' => '',
							)) ?>
							</div>

							<div class="clear height-50"></div>

							<div class="clear"></div>
						</div>
						<div class="clear"></div>	
					</div>
					<!-- /. End right content -->

				</div>

			<div class="clear"></div>
		</div>

		<div class="clear"></div>
</div>
<!-- End Main Content -->