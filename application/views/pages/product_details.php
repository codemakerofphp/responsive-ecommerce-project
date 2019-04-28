<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url().$product_info->product_image?>" width="170px" height="100px" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $product_info->product_name?></h2>
								
								<span>
									<span>US $<?php echo $product_info->product_price?></span>
									<form action="<?php echo base_url();?>Cart/add_to_cart" method="post">
									
									<label>Quantity:</label>
									<input type="text" value="1" name="qut" />
									<input type="hidden" value="<?php echo $product_info->product_id?>" name="product_id" />
									 <button type="submit" class="btn btn-fefault cart" > 
										<i class="fa fa-shopping-cart"></i>
										Add to cart 
									</button>
									</form>
								</span>
								<p><b>Availability:</b> 
								<?php
								 if($product_info->product_quantity>0){
								 	echo "In Stock";
        
		         					}else{
		         						echo "Out Stok";
		         					} ?>
							</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> <?php echo $product_info->manufacturer_name?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->