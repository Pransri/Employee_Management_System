<?php
include "../auth/auth.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Applied Leave</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--v.v.imp-->
</head>

<body>
    <?php 
        include "header.php";
        ?>

    <h3>All Applied Leave
    </h3>


    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Sr no.</th>

                <th>Earning Leave</th>
                <th>Medical Leave</th>
                <th>Casual Leave</th>
                <th>Leave From</th>
                <th>Leave To</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
  $i=1;
  $user_id= $_SESSION['user_id'];  //stores value when employee login
  
  $query="Select * from `applied_leave` where `apply_by` = $user_id" ;  //to match with user who have logged in
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	while($row=mysqli_fetch_array($res))
	{
  
  ?>
            <tr>
                <td><?php echo $i;?></td>

                <td class="eleave"><?php echo $row['e_leave'];?></td>

                <td class="mleave"><?php echo $row['m_leave'];?></td>
                <td class="cleave"><?php echo $row['c_leave'];?> </td>
                <td class="l_from"><?php echo $row['l_from'];?></td>
                <td class="l_to"><?php echo $row['l_to'];?></td>
                <td class="status" style="color:green;"><?php echo $row['status'];?></td>
            </tr>
            <?php $i++;}}
            else{
		 echo "No record Found!";
		
	} ?>
        </tbody>
    </table>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script> -->


</body>

</html>