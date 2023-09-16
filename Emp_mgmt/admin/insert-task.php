<?php
session_start();

$host="localhost";
$username="root";
$pass="";
$db="ems";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}

// insert query for register page
if(isset($_REQUEST['message']))
{
	$message=$_POST['message'];
    $assign_by=$_POST['assign_by'];

	$emplist=$_POST['emp'];
    
    foreach($emplist as $emp) {
	
	
	$query="INSERT INTO `task` (`t_id`,`task`,`user_id`,`assigned_by`) VALUES ('','$message','$emp','$assign_by')";
	
	$res=mysqli_query($conn,$query);
    
}

	if($res){
		// $_SESSION['success']="Data inserted successfully!";
		header('Location:dashboard.php');
	}else{
		echo "Data not inserted, please try again!";
	}
	
}



?>