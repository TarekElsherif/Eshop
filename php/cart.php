<?php
	session_start();
	$cart=$_SESSION['current_user_cart'];
	$con = mysqli_connect("localhost","root","","eshop");

	foreach ($cart as $purchase)
	{	
		$id = $purchase['product_id'];
		$query = "SELECT * FROM products where product_id = '$id'";
		$result = $con->query($query);
		$product = mysqli_fetch_assoc($result);
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>
<div>
	<?php
		echo '<img src="' .$product['picture']. '" height="150" width="150"/>';
	?>	
	<div> <?php
				echo "Product name: " . $product['name'];
			?>
			<br>	
				<?php
				echo "Price: " . $product['price'];
			?>
			<br>
			<?php
				echo $purchase['quantity'];
		  ?>
	</div>
<!-- 	<form action="" method="POST" >
			<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>
			<?php echo '<input type="hidden" name="available_quantity" id="available_quantity" value="'. $product['quantity'].' "> '?>

			<button type="submit">Add to Cart</button>
		</form> -->
</div>
<?php
} 
?>

<form action="" method="POST" >	
<button type="submit" name = "submit">Checkout</button>

<?php
	if (isset($_POST['submit'])) 
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

		}	
	}
?>
