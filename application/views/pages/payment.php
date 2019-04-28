	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>welcome/index">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

		

			<div class="payment-options">
			<form action="<?php echo base_url()?>Checkout/confirm_order" method="post">
					<span>
						<label><input type="radio" name="payment_method" value="cash_on_delivery"> Cash on delivery</label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" value="ssl_comerze"> SSL Comerze</label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" value="paypal"> Paypal</label>
					</span><br><br>
					<input type="submit" name="submit" value="submit" class="btn btn-primary">
			</form>		
				</div>
		</div>
	</section> <!--/#cart_items-->
