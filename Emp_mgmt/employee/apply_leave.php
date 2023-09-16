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
if(isset($_REQUEST['l_from']))
{
	$l_from=$_POST['l_from'];
    $l_to=$_POST['l_to'];
    $eleave=$_POST['eleave'];
    $mleave=$_POST['mleave'];
    $cleave=$_POST['cleave'];
    $apply_by=$_POST['user_id'];
	$status="Pending";
	

	
	
	
	$query="INSERT INTO `applied_leave` (`id`,`l_from`,`l_to`,`e_leave`,`m_leave`,`c_leave`,`apply_by`,`status`) VALUES ('','$l_from','$l_to', '$eleave','$mleave','$cleave','$apply_by','$status')";
	//apply_by is nothing but user_id
	
	$res=mysqli_query($conn,$query);

    if($res==true){
		// $_SESSION['success']="Data inserted successfully!";
		header('Location:leave.php');
	}else{
		echo "Leave not applied, please try again!";
	}
    
 }

	
	




?>