<?php
$contents=$this->cart->contents();
 // echo "<pre>";
 // print_r($contents);
 // exit();
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>welcome/index">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>

							
							<td class="total">Sub Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($contents as $v_contents) {
						 	
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url().$v_contents['options']['image']?>" alt="" width="100px" height="100px"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $v_contents['name']?></a></h4>
								<!-- <p>Web ID: 1089772</p>-->
							</td>
							<td class="cart_price">
								<p>$<?php echo $v_contents['price']?></p>
							</td>
							<form action="<?php echo base_url();?>Cart/update_quantity" method="post">
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input class="cart_quantity_input" type="text" name="qty" value="<?php echo $v_contents['qty']?>" autocomplete="off" size="2">
									<input class="cart_quantity_input" type="hidden" name="rowid" value="<?php echo $v_contents['rowid']?>" autocomplete="off" size="2">
									
									<button type="submit">update</button>
								</div>
							</td>
							</form>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $v_contents['subtotal']?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url()?>Cart/delete_cart/<?php echo $v_contents['rowid']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php }?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php $total=$this->cart->total();
							                                echo $total;?></span></li>
							<li>Eco Tax <span>$<?php
							                     $vat=2*$this->cart->total()/100;
							                     echo $vat;
							                   ?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$
								<?php
			                     $grand_total=$total+$vat;
			                     $sdata=array();
			                     $sdata['g_total']=$grand_total;
			                     $this->session->set_userdata($sdata);
			                     echo $grand_total;
			                      ?>
							                      	
							                      </span></li>
						</ul>
							
							<?php
							$customer_id=$this->session->userdata('customer_id');
							$shipping_id=$this->session->userdata('shipping_id');
							if ($customer_id!=NULL && $shipping_id==NULL) {
							?>
							<a class="btn btn-default check_out" href="<?php echo base_url();?>Checkout/shipping">Check Out</a> 
							<?php 
							 }
							 elseif ($customer_id!=NULL && $shipping_id!=NULL) {
							?>
							<a class="btn btn-default check_out" href="<?php echo base_url();?>Checkout/payment">Check Out</a> 
							<?php 
							 }
							 else{
							 ?>	
							 <a class="btn btn-default check_out" href="<?php echo base_url();?>Checkout/add_registration">Check Out</a>
							 <?php 
							  } 
							 ?>
							
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
