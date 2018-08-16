<?php
$menu = Category::model()->getCategory();
$hitungJml = Product::model();
$hitungJml->getJmlProductLoad();
?>
<!-- /. Start Menu Header -->
	<div class="box-menu prelatif">
		<div class="back-top-menu prelatif">
			<ul>
				<?php foreach ($menu[0] as $key => $value): ?>
				<li class="active">
					<a href="<?php echo CHtml::normalizeUrl(array('product/index', 'category'=>$value->id, 'name'=>Slug::create($value->name))); ?>"><?php echo $value['name'] ?></a>
						<div class="sub-menu-primary">
							<div class="inside">
									<div class="height-20"></div>
									<div class="left box-menu-tags w635">
											<!-- /. Start Menu drop masonry -->
											<div class="menu-drop-contain isotope">
												<?php if (isset($menu[$key])): ?>
													<?php foreach ($menu[$key] as $ky => $val): ?>
													<?php
													$stringSubCat = '';
													$jumlahProd = 0;
													if (isset($menu[$ky])) {
														$stringSubCat .= '<ul>';
														foreach ($menu[$ky] as $k => $v) {

															$stringSubCat .= '<li><a href="'.CHtml::normalizeUrl(array('product/index', 'category'=>$v->id, 'name'=>Slug::create($v->name))).'">'.$v->name.' ('.($jmlProd = $hitungJml->getJmlProduct($v->id)).')</a></li>';
															$jumlahProd = $jumlahProd + $jmlProd;
														}
														$stringSubCat .= '<ul>';
													}else{
														$jumlahProd = $hitungJml->getJmlProduct($val->id);
													}
													?>
													<div class="item menu-sub-drop-primary">
														<div class="tags"><a href="<?php echo CHtml::normalizeUrl(array('product/index', 'category'=>$val->id, 'name'=>Slug::create($val->name))); ?>"><?php echo $val->name ?> (<?php echo $jumlahProd ?>)</a></div>
														<div class="clear height-5"></div>
														<div class="height-1"></div>
														<?php echo $stringSubCat ?>
														<?php /*
														<?php if (isset($menu[$ky])): ?>
														<ul>
															<?php foreach ($menu[$ky] as $k => $v): ?>
																<li><a href="<?php echo CHtml::normalizeUrl(array('product/index', 'category'=>$v->id, 'name'=>Slug::create($v->name))); ?>"><?php echo $v->name ?> (1)</a></li>
															<?php endforeach ?>
														</ul>
														<?php endif ?>
														*/ ?>
													</div>
													<?php endforeach ?>
												<?php endif ?>


											</div>
											<!-- /. End Menu drop masonry -->
									</div>
									<div class="right box-h-suggestions w302">
										<div class="title">Our Suggestion:</div>
										<div class="clear height-20"></div>
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/example-sugest.jpg" alt=""></div>
										<div class="clear height-10"></div>
										<div class="left name-sugest">Chanel CC Cream</div>
										<div class="right shp-now"><a href="#" class="bt btn-brown">Shop Now</a></div>
									</div>

								<div class="clear"></div>
							</div>
						</div>

				</li>
				<?php endforeach ?>

<?php /*						
				<li><a href="#">Face Treatment</a>
						<div class="sub-menu-primary">
							<div class="inside">
									<div class="height-20"></div>
									<div class="left box-menu-tags w635">
											<!-- /. Start Menu drop masonry -->
											<div class="menu-drop-contain isotope">

												<div class="item menu-sub-drop-primary">
													<div class="tags">Hair (20)</div>
													<div class="clear height-5"></div>
													<div class="height-1"></div>
													<ul>
														<li><a href="#">Conditioner (2)</a></li>
														<li><a href="#">Hair Cologne (1)</a></li>
														<li><a href="#">Hair Color (1)</a></li>
														<li><a href="#">Hair Mask (1)</a></li>
														<li><a href="#">Shampoo (1)</a></li>
														<li><a href="#">Serum (1)</a></li>
														<li><a href="#">Tonic (1)</a></li>
														<li><a href="#">Minyak Kemiri (1)</a></li>
													</ul>
												</div>

												<div class="item menu-sub-drop-primary">
													<div class="tags">Nails (10)</div>
													<div class="clear height-5"></div>
													<div class="height-1"></div>
													<ul>
														<li><a href="#">Treatment (1)</a></li>
														<li><a href="#">Polish (1)</a></li>
														<li><a href="#">opi Mini (1)</a></li>
													</ul>
												</div>

												<div class="item menu-sub-drop-primary">
													<div class="tags">Dental (0)</div>
													<div class="clear height-5"></div>
												</div>

												<div class="item menu-sub-drop-primary">
													<div class="tags">Foot (2)</div>
													<div class="clear height-5"></div>
													<div class="height-1"></div>
													<ul>
														<li><a href="#">Foot Cologne (0)</a></li>
														<li><a href="#">Treatment (1)</a></li>
													</ul>
												</div>

												<div class="item menu-sub-drop-primary">
													<div class="tags">Body (1)</div>
													<div class="clear height-5"></div>
													<div class="height-1"></div>
													<ul>
														<li><a href="#">Bust (1)</a></li>
														<li><a href="#">Butter (1)</a></li>
														<li><a href="#">Body Wash (1)</a></li>
														<li><a href="#">Cream (1)</a></li>
														<li><a href="#">Scrub (1)</a></li>
														<li><a href="#">Lotion (1)</a></li>
													</ul>
												</div>


											</div>
											<!-- /. End Menu drop masonry -->
									</div>
									<div class="right box-h-suggestions w302">
										<div class="title">Our Suggestion:</div>
										<div class="clear height-20"></div>
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/example-sugest.jpg" alt=""></div>
										<div class="clear height-10"></div>
										<div class="left name-sugest">Chanel CC Cream</div>
										<div class="right shp-now"><a href="#" class="bt btn-brown">Shop Now</a></div>
									</div>

								<div class="clear"></div>
							</div>
						</div>
				</li>
				<li><a href="#">Make Up</a></li>
				<li><a href="#">Slimming</a></li>
				<li><a href="#">Whitening</a></li>
				<li><a href="#">Beauty Tool</a></li>
				<li><a href="#">Hair Treatment</a></li>
*/ ?>							
			</ul>
			<div class="clear"></div>
		</div>
		<div class="back-shadow-header-menu"></div>
	</div>
<!-- /. End Menu Header -->