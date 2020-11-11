<?php

include 'db.php';

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $password = md5($password);

    if ($user_type == "User") {
        $sql = "SELECT * FROM users WHERE email= '$email' AND pwd = '$password'";
        $run = mysqli_query($conn, $sql);
        if (mysqli_num_rows($run) > 0) {
            session_start();
            while ($row = $run->fetch_assoc()) {
                $_SESSION['type'] = "User";
                $_SESSION['user_id'] = $row['uid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
            }
            header("Location: user_dashb.php");
        } else {
            header ("Location: ./login.php?error=invalidrole");
            exit();
        }

    }
    else if ($user_type == "Admin") {
        $sql = "SELECT * FROM admin WHERE email= '$email' AND pwd = '$password'";
        $run = mysqli_query($conn, $sql);
        if (mysqli_num_rows($run) > 0) {
            session_start();
            while ($row = $run->fetch_assoc()) {
                $_SESSION['type'] = "Admin";
                $_SESSION['user_id'] = $row['aid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
            }
            header("Location: admin_dashb.php");
        } else {
            header ("Location: ./login.php?error=invalidrole");
            exit();
        }
    }
}




