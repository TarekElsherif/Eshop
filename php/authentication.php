<?php
	include('login.php'); 

	if(isset($_SESSION['current_user'])){
		// header("location: profile.php");
	}
		if (isset($_COOKIE['email']))
	{
		$_SESSION['current_user']=$_COOKIE['email'];
		$_SESSION['current_user_password']=$_COOKIE['password'];
		header("location: welcome.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ESHOP</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div>
			<h1>eshop</h1>
			<div>
				<h2>Login Form</h2>
				<form action="" method="POST">
				<input type='hidden' name='submitted' id='submitted' value='1'/>
					Email :
					<input name="email" placeholder="email" type="text">
					Password :
					<input name="password" type="password">
					<input type="checkbox" name="remember" >Remember Me
					<input type="submit" >
					<span><?php echo $error; ?></span>
				</form>
			</div>
		</div>
	</body>
</html>