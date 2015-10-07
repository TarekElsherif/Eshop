<?php
	session_start();
	$cart=$_SESSION['current_user_cart'];
	$con = mysqli_connect("localhost","root","","eshop");
	$totalprice =0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | eShop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/pcard.css" rel="stylesheet">
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

								</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>

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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
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
							foreach ($cart as $purchase)
							{	
								$id = $purchase['product_id'];
								$query = "SELECT * FROM products where product_id = '$id'";
								$result = $con->query($query);
								$product = mysqli_fetch_assoc($result);
								$totalprice = $totalprice + ($purchase['quantity']*$product['price']);
						?>
						<tr>
							<td class="cart_product">
								<?php echo '<img src="' . $product['picture'] . '" height="150" width="150"/>'; ?>
							</td>
							<td class="cart_description">
								<h4><?php echo $product['name']; ?></h4>
								<p>Product ID: <?php echo $product['product_id']; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $product['price']; ?> LE</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<label>Quantity:</label>
									<?php echo  $purchase['quantity'];?>								
								</div>
							</td>
						</tr>
						<?php } ?>
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
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><?php echo $totalprice ?></span></li>
						</ul>
							<form action="" method="POST" >	
								<button type="submit" name = "Checkout" class="btn btn-default check_out">Checkout</button>
								<button type="submit" name = "Clear" class="btn btn-default check_out">Clear Cart</button>
							</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
			<!-- backend -->
		<?php
		if(isset($_POST['Clear']))
		{
			$_SESSION['current_user_cart']=array();
			$_SESSION['counter']=0;	
			$message = "Process Completed";
			echo "<script type='text/javascript'>alert('$message'); window.location = 'products.php';</script>";
		}
		?>
		<?php
			if (isset($_POST['Checkout'])) 
			{
				$totalprice =0;
				foreach ($cart as $purchase) 
				{
					$id = $purchase['product_id'];
					$query = "SELECT * FROM products where product_id = '$id'";
					$result = $con->query($query);
					$product = mysqli_fetch_assoc($result);
					$totalprice = $totalprice + ($purchase['quantity']*$product['price']);
				}
		?>
				<?php $message = "Total Price :".$totalprice; echo "<script type='text/javascript'>alert('$message');</script>"; ?>
				<form action="" method="POST" >	
				<button type="submit" name = "Confirm">Confirm</button>
				</form>
		<?php
			}
		?>
		<?php
					if(isset($_POST['Confirm']))
					{
						foreach ($cart as $purchase)
						{	
							$id = $purchase['product_id'];
							$query = "SELECT * FROM products where product_id = '$id'";
							$result = $con->query($query);
							$product = mysqli_fetch_assoc($result);
					 		$available_quantity=  $product['quantity'] - $purchase['quantity'];
							mysqli_query($con,"UPDATE products SET quantity='$available_quantity' WHERE product_id = '$id' ");
							$current_user = $_SESSION['current_user_id']; 
							$quantity = $purchase['quantity'];
							mysqli_query($con,"INSERT INTO purchases (user_id, product_id, quantity) VALUES  ('$current_user', '$id', '$quantity' ) ");
							$_SESSION['current_user_cart']=array();
							$_SESSION['counter']=0;
						}
						$message = "Thank You For Shopping";
						echo "<script type='text/javascript'>alert('$message'); window.location = 'products.php';</script>";
					}	
		?>

	    		<!-- CONTENT END -->

	<section>
	<br>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="header_top"> <!--header_top-->
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