<?php
	session_start();
	$error='';
	if (isset($_POST['submitted'])) {
		if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['fname']) || empty($_POST['lname']) ) {
			$error = "Your Information Is Not Complete";
		}
		else
		{
			$email=$_POST['email'];
			$password=$_POST['password'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$avatar=$_POST['avatar'];
			$password = md5($password);
			//avatar
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES['avatar']["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$check = getimagesize($_FILES['avatar']["tmp_name"]);
  			  if($check == false) 
  			  {
      			  $error=  "File is not an image.";
      			  $uploadOk = 0;
   			  }else
   			  {
   			  	move_uploaded_file( $_FILES['avatar']['tmp_name'], $target_dir . basename($_FILES['avatar']['name']));
				//mysql
				$con = mysqli_connect("localhost","root","","eshop");
				$query = "SELECT * FROM users where email ='$email'";
				$result = $con->query($query);
				if(!$result){
    				die('There was an error running the query [' . $con->error . ']');
				}
				$rows = $result->num_rows;
				if ($rows == 1) {
				$error = "Email is already registered";
				} else {
				mysqli_query($con,"INSERT INTO users (fname, lname, email, password , avatar) VALUES ('$fname','$lname','$email','$password', '$target_file')");
				$_SESSION['current_user']=$email;
				// $_SESSION['current_user_id']=$id;
				$_SESSION['current_user_fname']=$fname;			
				$_SESSION['current_user_lname']=$lname;
				$_SESSION['current_user_avatar']=$target_file;	

						header("location: authentication.php");		

			}
			mysqli_close($con);
			}
		}
	}
?>