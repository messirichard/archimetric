<!-- Start Right Content -->
		<div class="right more-info-n-listing">
			<div class="clear height-20"></div>
				<div class="box-search-keyword">
					<span class="tx-keyword">Keyword</span>
					<div class="clear height-10"></div>
					<?php foreach ($keyword as $key => $value): ?>
					<div class="list-key"><a href="<?php echo CHtml::normalizeUrl(array('/listing/index', 'jenis'=>$jenisSlug, 'area'=>$data->area_id, 'tag'=>$value->tag)); ?>" class="item-kword"><?php echo $value->tag ?></a></div>
					<?php endforeach ?>
					<div class="clear"></div>
				</div>
				<div class="clear height-15"></div>
				<div class="height-2"></div>
				<div class="lines-grey"></div>
				<div class="clear height-25"></div>
				
				<div class="box-more-list-busines">
					<span class="tx-keyword">Usaha serupa di:</span>
					<div class="clear height-5"></div>
					<span class="grey">Area Surabaya Timur, wilayah Galaxy Mall.</span>

					<div class="clear height-15"></div>

					<div class="list-busines">
						<?php foreach ($right_listing as $key => $value): ?>
						<div class="item">
							<div class="pic prelatif">
								<div class="bc-rght-listutama"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/bc-icright-utama-listing.png" alt=""></div>
                                <a href="<?php echo CHtml::normalizeUrl(array('/listing/detail', 'slug'=>$value['slug'])); ?>">
                                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(301,301, '/images/listing/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
							</div>
							<div class="left t-name">
								<div class="clear height-5"></div>
								<div class="height-4"></div>
								<div class="b-title"><?php echo $value['nama_listing'] ?></div>
								<div class="clear"></div>
								<span class="chl-b"><?php echo $data->area_data[$value['area_id']] ?></span>
							</div>
							<?php if ($value['rating'] != 0): ?>
							<div class="right score">
								<div class="abs-score"><div class="bck-score-child"><div class="tx"><?php echo $value['rating'] ?></div></div></div>
							</div>
							<?php endif ?>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<div class="clear height-1"></div>
						<?php endforeach ?>
						<div class="clear height-35"></div>
						<div class="clear"></div>
					</div>

					<div class="clear"></div>
				</div>


			<div class="clear"></div>
		</div>
		<!-- End Right Content -->