<?php 

session_start();

$_SESSION['sesi'] = NULL;
unset($_SESSION['sesi']);
session_unset();
session_destroy();
header('location:login.php');

?>