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

    <title>Task</title>
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
            <form class="form-horizontal" method="post" action="insert-task.php" onsubmit="return formvalidation();">
                <fieldset>
                    <!-- <legend>Assign Task <a href="all-task.php" class="btn btn-primary" style="margin:5px;">All Task</a>
                    </legend> -->

                    <!----left box----------->
                    <div class="col-xs-3" style="background-color:#d9d9d9;padding:15px;">
                        <div class="form-group">
                            <label class="col-lg-12"><b>Employee Lists</b></label>
                            <input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id']; ?>">
                            <!-- we want user id but it should not be dispalyed but when we submit this will also be submitted-->
                            <!-- $_SESSION['user_id'] this is defines in login so that assoon as user login here we will get his id-->
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
                                        <!--emp[] array.-->
                                        <?php echo $row['name'];?>
                                        <!--To display name after checkbox-->
                                    </label>
                                </div>

                                <?php  } ?>


                            </div>
                        </div>

                    </div>
                    <!----right box----------->
                    <div class="col-xs-9">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-12"><b>Message</b></label>
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="10" name="message" placeholder="Message/ Task"
                                    style="background-color:#d9d9d9;padding:5px;"></textarea>
                            </div>
                        </div>

                    </div>


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