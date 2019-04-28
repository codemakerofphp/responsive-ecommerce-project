<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="<?php echo base_url();?>asset/site/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/site/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/site/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/site/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/site/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/site/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/site/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>asset/site/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>asset/site/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url();?>asset/site/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>asset/site/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>asset/site/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>asset/site/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>asset/site/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url();?>welcome/index"><img src="<?php echo base_url();?>asset/site/images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
								<li><a href="<?php echo base_url()?>Checkout/add_registration"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="<?php echo base_url();?>Cart/show_cart"><i class="fa fa-shopping-cart"></i>Shopping Cart(<?php echo $this->cart->total_items() ?>)</a></li>
								
								<?php
								$customer_name=$this->session->userdata('first_name');
								if ($customer_name!=NULL) {
								?>	
								
								<li><a href="#"><i class="fa fa-crosshairs"></i><?php echo $customer_name; ?> </a></li>
								<?php
							    }
								?>
							<?php	
							$customer_id=$this->session->userdata('customer_id');

							if ($customer_id!=NULL) {
							?>
							<li><a href="<?php echo base_url();?>Checkout/customer_logout"><i class="fa fa-lock"></i> Logout</a></li>
							<?php 
							 }else{
							 ?>	
							<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							 <?php 
							  } 
							 ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<?php
						$this->db->select('*');
						$this->db->from('tbl_category');
						$this->db->where('category_status',1);
						$query_result=$this->db->get();
						$allPublishedCategory=$query_result->result();

						?>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<?php
								foreach ($allPublishedCategory as $all_category) {
							    ?>
                                 <li><a href="<?php echo base_url();?>Welcome/product_category/<?php echo $all_category->category_id?>" class="active"><?php echo $all_category->category_name; ?></a></li>
								
								<?php }?>
								
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<?php
	if (isset($slider)) {
	?>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>ASUS </h1>
									<h2>ASUS VivoBook 15 X505BP</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>asset/site/images/home/images.jpg" class="girl img-responsive" alt="" />
									<img src="<?php echo base_url();?>asset/site/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1>APPLE</h1>
									<h2>MacBook</h2>
									<p>Based on our testing, our top pick for most people is the new MacBook Air. It packs a vivid Retina Display, a slimmer design with thinner  </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>asset/site/images/home/rr.jpg" class="girl img-responsive" alt="" />
									<img src="<?php echo base_url();?>asset/site/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1>DELL LAPTOPS</h1>
									<h2>Dell Inspiron 14-3480 8th Gen</h2>
									<p>Based on our testing, our top pick for most people is the new MacBook Air. It packs a vivid Retina Display, a slimmer design with thinner </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>asset/site/images/home/xps15.png" class="girl img-responsive" alt="" />
									<img src="<?php echo base_url();?>asset/site/images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<?php }?>
	<section>
		<div class="container">

			<div class="row">
				<?php if (isset($brand_category)) { ?>
				<div class="col-sm-3">
					
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
							$this->db->select('*');
							$this->db->from('tbl_category');
							$this->db->where('category_status',1);
							$query_result=$this->db->get();
							$allPublishedCategory=$query_result->result();

							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<?php
									foreach ($allPublishedCategory as $all_category) {
								    ?>
									<h4 class="panel-title"><a href="<?php echo base_url();?>Welcome/product_category/<?php echo $all_category->category_id?>"><?php echo $all_category->category_name; ?></a></h4>
								<?php
								echo "<br>"; 
								 }
								 ?>

								</div>
							</div>
						</div><!--/category-products-->
	                    <?php
						$this->db->select('*');
						$this->db->from('tbl_manufacturer');
						//$this->db->where('category_status',1);
						$query_result=$this->db->get();
						$allPublishedbrand=$query_result->result();

						?>
	                   			
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php
									foreach ($allPublishedbrand as $value) {
									?>
									<li><a href="<?php echo base_url();?>Welcome/get_manufacturer_product/<?php echo $value->manufacturer_id?>"> <span class="pull-right">(50)</span><?php echo $value->manufacturer_name; ?></a></li>
									
									<?php
								    }
									?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
					
					</div>

				</div>
				<?php } ?>
				<div class="col-sm-9 padding-right">
					<?php echo $maincontent;?>
                    

                    <?php
					if (isset($recommended)) {
					
					echo $recommended_page;
					

					
					 } ?>
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
	
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url();?>asset/site/js/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/site/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/site/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>asset/site/js/price-range.js"></script>
    <script src="<?php echo base_url();?>asset/site/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>asset/site/js/main.js"></script>
</body>
