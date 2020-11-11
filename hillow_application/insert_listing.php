<?php

include('db.php');
session_start();
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$type = $_POST['type'];
$number_bed = $_POST['number_bed'];
$number_bath = $_POST['number_bath'];
$price = $_POST['price'];
$description = $_POST['description'];
$distance = $_POST['distance'];
$landlord = $_SESSION['user_id'];
$image = "";

if (empty($type) || empty($address) || empty($zipcode) || empty($price) || empty($distance)){
    header("Location: ./post.php?error=emptyfields&type=".$type."&address=".$address."&zipcode=".$zipcode."&price=".$price."&distance=".$distance);
    exit();
}else {
    if (isset($_FILES['image']) && !empty($_FILES['image'])) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }
    $query = "";



    if (isset($_POST['submit'])) {


    $query = "INSERT INTO listing (`landlord`,`address`,`zipcode`,`type`,`number_bed`,`number_bath`,
                `price`,`description`,`distance`,`image`) VALUES ('$landlord','$address','$zipcode','$type',
                '$number_bed','$number_bath','$price','$description','$distance','$image')";

    if ($conn->query($query) == true) {
        echo '<br><br><br><h3><center><h1>Thank you ' . $_SESSION['first_name'] . ' </h1><br>Your post of ' . $type . ' Your post will be verified by an Admin, it might take up to 24h to 
         be posted. Thanks for your patience!<br> </center><h3> <br>
            <meta http-equiv="refresh" content="3;url= index.php" />

            ';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    }
    $conn->close();

}





