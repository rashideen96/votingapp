<?php 

session_start();
unset($_SESSION['user']);
unset($_SESSION['email']);
unset($_SESSION['password']);

session_destroy();

 echo "<script>window.location.href = 'login.php'; </script>";

?>