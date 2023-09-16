<?php
session_start();
// include "authentication.php";
$host="localhost";
$username="root";
$pass="";
$db="ems";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}

// insert query for register page
if(isset($_REQUEST['email']))
{
	$user_id=$_POST['user_id'];      //input type hidden is also posted
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
    $role=$_POST['role'];
	
	if($_POST['password']==''){
		
	$query="UPDATE `users` SET `name`='$name',`email`='$email',`role`='$role' where `user_id`='$user_id'";	
	}else{
	 $query="UPDATE `users` SET `name`='$name',`email`='$email',`password`='$pass',`role`='$role' where `user_id`='$user_id'";
	}
	
	$res=mysqli_query($conn,$query);
	if($res){
		// $_SESSION['success']="Data Updated successfully!";
		header('Location:dashboard.php');
	}else{
		echo "Data not Updated, please try again!";
	}
	
}



?>