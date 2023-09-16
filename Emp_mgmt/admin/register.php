<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Super admin register</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--this should be used for jquery to work i,e,.function formvalidation()-->

    <?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "ems";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);


// Create a table in the db
$sql = "CREATE TABLE IF NOT EXISTS `users` ( `user_id` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(12) NOT NULL , `email` VARCHAR(20) NOT NULL , `password` VARCHAR(10) NOT NULL, PRIMARY KEY (`user_id`))";
$result = mysqli_query($conn,$sql);


if(isset($_REQUEST['email']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    // $pass=md5($_POST['password']);
    $role=$_POST['role'];

    $query="INSERT INTO `users` (`user_id`,`name`,`email`,`password`,`role`) VALUES ('','$name','$email','$pass','$role')";
    $res=mysqli_query($conn,$query);
     if($res)
    {
        // $_SESSION['success']="Data inserted successfully!!";
        // header('Location:register.php');
    }
    else
    {
        echo "Could not register";
    }

    

    
    

}
  
?>
    <script>
    function formvalidation() {
        var name = $('#inputName').val();
        //what we enter will be stored in variable name same id should be given as mentioned in forms
        // alert(name);
        var email = $('#inputEmail').val();
        //in variable email value given in form email will be Stored 

        var password = $('#inputPassword').val();
        var passlength = $('#inputPassword').val().length;
        if (name == '') {
            alert("Please Enter your name");
            return false; //page will not refresh
        }
        if (email == '') {
            alert("Please Enter your email");
            return false;

        }
        if (password == '') {
            alert("Please Enter your password");
            return false;

        }
        if (passlength <= 4) {
            alert("Please Enter minimum 5 digit password");
            return false;

        }

    }
    </script>
</head>

<body>

    <?php 
        include "header.php";
        ?>

    <div class="container">
        <form method="post" onsubmit="return formvalidation();">
            <!-- <?php if(isset($_SESSION['success'])) 
        {
                echo $_SESSION['success']; 
        } 


            ?> -->

            <!--user defined function-->
            <!--this function is used so that empty form is not submitted-->
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="inputName">
                <!--id and name should be in input type-->

            </div>


            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="inputEmail">

            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword">
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Role</label>
                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="role" id="role" value="admin" checked="">
                            Admin
                        </label>
                    </div>


                    <div class="radio">
                        <label>
                            <input type="radio" name="role" id="role" value="employee" checked="">
                            Employee
                        </label>
                    </div>
                </div>
            </div>



            <div class="mt-3">
                <button type="submit" class="btn btn-dark shadow-none">Submit</button>
            </div>
        </form>
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