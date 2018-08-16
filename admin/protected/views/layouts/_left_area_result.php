<?php
$dataArea = $_GET['area'];
if ($cekArea === 'subarea') {
	$dataArea = TbArea::model()->findByPk($_GET['area'])->parent_id;
	$subArea = TbArea::model()->findAll('parent_id = :parent_id', array(':parent_id'=>$dataArea));
	$dataSubArea = $_GET['area'];
} else {
	$subArea = TbArea::model()->findAll('parent_id = :parent_id', array(':parent_id'=>$_GET['area']));
	$dataSubArea = '';
}

$area = TbArea::model()->findAll('parent_id = :parent_id', array(':parent_id'=>'0'));

$listArea = array();
$urlArea = $_GET;
unset($urlArea['tag']);
unset($urlArea['area']);
unset($urlArea['jenis']);
$listArea[] = array(
	'nama'=>'Semua Area',
	'check'=>($dataArea == '') ? 1 : 0,
	'url'=>$this->createUrl('/listing/index', $urlArea),
);
foreach ($area as $key => $value) {
	$urlArea['area'] = $value->id;
	$listArea[] = array(
		'nama'=>$value->nama,
		'check'=>($dataArea === $value->id) ? 1 : 0,
		'url'=>$this->createUrl('/listing/index', $urlArea),
	);
}

$listSubArea = array();
$urlSubArea = $_GET;
unset($urlSubArea['tag']);
unset($urlSubArea['jenis']);
$urlSubArea['area'] = $dataArea;
$listSubArea[] = array(
	'nama'=>'Semua SubArea',
	'check'=>($dataSubArea == '') ? 1 : 0,
	'url'=>$this->createUrl('/listing/index', $urlSubArea),
);
foreach ($subArea as $key => $value) {
	$urlSubArea['area'] = $value->id;
	$listSubArea[] = array(
		'nama'=>$value->nama,
		'check'=>($dataSubArea === $value->id) ? 1 : 0,
		'url'=>$this->createUrl('/listing/index', $urlSubArea),
	);
}

$listJenis = array();
$urlJenis = $_GET;
unset($urlJenis['tag']);
unset($urlJenis['jenis']);
$listJenis[] = array(
	'nama'=>'Semua Jenis Usaha',
	'check'=>($_GET['jenis'] == '') ? 1 : 0,
	'url'=>$this->createUrl('/listing/index', $urlJenis),
);
$jenis = TbJenisUsaha::model()->findAll();
foreach ($jenis as $key => $value) {
	$urlJenis['jenis'] = $value->id;
	$listJenis[] = array(
		'nama'=>$value->nama,
		'check'=>($_GET['jenis'] === $value->id) ? 1 : 0,
		'url'=>$this->createUrl('/listing/index', $urlJenis),
	);
}

?>
<!-- /. left content -->
<div class="left w258">
	<!-- /. sub area -->
	<div class="box-left-ft-area">
			<div class="top">
				<div class="padd">
					<div class="clear height-10"></div>
					<div class="clear height-1"></div>
					<div class="titl left">Area</div>
					<div class="right dt-ic-clpsearea"><a href="#" class="act-colpse-hd" data-id="areas"><i class="icon-collapse-area"></i></a></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="middle" id="areas">
				<div class="padd">
					<div class="list">
						<?php foreach ($listArea as $key => $value): ?>
						<label class="checkbox">
							<a href="<?php echo $value['url'] ?>" class="ic-checklist <?php echo ($value['check']===1)?'active':'' ?>" >
								<?php echo ($value['check'] === 1)?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>' ?>&nbsp;<?php echo $value['nama'] ?>
							</a>
						</label>
						<?php endforeach ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		<div class="clear"></div>
	</div>
	<!-- /. End sub area -->
	<div class="clear height-15"></div>
	
	<?php if ($_GET['area'] != ''): ?>
	<!-- /. sub area -->
	<div class="box-left-ft-area">
			<div class="top">
				<div class="padd">
					<div class="clear height-10"></div>
					<div class="clear height-1"></div>
					<div class="titl left">Sub Area</div>
					<div class="right dt-ic-clpsearea"><a href="#" class="act-colpse-hd" data-id="subarea"><i class="icon-collapse-area"></i></a></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="middle" id="subarea">
				<div class="padd">
					<div class="list">
						<?php foreach ($listSubArea as $key => $value): ?>
						<label class="checkbox">
							<a href="<?php echo $value['url'] ?>" class="ic-checklist <?php echo ($value['check']===1)?'active':'' ?>" >
								<?php echo ($value['check'] === 1)?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>' ?>&nbsp;<?php echo $value['nama'] ?>
							</a>
						</label>
						<?php endforeach ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		<div class="clear"></div>
	</div>
	<!-- /. End sub area -->
	<div class="clear height-15"></div>
	<?php endif; ?>

	<!-- /. sub area -->
	<div class="box-left-ft-area">
			<div class="top">
				<div class="padd">
					<div class="clear height-10"></div>
					<div class="clear height-1"></div>
					<div class="titl left">Jenis Usaha</div>
					<div class="right dt-ic-clpsearea"><a href="#" class="act-colpse-hd" data-id="subarea"><i class="icon-collapse-area"></i></a></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="middle" id="subarea">
				<div class="padd">
					<div class="list">
						<?php foreach ($listJenis as $key => $value): ?>
						<label class="checkbox">
							<a href="<?php echo $value['url'] ?>" class="ic-checklist <?php echo ($value['check']===1)?'active':'' ?>" >
								<?php echo ($value['check'] === 1)?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>' ?>&nbsp;<?php echo $value['nama'] ?>
							</a>
						</label>
						<?php endforeach ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		<div class="clear"></div>
	</div>
	<!-- /. End sub area -->
	<div class="clear height-15"></div>

	<!-- /. Suggested Keyword -->
	<div class="box-left-ft-area">
			<div class="top">
				<div class="padd">
					<div class="clear height-10"></div>
					<div class="clear height-1"></div>
					<div class="titl left">Suggested Tag</div>
					<div class="right dt-ic-clpsearea"><a href="#" class="act-colpse-hd" data-id="sugges"><i class="icon-collapse-area"></i></a></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="middle" id="sugges">
				<div class="padd">
					<div class="box-search-keyword w195">
						<?php 
						$linkTag = $_GET;
						unset($linkTag['tag']);
						?>
						<div class="list-key"><a href="<?php echo $this->createUrl('/listing/index', $linkTag); ?>" class="item-kword <?php echo ($_GET['tag']=='')?'active':'' ?>">Semua</a></div>
						
						<?php foreach ($tag as $key => $value): ?>
						<?php 
						$linkTag = $_GET;
						$linkTag['tag'] = $value->tag;
						?>
						<div class="list-key"><a href="<?php echo $this->createUrl('/listing/index', $linkTag); ?>" class="item-kword <?php echo ($_GET['tag']==$value->tag)?'active':'' ?>"><?php echo $value->tag ?></a></div>
						
						<?php endforeach ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		<div class="clear"></div>
	</div>
	<!-- /. End Suggested Keyword -->
	
	<?php /*
	<div class="clear height-15"></div>

	<!-- /. klasifikasi -->
	<div class="box-left-ft-area">
			<div class="top">
				<div class="padd">
					<div class="clear height-10"></div>
					<div class="clear height-1"></div>
					<div class="titl left">klasifikasi</div>
					<div class="right ic-colpse"><a href="#" class="icon-collapse-area"></a></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="middle">
				<div class="padd">
					<div class="list">

						<label class="checkbox">
							<input type="checkbox" value="">Semua Masakan
						</label>
						<label class="checkbox">
							<input type="checkbox" value="">Masakan Jepang
						</label>
						<label class="checkbox">
							<input type="checkbox" value="">Masakan Western
						</label>
						<label class="checkbox">
							<input type="checkbox" value="">Masakan India
						</label>
						<label class="checkbox">
							<input type="checkbox" value="">Masakan Korea
						</label>

						<div class="clear"></div>
					</div>
				</div>
			</div>
		<div class="clear"></div>
	</div>
	<!-- /. End klasifikasi -->
	*/ ?>

	<div class="clear height-15"></div>

	<div class="box-green-score">
		<div class="padd">
			<div class="clear height-20"></div>
			<div class="titl tcenter">Panduan nilai / rating</div>
			<div class="clear height-10"></div>
			<div class="height-2"></div>
			<div class="tcenter w177 prelatif">
				<!-- <img src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/bc-how-to-score.png" alt=""> -->
				<div class="inline-range-left-slider">
				  <label for="amount">Rating range:</label>
				  <input type="text" id="amount" style="border:0; color: #27b26c; font-weight: 100;">
				</div>
				<div id="slider-range"></div>
			</div>
		</div>
	</div>
	<div class="clear height-50"></div>

	<div class="clear"></div>
</div>
<!-- /. End left content -->