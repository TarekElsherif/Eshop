
<?php
	include("editprofile_engine.php"); 
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div>
			<h1>eshop</h1>
			<div>
				<h2>Edit Form</h2>
				<form action="" method="POST" enctype="multipart/form-data">
				<input type='hidden' name='submitted' id='submitted' value='1'/>
					First name:
					<input name="fname" type="text"><br><br>
					Last name:
					<input name="lname" type="text"><br><br>
					Email:
					<input name="email" placeholder="email" type="text"><br><br>
					Password:
					<input name="password" type="password"><br><br>
					Avatar:
    				<input type="file" name="avatar" id="avatar">
					<input type="submit" >
					<span><?php echo $error; ?></span>
				</form>
			</div>
		</div>
	</body>
</html>