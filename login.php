<?php
	session_start();
	$error='';
	if (isset($_POST['L_submitted'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) {
			$error = "Email or Password is invalid";
		}
		else
		{
			$remember = $_POST['remember'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$cart = array();
			$counter = 0;
			$password = md5($password);
			if($remember == 1)
			{
				setcookie('email', $_POST['email'], time() + 1000000000);
				setcookie('password', $_POST['password'], time() + 1000000000);
			}
			$con = mysqli_connect("localhost","root","","eshop");
			$query = "SELECT * FROM users where password='$password' AND email='$email'";
			$result = $con->query($query);
			if(!$result){
    			die('There was an error running the query [' . $con->error . ']');
			}
			$rows = $result->num_rows;
			if ($rows == 1) {
				$query = "SELECT * FROM users where email='$email'";
				$result = $con->query($query);
				$finalresult = mysqli_fetch_assoc($result);
				$_SESSION['current_user']=$email;
				$_SESSION['current_user_fname']=(string)$finalresult['fname'];	
				$_SESSION['current_user_avatar']=(string)$finalresult['avatar'];
				$_SESSION['current_user_id']=$finalresult['user_id'];
				$_SESSION['current_user_cart']=$cart;
				$_SESSION['counter']=$counter;								
				header("location: index.php"); // Redirecting To Other Page
			} else {
				$error = "Email or Password is invalid";
			}
			mysqli_close($con);
			}
	}
?>