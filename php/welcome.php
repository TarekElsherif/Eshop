<?php session_start(); ?>
<html>
 <body>
 Welcome <?php echo $_SESSION['current_user_fname']; ?>
<?php echo '<img src="' . $_SESSION['current_user_avatar'] . '" style="hight:150px;width:150px;"/>' ?>
 <br />
 Your e-mail address is: <?php echo $_SESSION['current_user']; ?>.
 <form action="logout.php" method="get">
 <BUTTON type="submit">Log Out</BUTTON>
 </form>
 <form action="editprofile.php" method="get">
 	<BUTTON type="submit">Edit</BUTTON>
 </form>
 <form action="history.php" method="get">
 	<BUTTON type="submit">History</BUTTON>
 </form>
 </body>
</html>