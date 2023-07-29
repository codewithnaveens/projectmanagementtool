<?php
session_start();
include('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--jquery file  -->
    <script src="include/jquery.min.js"></script>

    <!-- bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body style="background-color:white;">
    <center>
        <h3>Your Task</h3>
    </center><br>
    <table class="table">
        <tr>
            <th>S.NO</th>
            <th>Task ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End date</th>
            <th>Action</th>

        </tr>
        <?php

    $query="select * from tasks where uid=$_SESSION[uid]";
    $sno=1;
    $query_run=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($query_run)) {
       ?>
       <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $row['tid']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="Update_status.php?id=<?php echo $row['tid'];  ?> ">update</a></td>


        </tr>
        <?php
        $sno=$sno+1;
    }
    
    ?>
    </table>
</body>

</html>