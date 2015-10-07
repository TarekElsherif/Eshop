<?php
session_start();
$con = mysqli_connect("localhost","root","","eshop");
$product_id = $_POST['product_id'];
$query = "SELECT * FROM products where product_id = '$product_id'";
$result = $con->query($query);
$product = mysqli_fetch_assoc($result);
$available_quantity = $_POST['available_quantity'];
if (isset($_POST['cart'])) 
{
	header("location: cart.php");
}
$cart=$_SESSION['current_user_cart'];
$counter=$_SESSION['counter'];
$available_quantity=$_POST['available_quantity'];

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
				if((int) $available_quantity>= (int) $required_quantity)
				{
					for ($i=0; $i <$counter ; $i++) 
					{ 
						if($_POST['product_id']==$cart[$i]['product_id'])
						{
							$cart[$i]['quantity'] =$cart[$i]['quantity']+$required_quantity ;
							$flag=1;
							$message = "The item is sucessfully added to your cart.";
							echo "<script type='text/javascript'>alert('$message'); window.location = 'products.php'; </script>";
						}
					}
					if($flag==0)
					{
						$cart[$counter]['product_id'] = $_POST['product_id'];
						$cart[$counter]['user_id'] = $_SESSION['current_user_id'];
						$cart[$counter]['quantity'] = $_POST['quantity'];
						$counter++;
						$message = "The item is sucessfully added to your cart.";
						echo "<script type='text/javascript'>alert('$message'); window.location = 'products.php'; </script>";
					}
				}else
				{		echo "here";
						$message = "The quantity you requested is not available";
						echo "<script type='text/javascript'>alert('$message'); window.location = 'products.php';</script>";
				}
		}
}
$_SESSION['counter'] = $counter;
$_SESSION['current_user_cart'] = $cart;

?>