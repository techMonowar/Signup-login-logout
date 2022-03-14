<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "signup-login-logout";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Database Connection Failed.')</script>");
}

?>