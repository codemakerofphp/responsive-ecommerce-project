<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php
									foreach ($recommended_product as $v_product) {

									?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="<?php echo base_url();?>Welcome/product_details/<?php echo $v_product->product_id?>"><img src="<?php echo base_url().$v_product->product_image?>" alt="" /></a>
													<h2>$<?php echo $v_product->product_price?></h2>
													<p><?php echo $v_product->product_name?></p>
													<a href="<?php echo base_url();?>Welcome/product_details/<?php echo $v_product->product_id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								<?php } ?>
								
								</div>
								<div class="item">	
									<?php
									foreach ($recommended_product as $v_product) {

									?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="<?php echo base_url();?>Welcome/product_details/<?php echo $v_product->product_id?>"><img src="<?php echo base_url().$v_product->product_image?>" alt="" /></a>
													<h2>$<?php echo $v_product->product_price?></h2>
													<p><?php echo $v_product->product_name?></p>
													<a href="<?php echo base_url();?>Welcome/product_details/<?php echo $v_product->product_id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								<?php } ?>
								
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->