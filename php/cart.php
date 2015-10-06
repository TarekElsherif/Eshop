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
</div>
<?php
} 
?>

<form action="" method="POST" >	
<button type="submit" name = "Checkout">Checkout</button>
<button type="submit" name = "Clear" >Clear Cart</button>
<button type="submit" name = "Products" >Products</button>
</form>
<?php
if(isset($_POST['Clear']))
{
	$_SESSION['current_user_cart']=array();
	$_SESSION['counter']=0;	
	$message = "Process Completed";
	echo "<script type='text/javascript'>alert('$message'); window.location = 'welcome.php';</script>";
}
?>
<?php
if(isset($_POST['Products']))
{
	header("location: products.php");
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
				echo "<script type='text/javascript'>alert('$message'); window.location = 'welcome.php';</script>";
			}	
?>
</body>
</html>
