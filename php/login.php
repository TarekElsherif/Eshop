<?php
	session_start();
	$error='';
	if (isset($_POST['submitted'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) {
			$error = "Email or Password is invalid";
		}
		else
		{
			$remember = $_POST['remember'];
			$email=$_POST['email'];
			$password=$_POST['password'];
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
				$query = "SELECT fname FROM users where email='$email'";
				$result = $con->query($query);
				$fname = mysqli_fetch_assoc($result);
				$query = "SELECT avatar FROM users where email='$email'";
				$result =  $con->query($query);
				$avatar = mysqli_fetch_assoc($result);
				$_SESSION['current_user']=$email;
				$_SESSION['current_user_fname']=(string)$fname['fname'];	
				$_SESSION['current_user_avatar']=(string)$avatar['avatar'];	
				header("location: welcome.php"); // Redirecting To Other Page
			} else {
				$error = "Email or Password is invalid";
			}
			mysqli_close($con);
			}
	}
?>