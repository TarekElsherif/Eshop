<?php
		session_start();
		$query = "SELECT * FROM products ";
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
<html>
<head>
	<title>Products</title>
</head>
<body>
<?php
foreach ($products as $product) 
{
?>	
<div>
	<?php
		echo '<img src="' .$product['picture']. '" height="150" width="150"/>';
	?>	
	<div> <?php
				echo $product['name'];
			?>
			<br>	
				<?php
				echo $product['price'];
			?>
			<br>
			<?php
				echo $product['quantity'];
		  ?>
	</div>
	<form action="" method="POST" >
	Quantity:
	<input name="quantity" type="text"><br><br>
	<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>
	<?php echo '<input type="hidden" name="available_quantity" id="available_quantity" value="'. $product['quantity'].' "> '?>

	<button type="submit">Add to Cart</button>
	</form>
</div>
<?php }
$cart=$_SESSION['current_user_cart'];
$counter=$_SESSION['counter'];

if (isset($_POST['product_id'])) 
{	
	$available_quantity=$_POST['available_quantity'];
	$product_id= $_POST['product_id'];
	if( $available_quantity>= $_POST['quantity'])
	{
		// $available_quantity= $available_quantity - $_POST['quantity'];
		// mysqli_query($con,"UPDATE products SET quantity='$available_quantity' WHERE product_id = '$product_id' ");
		$cart[$counter]['product_id'] = $_POST['product_id'];
		$cart[$counter]['user_id'] = $_SESSION['current_user_id'];
		$cart[$counter]['quantity'] = $_POST['quantity'];
		$counter++;
	}else
	{
			$message = "The quantity you requested is not available";
			echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
$_SESSION['counter'] = $counter;
$_SESSION['current_user_cart'] = $cart;

?>
</body>
</html>