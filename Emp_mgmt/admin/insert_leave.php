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
if(isset($_REQUEST['validfrm']))
{
	$validfrm=$_POST['validfrm'];
    $validto=$_POST['validto'];
    $eleave=$_POST['eleave'];
    $mleave=$_POST['mleave'];
    $cleave=$_POST['cleave'];
    $assign_by=$_POST['assign_by'];
	

	$emplist=$_POST['emp'];
    
    foreach($emplist as $emp) {   //to select for array
	
	
	$query="INSERT INTO `assign_leave` (`id`,`v_from`,`v_to`,`e_leave`,`m_leave`,`c_leave`,`assign_to`,`assign_by`) VALUES ('','$validfrm',' $validto', '$eleave','$mleave','$cleave','$emp','$assign_by')";
	
	$res=mysqli_query($conn,$query);
    
 }

	if($res){
		// $_SESSION['success']="Data inserted successfully!";
		header('Location:assign_leave.php');
	}else{
		echo "Data not inserted, please try again!";
	}
	
}



?>