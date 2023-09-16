<?php include "../auth/auth.php";?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>All Applied Leaves</title>
</head>

<body>

    <!------including header here --------->
    <?php include "header.php";?>
    <!------end header here --------->
    <?php

    if(isset($_POST['approved']))
    {
         $status="Accepted";
        $id=$_POST['id'];
        $query="UPDATE `applied_leave` set `status`='$status' where `id`='$id' ";
	    $res=mysqli_query($conn,$query);
    }
    
 

	
	





    

     if(isset($_POST['rejected']))
    {
        echo "Leave rejected";
        $status="Rejected";
        $id=$_POST['id'];

        $query="UPDATE `applied_leave` set `status`='$status' where `id`='$id' ";
	
	    $res=mysqli_query($conn,$query);
    
    }
 ?>

    <div class="container">
        <h3>All Applied Leaves</h3>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Employee Name</th>
                    <th>Earning Leave</th>
                    <th>Medical Leave</th>
                    <th>Casual Leave</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
  $i=1;
  $query="Select * from `applied_leave` t1 join `users` t2 on t1.apply_by=t2.user_id"; //to get name //inner join
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	while($row=mysqli_fetch_array($res))
	{
  
  ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['e_leave'];?></td>

                    <td><?php echo $row['m_leave'];?></td>
                    <td><?php echo $row['c_leave'];?> </td>
                    <td><?php echo $row['l_from'];?></td>
                    <td><?php echo $row['l_to'];?></td>
                    <td style="color:green;"><?php echo $row['status'];?></td>


                    <form method="post" action="">

                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">


                        <td>

                            <button type="submit" name="approved" class="btn btn-success">Approve</button>





                            <button type="submit" name="rejected" class="btn btn-danger">Reject</button>


                        </td>
                    </form>

                </tr>
                <?php $i++;}}
                else{
		 echo "No record Found!";
		
	} ?>
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>