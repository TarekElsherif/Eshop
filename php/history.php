<?php
	session_start();
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
	foreach ($products as $product) 
	{
		$product_id=$product['product_id'];
		$query = "SELECT * FROM products WHERE product_id ='$product_id' ";
		$result = $con->query($query);
		$row = mysqli_fetch_assoc($result);
		echo '<img src="' .$row['picture']. '" height="150" width="150"/>';
	
	?>	
	<div> <?php
				echo $row['name'];
			?>
			<br>	
				<?php
				echo $row['price'];
			?>
			<br>
			<?php
				echo $product['quantity'];
		  ?>
	</div>
<?php
	}
?>