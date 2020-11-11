<?php
include 'db.php';
session_start();
include 'navbar.php'
?>

<style>
    .background {
        background-color: beige;
    }
</style>

<body>
    <div class="container background" "background">
        <?php
        //if(isset($_SESSION['email']) && !empty($_SESSION['email'] ))
        //{
            //if($_SESSION['type']=="Landlord"){echo 'Rent Your Property!';}
        //}
        //else {
           // echo ' ';
        //}
        ?>
        <h3 class="thrd-text" style="margin-left: 25%">Hillow is a rental website designed for SFSU community</h3>

        <?php include "new_listing.php" ?>
    </div>
    <br> <br>


    <div>
    <?php include "footer.php" ?>
    </div>
</body>
