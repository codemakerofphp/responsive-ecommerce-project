	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>welcome/index">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Enter Shipping Information</h2>
			</div>

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Shipping</p>
							<div class="form-one">
								<form action="<?php echo base_url()?>Checkout/save_shipping" method="post">
									<input type="text" placeholder="Name *" name="name">
									
									<input type="text" placeholder="Email*" name="email_address">
									<input type="text" placeholder="Address 1 *" name="address">
									<input type="text" placeholder="Mobile Number" name="mobile_number">
									<input type="text" placeholder="City" name="city">
									<select name="country">
										<option>-- Country --</option>
										<option value="1">United States</option>
										<option value="2">Bangladesh</option>
										<option value="3">UK</option>
										<option value="4">India</option>
										<option value="5">Pakistan</option>
										<option value="6">Ucrane</option>
										<option value="7">Canada</option>
										<option value="8">Dubai</option>
									</select>
									<br>
									<br>
									<input type="text" placeholder="zipcode" name="zipcode">
									<input class="btn btn-primary" type="submit" name="submit" value="Register Shipping">
								</form>
							</div>
					
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			
			
		</div>
	</section> <!--/#cart_items-->
