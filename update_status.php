<?php

include('include/connection.php');
if(isset($_POST['update_task']))
{
    $query="update tasks set status='$_POST[status]' where tid =$_GET[id]";
    $query_run=mysqli_query($conn,$query);
    if($query_run)
    {
        echo "<script type='text/javascript'>
        alert('status updated successfully...');
    window.location.href='user_dashboard.php';
    </script>
    ";
    }else
    {
        echo "<script type='text/javascript'>
        alert('Error...plz try again');
    window.location.href='user_dashboard.php';
    </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> update task</title>
    <!--jquery file  -->
    <script src="include/jquery.min.js"></script>


    <!-- bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background-color:white;">
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display:inline-block; ">
                <h3> Task Assignment System</h3>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="padding-top:30px;  " ;>
            <h3>update the task</h3><br>
            <?php
                $query="select * from tasks where tid=$_GET[id]";
                $query_run=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($query_run)){
                    ?>

            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
                        <option>--select</option>
                        <option>In-progress</option>
                        <option>Complete</option>

                    </select>
                </div>
             
                <input type="submit" class="btn btn-warning" name="update_task" value="Update">

            </form>
            <?php

                }

            ?>

        </div>
    </div>
</body>

</html>