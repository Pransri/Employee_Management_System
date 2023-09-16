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

    <title>Admin dashboard</title>
</head>

<body>

    <?php 
        include "header.php";
        ?>

    <br>

    <?php
 echo "Welcome to admin dashboard";

    ?>
    <br> <br>
    <h2>USER RECORDS </h2>
    <!-- to display users on the page -->

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            $query="Select * from users";//to retrive all users
	        $res=mysqli_query($conn, $query);
	        $count=mysqli_num_rows($res);
            if($count>0)
            {
                 while($row=mysqli_fetch_array($res))
                 {

                    ?>

            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['role'];?></td>

                <td><a href="edit_user.php?id=<?php echo $row['user_id'];?>">Edit |</a> <!-- id will store user_id-->
                    <!--REMEMBER-->
                    <!--Then we can retrieve for GET-->

                    <a href="delete_user.php?id=<?php echo $row['user_id'];?>">Delete
                </td>


            </tr>

            <?php  $i++;}}else
            {
                echo "No Records Found!!";
            }?>







        </tbody>
    </table>


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