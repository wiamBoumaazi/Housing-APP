

<?php
session_start();
include('db.php');
include 'navbar.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>Landlord Messages</title>

    <style type="text/css">
        #jumbo {
            text-align: center;
            background: lightblue;
        }
    </style>
</head>

<body>



<div class="jumbotron">
    <center>
        <h1 class="display-4" id="jumbo">Message <?php

            $val = $_POST['landlord'];
            ?>:</h1>
    </center>
    <hr class="my-4" />
    <center>
        <div>

            <?php
            echo"Type your message here";


            ?>
        </div>
        <?php

        echo '
        <form method="POST" action="query.php">
            <textarea name="message"  rows="10" cols="50" placeholder="Insert your message here (500 chars limit)"></textarea><br><br>
            <button type="submit"  value="'.$val.'" name="submit"> Send </button>
        </form>
        ';
        ?>
        <center>
</div>
<div>
    <?php include "footer.php" ?>
</div>
</body>

</html>
