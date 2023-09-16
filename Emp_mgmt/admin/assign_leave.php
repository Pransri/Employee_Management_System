<?php include "../auth/auth.php";?>








<?php include "header.php";?>













<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Leave</title>
</head>

<body>

    <div class="container">
        <div class="col-xs-10 col-xs-push-1 well">
            <?php 
	if(isset($_SESSION['success']))
	{
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	}
	?>
            <!------ register form start from here ---------------------->
            <form class="form-horizontal" method="post" action="insert_leave.php">
                <!-- go to insert_leave.php-->
                <fieldset>
                    <legend> Assign Leave <a href="all-leave.php" class="btn btn-primary" style="margin:5px;">All
                            <!-- Shows leaves assigned to employess-->
                            Leave
                        </a> <a href="all_applied_leave.php" class="btn btn-primary">All Applied Leave </a>
                        <!-- Displays employee requested for leave so that admin can approve or reject-->
                    </legend>
                    <!-- <legend>Assign Task <a href="all-task.php" class="btn btn-primary" style="margin:5px;">All Task</a>
                    </legend> -->

                    <!----left box----------->
                    <div class="col-xs-3" style="background-color:#d9d9d9;padding:15px;">
                        <div class="form-group">
                            <label class="col-lg-12"><b>Employee Lists</b></label>
                            <input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id']; ?>">
                            <!-- we want user id but it should not be dispalyed but when we submit this will also be submitted-->
                            <!-- $_SESSION['user_id'] this is defined in login so that as soon as user login here we will get his id-->
                            <div class="col-lg-12">
                                <?php
  $query="Select * from users where `role`='employee' order by user_id DESC";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	while($row=mysqli_fetch_array($res))
	{
  
  ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="emp[]" value="<?php echo $row['user_id'];?>">
                                        <!--what is written in value is important for backend -->
                                        <!-- emp array stores user id of all employess we click(checkbox)-->
                                        <!--emp[] array.-->
                                        <?php echo $row['name'];?>
                                        <!--to display name after checkbox-->
                                    </label>
                                </div>

                                <?php  } ?>


                            </div>
                        </div>

                    </div>
                    <br>
                    <!----right box----------->
                    <div class="col-xs-9">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3"><b>Valid From:</b></label>
                            <div class="col-lg-9">
                                <input type="date" name="validfrm" placeholder="dd/mm/yyy" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3"><b>Valid To:</b></label>
                            <div class="col-lg-9">
                                <input type="date" name="validto" placeholder="dd/mm/yyy" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3"><b>Earning Leave:</b></label>
                            <div class="col-lg-9">
                                <input type="text" name="eleave" placeholder="No.Of Leave" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3"><b>Medical Leave:</b></label>
                            <div class="col-lg-9">
                                <input type="text" name="mleave" placeholder="No.Of Leave" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3"><b>Casual Leave:</b></label>
                            <div class="col-lg-9">
                                <input type="text" name="cleave" placeholder="No.Of Leave" class="form-control">
                            </div>
                        </div>

                    </div>


                    <br>


                    <div class="form-group">
                        <div class="col-lg-12 col-lg-offset-3">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>

            <!------------------------register form end here----------------->
        </div>
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