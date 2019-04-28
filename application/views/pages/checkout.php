	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>welcome/index">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1 Checkout method</h2>
			</div>

			<div class="shopper-informations">
				<div class="row">
					
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Create new customer</p>
							<div class="form-one">
								<form action="<?php echo base_url()?>Checkout/save_customer" method="post">
									<input type="text" placeholder="First Name *" name="first_name">
									<input type="text" placeholder="Last Name *" name="last_name">
									<input type="text" placeholder="Email*" name="email_address">
									<input type="password" placeholder="password*" name="password">
									
									<input class="btn btn-primary" type="submit" name="submit" value="Register_customer">
								</form>
							</div>
					
						</div>
					</div>
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Returning Login Your Account</p>
							 <?php
						  $exception1 = $this->session->userdata('exception1');
						  if($exception1){
						  echo $exception1;
						  $this->session->unset_userdata('exception1');
						}
						?>
					</h2>
					<h2 style="color: red">
                     <?php
						  $massege = $this->session->userdata('massege');
						  if($massege){
						  echo $massege;
						  $this->session->unset_userdata('massege');
						}
						?>
					</h2>
							<form action="<?php echo base_url();?>Checkout/customer_login_check" method="post">
								<input type="text" placeholder="Email Address" name="email">
								<input type="password" placeholder="Password" name="password">
								<input type="submit" class="btn btn-primary" name="submit" value="submit">
							</form>
							
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
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
