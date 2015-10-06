<?php
session_start();
unset($_SESSION['current_user']);
setcookie('email', '$email', time() - 1000000000);
setcookie('password', '$password', time() - 1000000000);
header("location: index.php");
?>