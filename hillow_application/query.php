<?php

include('db.php');
session_start();
$date = date("Y-m-d H:i:s");
$uid = $_SESSION['user_id'];
$pid = $_POST['submit'];
$msg = "";


if (isset($_POST['submit'])) {

    if (!empty($_POST['message'])) {
        $msg = $_POST['message'];


        $query = "INSERT INTO messaging (`uid`,`pid`,`message`,`date`) VALUES ('$uid','$pid','$msg','$date')";

        if ($conn->query($query)) {
            echo '<br><br><br><h3><center><h1>Thank you, Your message has been sent to the landlord.<br> </center><h3> <br>
        <meta http-equiv="refresh" content="3;url=index.php" />

        ';
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();


    }
}
