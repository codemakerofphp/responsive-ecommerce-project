<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
						foreach ($published_product as $v_product) {

						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center"><a href="">
											<img src="<?php echo base_url().$v_product->product_image?>" alt="" height='150px' width='170px' /></a>
											<h2>$<?php echo $v_product->product_price?></h2>
											<p><?php echo $v_product->product_name?></p>
											<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<a href="<?php echo base_url();?>Welcome/product_details/<?php echo $v_product->product_id?>"><img src="<?php echo base_url().$v_product->product_image?>" alt="" height='150px' width='170px' /></a>
												<h2>$<?php echo $v_product->product_price?></h2>
												<p><?php echo $v_product->product_name?></p>
												<a href="<?php echo base_url();?>Welcome/product_details/<?php echo $v_product->product_id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
					<?php } ?>

						
					
						
						
						
						
					</div><!--features_items-->