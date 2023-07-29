<?php
include('include/connection.php');
if(isset($_POST['userRegistration']))
{
    $query="INSERT INTO users VALUES (null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('user registered sucessfully..');
        window.location.href='index.php';
        </script>
        ";
    }else{

        echo "<script type='text/javascript'>
        alert('error...plz try again');
        window.location.href='register.php';
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>user registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--jquery file  -->
    <script src="include/jquery.min.js"></script>

    <!-- bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="register_home_page">
            <center><h3 >User Register </h3> </center>
            <form action="" method="post">
            <div class="form-group ">
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>

                </div>
                <div class="form-group ">
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>

                </div>
                <div class="form-group ">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group ">
                    <input type="tel" name="mobile" class="form-control" placeholder="enter mobile number" required>
                </div>
                <div class="form-group">
                    <center><input type="submit" name="userRegistration" value="Register" class="btn btn-warning ">  </center>
                </div><br>

            </form>
      <center>  <a href="index.php" class="btn btn-danger ">Go to home</a> </center>
        </div>
    </div>
</body>

</html>