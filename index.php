<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | eShop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">      
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<?php if (isset($_SESSION['current_user'])) { ?>
								<li><a href="editprofile.php"><i class="fa fa-user"></i> <?php echo $_SESSION['current_user_fname']; ?></a></li>
								<?php } ?>

								<?php if (isset($_SESSION['current_user'])) { ?>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php } else { ?>
								<li><a href="authentication.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php } ?>

								<?php if (isset($_SESSION['current_user'])) { ?>
								<li><form action="logout.php" method="get">
								<button action="logout.php" method="get" type="submit"><i class="fa fa-lock"></i> Logout</button>
								</form></li>
								<?php } else { ?>
								<li><a href="authentication.php"><i class="fa fa-lock"></i> Login</a></li>
								<?php } ?>

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
						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="products.php">Products</a></li>
								<li><a href="about.php">About</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->

		<!-- CONTENT START -->
	
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
									<h1><span>E</span>SHOP</h1>
									<h2>Best Products</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/fashion4.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>SHOP</h1>
									<h2>Amazing Designs</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/fashion1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>SHOP</h1>
									<h2>Best Prices</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
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
			<br>
		</div>
		<div class="container">
			<div class="row">
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">New Products</h2>
						<?php 
							$query = "SELECT * FROM products ORDER BY product_id ASC lIMIT 3; ";
							$con = mysqli_connect("localhost","root","","eshop");
							$result = $con->query($query);
							$products = array();
							$i=0;
							$product_id;
							$available_quantity;
							while($row = mysqli_fetch_assoc($result))
							{
								$products[$i]= $row;
								$i++;
							}

						?>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php foreach ($products as $product) { ?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<?php echo '<img src="' .$product['picture']. '"/>'; ?>
													<h2><?php echo $product['price']; ?> LE</h2>
													<p><?php echo $product['name']; ?></p>
													<form action="product-details.php" method="POST" >
														<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>									
														<button type="submit" name="Add" class="btn btn-default add-to-cart"><i class="fa fa-tag"></i>Check</button>
														<?php if ($product['quantity']==0) { ?>
															<a class="btn btn-default add-to-cart"><i class="fa fa-frown-o"></i>Sold Out</a>
														<?php } ?>
													</form>
												</div>
												
											</div>
										</div>
									</div>
							<?php } ?>
							</div>
							<div class="item">
								<?php foreach ($products as $product) { ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<?php echo '<img src="' .$product['picture']. '"/>'; ?>
													<h2><?php echo $product['price']; ?> LE</h2>
													<p><?php echo $product['name']; ?></p>
													<form action="product-details.php" method="POST" >
														<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>									
														<button type="submit" name="Add" class="btn btn-default add-to-cart"><i class="fa fa-tag"></i>Check</button>
														<?php if ($product['quantity']==0) { ?>
															<a class="btn btn-default add-to-cart"><i class="fa fa-frown-o"></i>Sold Out</a>
														<?php } ?>
													</form>
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
			</div>
		</div>
	</section><!--/slider-->

	<!-- CONTENT END -->
	
	<section>
	<br>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> info@shop.com</a></li>
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
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 eShop Inc. All rights reserved.</p>
					<p class="pull-right">Advanced Media Lab Project</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>