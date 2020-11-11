<?php
include('db.php');

$user_type = "";

if(isset($_POST['signup']) && isset($_POST['terms'])){


    $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $user_type = mysqli_real_escape_string($conn,$_POST['user_type']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);
    $password = md5($password);

    function checkEmail($email) {
        $find = strpos($email, '@sfsu.edu');
        return ($find !== false);
    }
    if (empty($first_name) || empty($last_name) || empty($user_type) || empty($email) || empty($password)){
        header("Location: ./login.php?error=emptyfields&username=".$first_name."&email=".$email);
        exit();
    }
    else if (!checkEmail($email)) {
        header ("Location: ./login.php?error=invalidemailusername");
        exit();
    }
    else if (!preg_match("/[a-zA-Z0-9]/", $first_name)){
        header("Location: ./login.php?error=invalidausername&email=".$email);
        exit();
    }else if (!preg_match("/[a-zA-Z0-9]/", $last_name)){
        header("Location: ./login.php?error=invalidausername&email=".$email);
        exit();
    }
    else {

                if ($user_type == "User") {

                    $query = "SELECT * from users where email = '$email'";
                    if ($conn->query($query)) {
                        $return = mysqli_query($conn, $query);
                        $result = mysqli_num_rows($return);

                        if ($result > 0) {
                            echo '<div style = "color:red;"> <b>' . $email . '</b> is already taken! </div>
                            <meta http-equiv="refresh" content="3;url= index.php" />';
                        } else {
                            $sql = "INSERT INTO users (first_name, last_name, email, pwd ) VALUES ('$first_name', '$last_name', '$email', '$password')";
                            if ($conn->query($sql)) {
                                echo '<br><br><br><h3><center><h1>You are successfully registered! </h1></center><h3> <br>
                      <meta http-equiv="refresh" content="3;url= index.php" />
              
                      ';
                            } else {
                                echo '<br><br><br><h3><center><h1>ERROR - TRY AGAIN </h1> </center><h3> <br>
                      <meta http-equiv="refresh" content="3;url= index.php" />
              
                      ';
                            }
                        }
                    }
                } else if ($user_type == "Admin") {

                    $query = "SELECT * FROM admin WHERE email = '$email' ";

                    if ($conn->query($query)) {
                        $return = mysqli_query($conn, $query);
                        $result = mysqli_num_rows($return);

                        if ($result > 0) {
                            echo '<div style = "color:#ff0000;"> <b>' . $email . '</b> is already used! </div>
                            <meta http-equiv="refresh" content="3;url= index.php" />';
                        } else {
                            $sql = "INSERT INTO admin (`first_name`,`last_name`,`email`,`pwd`) VALUES ('$first_name','$last_name','$email','$password')";
                            if ($conn->query($sql)) {
                                echo '<br><br><br><h3><center><h1>You are successfully registered! </h1></center><h3> <br>
                      <meta http-equiv="refresh" content="3;url= index.php" />
              
                      ';
                            } else {
                                echo '<br><br><br><h3><center><h1>ERROR - TRY AGAIN </h1></center><h3> <br>
                      <meta http-equiv="refresh" content="3;url=index.php" />
              
                      ';
                            }
                        }
                    }
                }
            }

}else{
    header ("Location: ./login.php?error=checkterms");
    exit();
}
$conn->close();
?>