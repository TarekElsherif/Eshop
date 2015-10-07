<?php
	session_start();
	$error='';
	if (isset($_POST['S_submitted'])) {
		if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['fname']) || empty($_POST['lname']) ) {
			$message = "Your information is not complete";
			echo "<script type='text/javascript'>alert('$message'); window.location = 'authentication.php'</script>";
		}
		else
		{

			$email=$_POST['email'];
			$password=$_POST['password'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			if(!empty($_POST['avatar']))
			{
				$avatar=$_POST['avatar'];
			}else
			{
				$avatar=NULL;
			}
			
			$password = md5($password);
			//avatar
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES['avatar']["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$check = getimagesize($_FILES['avatar']["tmp_name"]);
  			  if($check == false) 
  			  {
      			$message=  "File is not an image.";
      			echo "<script type='text/javascript'>alert('$message'); window.location = 'authentication.php'</script>";
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
				$message = "Email is already registered";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'authentication.php'</script>";
				} else {
				mysqli_query($con,"INSERT INTO users (fname, lname, email, password , avatar) VALUES ('$fname','$lname','$email','$password', '$target_file')");
				$_SESSION['current_user']=$email;
				// $_SESSION['current_user_id']=$id;
				$_SESSION['current_user_fname']=$fname;			
				$_SESSION['current_user_lname']=$lname;
				$_SESSION['current_user_avatar']=$target_file;	

				header("location: index.php");		

			}
			mysqli_close($con);
			}
		}
	}
?>