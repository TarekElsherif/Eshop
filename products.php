<?php
	session_start();
	$query = "SELECT * FROM products ";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Products | eShop</title>
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
								<li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['current_user_fname']; ?></a></li>
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
								<li><a href="index.php">Home</a></li>
								<li><a href="products.php" class="active">Products</a></li>
								<li><a href="about.php">About</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->

		<!-- CONTENT START -->
	
	<section id="advertisement">
		<div class="container">
			<!-- <img src="images/shop/advertisement.jpg" alt="" /> -->
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>

						<?php foreach ($products as $product) { ?>	
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php
										if ($product['quantity']==0) 
											{ echo '<img src="' .$product['picture']. '"style="opacity: 0.4;"/>';
											?>
											<?php
											} else
											{ echo '<img src="' .$product['picture']. '"/>'; } 
										?>
										<h2><?php echo $product['price']; ?> LE</h2>
										<p><?php echo $product['name']; ?></p>
										<form action="product-details.php" method="POST" >
											<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>									
											<button type="submit" name="Add" class="btn btn-default add-to-cart"><i class="fa fa-tag"></i>Check</button>
										</form>
										<?php if ($product['quantity']==0) { ?>
										<a class="btn btn-default add-to-cart"><i class="fa fa-frown-o"></i>Sold Out</a>
										<?php } ?>

									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $product['price']; ?> LE</h2>
											<p><?php echo $product['name']; ?></p>
											<form action="product-details.php" method="POST" >
												<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>									
												<button type="submit" name="Add" class="btn btn-default add-to-cart"><i class="fa fa-tag"></i>Check</button>
											</form>
												<?php if ($product['quantity']==0) { ?>
										    <a class="btn btn-default add-to-cart"><i class="fa fa-frown-o"></i>Sold Out</a>
										    <?php } ?>
											</div>
									</div>
								</div>
							</div>
						</div>
						<?php }?>

					</div><!--features_items-->
			</div>
		</div>
	</section>

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