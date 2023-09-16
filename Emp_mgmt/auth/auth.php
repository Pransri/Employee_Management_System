<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "ems";
$conn = mysqli_connect($servername, $username, $password, $database);

if(!isset($_SESSION['auth']))
{
    header("Location:../login.php");
}
?>