<?php
session_start();
include('include/connection.php');
if(isset($_POST['userlogin']))
{
    $query="SELECT all  * FROM users WHERE email='$_POST[email]' AND password='$_POST[password]'";
   $query_run=mysqli_query($conn,$query);
   if(mysqli_num_rows($query_run)){
    while($row=mysqli_fetch_assoc($query_run))
    {
        $_SESSION['email']=$row['email'];
        $_SESSION['name']=$row['name'];
        $_SESSION['uid']=$row['uid'];
    

    }
    echo "<script type='text/javascript'>
    window.location.href='user_dashboard.php';
    </script>
    ";

   }else
   {
    echo "<script type='text/javascript'>
    alert('please enter correct details');
    window.location.href='user_login.php';
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
    <title>User login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--jquery file  -->
    <script src="include/jquery.min.js"></script>

    <!-- bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- external css file  -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3 >User login </h3> </center>
            <form action="" method="post">
                <div class="form-group ">
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>

                </div>
                <div class="form-group ">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <center><input type="submit" name="userlogin" value="login" class="btn btn-warning ">  </center>
                </div><br>

            </form>
      <center>  <a href="index.php" class="btn btn-danger ">Go to home</a> </center>
        </div>
    </div>
</body>

</html>