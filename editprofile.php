<?php
	include("editprofile_engine.php");
	$user_id= $_SESSION['current_user_id'];
	$query = "SELECT * FROM purchases WHERE user_id ='$user_id' ";
	$con = mysqli_connect("localhost","root","","eshop");
	$result = $con->query($query);
	$products = array();
	$i=0;
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
								<li><a href="index.php">Home</a></li>
								<li><a href="products.php">Products</a></li>
								<li><a href="about.php">About</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->

		<!-- CONTENT START -->

		<section id="form"><!--form-->
		<div class="container">
		    <div class="row">
 			  </div>
 		</div>

		<div class="container">
		<div class="row">
		<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="">
								<?php echo '<img src="' . $_SESSION['current_user_avatar'] . '" class="circular"' ?>
							</div>

						</div>
							<div class="product-information"><!--/product-information-->
								<p>
								<strong>Name:</strong> <?php echo $_SESSION['current_user_fname'] . " " . $_SESSION['current_user_lname']; ?>
								<br>
								<strong>Email:</strong> <?php echo $_SESSION['current_user']; ?>
								</p>
							</div><!--/product-information-->
			</div><!--/product-details-->
		<div class="signup-form col-md-4"><!--edit form-->
			<h2>Edit Profile</h2>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				First name:
				<input name="fname" type="text" placeholder="First Name">
				Last name:
				<input name="lname" type="text" placeholder="Last Name">
				Email:
				<input name="email" placeholder="Email" type="text" placeholder="Email">
				Password:
				<input name="password" type="password" placeholder="Password">
				Avatar:
    		<input type="file" name="avatar" id="avatar"><br>
				<button type="submit" class="btn btn-default">Update</button>
				<br>
			</form>
		</div><!--/edit form-->
		</div>
		</div>
		</section>
		
		<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">History</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php	
							foreach ($products as $product) 
								{
									$product_id=$product['product_id'];
									$query = "SELECT * FROM products WHERE product_id ='$product_id' ";
									$result = $con->query($query);
									$row = mysqli_fetch_assoc($result);
						?>
						<tr>
							<td class="cart_product">
								<?php echo '<img src="' .$row['picture']. '" height="150" width="150"/>'; ?>
							</td>
							<td class="cart_description">
								<h4><?php echo $row['name']; ?></h4>
								<p>Product ID: <?php echo $row['product_id']; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $row['price']; ?> LE</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<label>Quantity:</label>
									<?php echo  $product['quantity'];?>								
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
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