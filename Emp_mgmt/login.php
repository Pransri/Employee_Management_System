<?php 
session_start();  //important
?>

<?php
    $host="localhost";
$username="root";
$pass="";
$db="ems";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}

// login account process

if($_SERVER["REQUEST_METHOD"]=="POST")


{
	$email=$_POST['email'];
	$pass=$_POST['password'];
    // $pass=md5($_POST['password']);
	
	$query="Select * from users where email='$email' AND password='$pass'";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);

    $row=mysqli_fetch_array($res);

    if($count==1)
    {   
        $session_id=session_id(); //imp
        $_SESSION['auth']= $session_id;  //imp

         $_SESSION['user_id']=$row['user_id'];  //to assign task  //imp for fetching user_id when employee login
        
        $role=$row['role'];

        if($role=='admin')
        {
            header('Location:admin/dashboard.php');
        }

         else if($role=='employee')
        {
            header('Location:employee/dashboard.php');
        }
        else
        {
              header("Location:login.php");
        }
        
       
    }
   
   
}
    ?>
<!-- Required meta tags -->
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">











<head>
    <title>Login</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    function formvalidation() {
        var email = $('#inputEmail').val();
        var password = $('#inputPassword').val();
        var passlength = $('#inputPassword').val().length;

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

</head>

<body>



    <div class="container">
        <form method="post" onsubmit="return formvalidation();">



            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="inputEmail">

            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword">


                <div class="mt-3">
                    <button type="submit" class="btn btn-dark shadow-none">Login</button>
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