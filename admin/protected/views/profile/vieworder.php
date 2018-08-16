<div class="clear height-30"></div>
<div class="container-inside">
	<div class="inside-content">
		
		<div class="clear height-20"></div>
		<!-- /. Start Content About -->
		<div class="m-ins-content detail-shopcart">
			<div class="left title-shop-cart">Order ID: <?php echo $modelOrder->nota ?></div>
			<div class="clear height-3"></div>
			<div class="lines-green"></div>
			<div class="clear height-20"></div>
			<h4>Status: <?php echo strtoupper($modelOrder->status) ?></h4>
			<div class="lines-green"></div>

			<p>

<b>Shipping address</b><br>
<?php echo $modelOrder->first_name ?> <?php echo $modelOrder->last_name ?><br>
<?php echo $modelOrder->address ?><br>
<?php echo $modelOrder->city ?><br>
<?php echo $modelOrder->province ?> <?php echo $modelOrder->postcode ?><br>
Mobile phone : <?php echo $modelOrder->hp ?><br>
Pin BB : <?php echo $modelOrder->bb ?><br>
			</p>

			    <table class="table table-hover shopcart">
			    	<thead>
			    		<tr>
			    			<td>Item</td>
			    			<td>&nbsp;</td>
			    			<td>Option / Variant</td>
			    			<td>Quantity</td>
			    			<td><b>Total</b></td>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		<?php $total = 0 ?>
			    		<?php foreach ($data as $key => $value): ?>
			    		<tr>
			    			<td>
			    				<div class="left pic">
			    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(139,95, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
			    				</div>
			    			</td>
			    			<td>
			    				<span class="title">
			    					<?php echo $value['name'] ?> @Rp <?php echo Product::money($value['price']) ?>,-
			    				</span>
			    			</td>
			    			<td>
			    				<span class="varian"><?php echo $value['option'] ?></span>
			    			</td>
			    			<td>
			    				<form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
			    					<input type="hidden" value="<?php echo $value['id'] ?>" name="product_id">
			    					<input type="hidden" value="<?php echo $value['option'] ?>" name="option">
				    				<span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
			    				</form>
			    			</td>
			    			<td>
			    				<b>Rp <?php echo Product::money($subTotal = $value['price'] * $value['qty']) ?>,-</b>
			    			</td>
			    		</tr>
			    		<?php $total = $total + $subTotal ?>
			    		<?php endforeach ?>
			    	</tbody>
				</table>

				<div class="clear height-0"></div>
				<div class="lines-green"></div>
				<div class="clear height-15"></div>


				<div class="right box-total">
					<table class="table borderless">
						<tr>
							<td>Subtotal</td>
							<td>Rp <?php echo Product::money($total) ?>,-</td>
						</tr>
						<tr>
							<td>Ongkos Kirim</td>
							<td>GRATIS</td>
						</tr>
						<tr class="clear height-5"></tr>
						<tr class="double-border">
							<td class="total"><b>TOTAL</b></td>
							<td class="price-total"><b>Rp <?php echo Product::money($total) ?>,-</b></td>
						</tr>
					</table>
				</div>

				<div class="clear height-50"></div>
				<div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/profile/index')); ?>" class="bt btn-brown">Back</a></div>



			<div class="clear height-25"></div>
			<div class="clear"></div>
		</div>
		<!-- /. End Content About -->

		<div class="clear height-15"></div>

		<?php echo $this->renderPartial('//layouts/_sc_join_community', array()); ?>
		
		<div class="clear height-15"></div>

	<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
