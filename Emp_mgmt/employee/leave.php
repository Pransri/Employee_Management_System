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

    <title>Leave</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--v.v.imp-->
</head>

<body>
    <?php 
        include "header.php";
        ?>

    <h3>Leaves <a href="applied_leave.php" class="btn btn-primary" style="margin:5px;">All Applied Leave </a>
    </h3>


    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Earning Leave</th>
                <th>Medical Leave</th>
                <th>Casual Leave</th>
                <th>Valid From</th>
                <th>Valid To</th>
            </tr>
        </thead>
        <tbody>
            <?php 
  $i=1;
  $user_id= $_SESSION['user_id'];  //stores value when employee login
  $query="Select * from `assign_leave` t1 join `users` t2 on t1.assign_to=t2.user_id where t2.user_id=$user_id"; //to get name //inner join  //only particular employee record should be found so where condition should be written
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	while($row=mysqli_fetch_array($res))
	{
  
  ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td class="eleave"><?php echo $row['e_leave'];?></td>

                <td class="mleave"><?php echo $row['m_leave'];?></td>
                <td class="cleave"><?php echo $row['c_leave'];?> </td>
                <td class="v_from"><?php echo $row['v_from'];?></td>
                <td class="v_to"><?php echo $row['v_to'];?></td>
            </tr>
            <?php $i++;}}else{
		 echo "No record Found!";
		
	} ?>
        </tbody>
    </table>
    <form class="form-horizontal" method="post" action="apply_leave.php">
        <!-- from here to apply leave by emplyee-->

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
        <fieldset>

            <legend> Apply For Leave
            </legend>




            <br>
            <!----right box----------->
            <div class="col-xs-12">

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3"><b>Apply Leave From:</b></label>
                    <div class="col-lg-9">
                        <input type="date" name="l_from" placeholder="dd/mm/yyy" class="form-control"
                            onblur="checkDate(this.value)">
                        <!--Java script to compare dates -->
                    </div>
                </div>



                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3"><b>Leave To:</b></label>
                    <div class="col-lg-9">
                        <input type="date" name="l_to" placeholder="dd/mm/yyy" class="form-control"
                            onblur="checkDate1(this.value)">
                    </div>
                </div>







                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3"><b>Earning Leave:</b></label>
                    <div class="col-lg-9">
                        <input type="text" name="eleave" placeholder="No.Of Leave" class="form-control"
                            onblur="checkeleavequan(this.value)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3"><b>Medical Leave:</b></label>
                    <div class="col-lg-9">
                        <input type="text" name="mleave" placeholder="No.Of Leave" class="form-control"
                            onblur="checkmleavequan(this.value)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3"><b>Casual Leave:</b></label>
                    <div class="col-lg-9">
                        <input type="text" name="cleave" placeholder="No.Of Leave" class="form-control"
                            onblur="checkcleavequan(this.value)">
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

    <script>
    function checkDate(str) {

        var vfrm = $('.v_from').text();

        var lfrm = str;

        var date1 = new Date(vfrm);
        var date2 = new Date(lfrm);
        var diffDays1 = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));



        if (diffDays1 >= 0)
            return true;

        else {
            alert("Please enter valid date");
            return false;



        }
    }

    function checkDate1(str) {
        var vto = $('.v_to').text();
        var lfrm1 = str;

        var date3 = new Date(lfrm1);
        var date4 = new Date(vto);
        var diffDays2 = parseInt((date4 - date3) / (1000 * 60 * 60 * 24));

        if (diffDays2 >= 0)
            return true;

        else {
            alert("Please enter valid to date");
            return false;



        }
    }

    function checkeleavequan(str) {
        var elev = $('.eleave').text(); //mentioned by admin
        // console.log(parseInt(elev));
        var lqtye = str; //mentioned in the form 
        // console.log(parseInt(lqtye));

        if (parseInt(lqtye) <= parseInt(elev)) {
            return true;

        } else {
            alert("Please enter within the alloted range earning leave ");
            return false;

        }
    }



    function checkmleavequan(str) {
        var mlev = $('.mleave').text(); //mentioned by admin
        var lqty = str; //mentioned in the form 

        if (parseInt(lqty) <= parseInt(mlev)) {
            return true;

        } else {
            alert("Please enter within the alloted range medical leave ");
            return false;
        }

    }

    function checkcleavequan(str) {
        var clev = $('.cleave').text(); //mentioned by admin
        var lqty = str; //mentioned in the form 

        if (parseInt(lqty) <= parseInt(clev)) {
            return true;

        } else {
            alert("Please enter within the alloted range casual leave ");
            return false;
        }

    }
    </script>


</body>

</html>