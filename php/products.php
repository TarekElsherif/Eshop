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
	if ($product['quantity']==0) 
	{
		echo '<img src="' .$product['picture']. '" style="width: 150px;height: 150px; opacity: 0.4;"/>';
		?>
		<a> Sold Out</a>
	<?php
	}else
	{
		echo '<img src="' .$product['picture']. '" height="150" width="150"/>';
	}
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
				$available_quantity=$product['quantity'];
		  ?>
	</div>
	<form action="" method="POST" >
	Quantity:
	<input name="quantity" type="text"><br><br>
	<?php echo '<input type="hidden" name="product_id" id="product_id" value="'. $product['product_id'].' "> '?>
	<button type="submit" name="Add" >Add to Cart</button>
	</form>
</div>
<?php 
}?>
<form method="POST">
<button type="submit" name="cart">Go To Cart</button>
</form>
<?php
if (isset($_POST['cart'])) 
{
	header("location: cart.php");
}
$cart=$_SESSION['current_user_cart'];
$counter=$_SESSION['counter'];

if (isset($_POST['Add'])) 
{	
	if (!isset($_SESSION['current_user'])) 
		{
			$message = "You Must Login First";
			echo "<script type='text/javascript'>alert('$message'); window.location = 'authentication.php';</script>";
		}else
		{
				$required_quantity= $_POST['quantity'];
				$flag=0;
				if( $available_quantity>=$required_quantity)
				{
					
					for ($j=0; $j <$counter ; $j++) 
					{ 
						if($_POST['product_id']==$cart[$j]['product_id'])
						{
							$cart[$j]['quantity'] =$cart[$j]['quantity']+$required_quantity ;
							$flag=1;
						}
					}
					if($flag==0)
					{
						$cart[$counter]['product_id'] = $_POST['product_id'];
						$cart[$counter]['user_id'] = $_SESSION['current_user_id'];
						$cart[$counter]['quantity'] = $_POST['quantity'];
						$counter++;
					}
				}else
				{
						$message = "The quantity you requested is not available";
						echo "<script type='text/javascript'>alert('$message');</script>";
				}
		}
}
$_SESSION['counter'] = $counter;
$_SESSION['current_user_cart'] = $cart;

?>
</body>
</html>