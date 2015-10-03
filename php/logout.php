<?php
session_destroy();
setcookie('email', '$email', time() - 1000000000);
setcookie('password', '$password', time() - 1000000000);
header("location: authentication.php");
?>