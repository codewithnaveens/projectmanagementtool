<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dashboard</title>
    <!--jquery file  -->
    <script src="include/jquery.min.js"></script>

    <!-- bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
    $(document).ready(function() {
        $('#manage_task').click(function() {
            $("#right_sidebar").load("task.php");

        });

    });
    </script>
</head>

<body style="background-color:white;">
    <!-- header code start -->
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display:inline-block;">
                <h3>Project Management Tool</h3>
            </div>
            <div class="col-md-6" style="display:inline-block; text-align:right;">
                <b>Email:</b><?php echo $_SESSION['email'];?>
                <span style="margin-left:25px;"><b>Name:</b><?php echo $_SESSION['name'];?></span>
            </div>
        </div>

    </div>
    <!-- body code started -->
    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align:center;">
                        <a href="user_dashboard.php" type="button" class="logout_link"
                            style="color:white;">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a href="#" id="manage_task" type="button" class="logout_link" style="color:white;">Update
                            Task</a>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:center;">
                        <a href="logout.php" type="button" class="logout_link" style="color:white;">logout</a>
                    </td>
                </tr>

            </table>

        </div>
        <div class="col-md-10" id="right_sidebar">

            <div class="col-md-5 col-sm-offset-4 frame">
                <ul></ul>
                <div>
                    <div class="msj-rta macro" style="margin:auto">
                        <div class="text text-r" style="background:whitesmoke !important">
                            <input class="mytext" placeholder="Type a message" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
<script type=text/javascript>
var me = {};

var you = {};

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time = 0) {
    var control = "";
    var date = formatAMPM(new Date());

    if (who == "me") {

        control = '<li style="width:100%">' +
            '<div class="msj macro">' +
            '<div class="text text-l">' +
            '<p>' + text + '</p>' +
            '<p><small>' + date + '</small></p>' +
            '</div>' +
            '</div>' +
            '</li>';
    } else {
        control = '<li style="width:100%;">' +
            '<div class="msj-rta macro">' +
            '<div class="text text-r">' +
            '<p>' + text + '</p>' +
            '<p><small>' + date + '</small></p>' +
            '</div>' +
            '<div class="avatar" style="padding:0px 0px 0px 10px !important"></div>' +
            '</li>';
    }
    setTimeout(
        function() {
            $("ul").append(control);

        }, time);

}

function resetChat() {
    $("ul").empty();
}

$(".mytext").on("keyup", function(e) {
    if (e.which == 13) {
        var text = $(this).val();
        if (text !== "") {
            insertChat("me", text);
            $(this).val('');
        }
    }
});

//-- Clear Chat
resetChat();

//-- Print Messages
insertChat("me", "Hello <?php echo $_SESSION['name'];?>", 0);
insertChat("you", "Hello, sir", 1500);
insertChat("me", "i have assigned you a task did you checked ?", 3500);
insertChat("you", "Yes sir , task is in progress will complete soon", 7000);
insertChat("me", "Date has mentioned you can complete till that", 9500);
insertChat("you", "Sure sir", 12000);
</script>