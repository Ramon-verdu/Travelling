<?php
session_start();
$_SESSION['EMAIL'] = "";
// remove all session variables
$EMAIL=$_SESSION['EMAIL'];
echo $EMAIL;
session_unset();

// destroy the session
session_destroy();

include 'conexion.php';



$url = "index.html";
header("Location: " . $url);
exit();

?>
