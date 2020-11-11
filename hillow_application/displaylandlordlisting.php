<?php
include('db.php');
$id = $_SESSION['user_id'];

$sql = "SELECT * FROM `listing` as d INNER JOIN `users` as c ON d.landlord=c.uid WHERE d.landlord= '$id' ";


$result = $conn->query($sql);
$counter = 0;

if ($result->num_rows >= 0) {
<<<<<<< HEAD
    echo '  <p style="color: black; margin-bottom: -2rem; font-size: 23px; font-weight: 20px; margin-left:10%;">Your listings:</p><br><br>
            <h4 style="margin-left: 10% ; color:purple ">Total number of listings : '.$result->num_rows.'</h4><br>';
=======

    echo '  <p style="color: black; margin-bottom: -2rem; font-size: 23px; font-weight: 20px; margin-left:10%;">Your listings:</p><br>';
>>>>>>> f8d51d6665fee5e8ef500778f299759b72f7c818
    while ($row = $result->fetch_assoc()) {
        $value=$row["pid"];

        $counter++;
        if ($counter % 3 == 1) {

            echo '<br>
            <center><table style="width:80%">
            <tr class="mix"> <td style="width:200px;"> <div class="card" style="width:260px">
            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
             <div class="card-body" style="width:260px">
               <div class="list">  <b> Address : </b> ' . $row["address"] . ' </div>
               <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div> 
               <div class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </div>
                <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div><br>

               ';

            if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {

                echo '  
              <div class="text-center"><a href="messaging.php"/>
              <form method="POST" action="messaging.php">
              <button type="submit" name="landlord" value="' . $value . '" class="btn btn-primary  btn-md">
              Contact Landlord
              </button>
              </form>
              </div> ';
            } else {
                echo '  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
            };
            echo '  </div></td>';
        } elseif ($counter % 3 == 2) {
            echo '
            <td style="width:200px;">
             <div class="card" style="width:260px">
            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
             <div class="card-body" style="width:260px">
               <div class="list">  <b> Address : </b> ' . $row["address"] . ' </div>
               <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div> 
               <div class="list"> <b> Distance to SFSU : ' . $row["distance"] . '  </div> 
                <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div><br>

               ';


            if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {

                echo '  
              <div class="text-center"><a href="messaging.php"/>
              <form method="POST" action="messaging.php">
              <button type="submit" name="landlord" value="' . $value . '" class="btn btn-primary  btn-md">
              Contact Landlord
              </button>
              </form>
              </div> ';
            } else {
                echo '  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
            };
            echo '
                 </div></td>';
        } else if ($counter % 3 == 0) {
            echo '
            <td style="width:200px;"> <div class="card" style="width:260px">
            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
             <div class="card-body" style="width:260px">
               <div class="list"> <b> Address : </b> ' . $row["address"] . ' </div>
               <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div> 
               <div class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </div> 
                <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div><br>
               ';

            if (isset($_SESSION['email'])) {

                echo'  
              <div class="text-center"><a href="messaging.php"/>
              <form method="POST" action="messaging.php">
              <button type="submit" name="landlord" value="'.$value.'" class="btn btn-primary  btn-md">
              Contact Landlord
              </button>
              </form>
              </div> ';

            } else {
                echo '  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
            };
            echo '                                               
 
                 </div></td> <br> </tr> </table></center>';
        }

    }
} else {
    echo '<h2 class = "sd-text" > No Results !</h2>';
}

$conn->close();

?>
