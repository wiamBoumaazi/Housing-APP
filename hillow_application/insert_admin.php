
<style>
.row
{margin: 0 -5px;
width: 50%}

</style>


<?php


    $data[] = array();
    $sql = "NULL";
    $sql = "SELECT * FROM listing ORDER BY PRICE";
    $result = $conn->query($sql);

    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC))) {
        $data[] = $row["pid"];

        echo '
                    <center><table class="row" style="width:50%"><br>
                    <tr class="row"> 
                    <td style="width:200px;"> 
                    <div class="card" style="width:260px">
                    <div class="text-center" style="color: purple";> <b>'.$row["type"].'</b> </div>
                    <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
                     <div class="card-body" style="width:260px">
                        <p class="card-text"> 
                            <large class="list"> <b> Price: $</b> ' . $row["price"] . ' </large>
                            <br>
                            <large class="list"> <b> Bedrooms: </b> ' . $row["number_bed"] . ' </large> 
                            <br>
                            <large class="list"> <b> Bathrooms: </b> ' . $row["number_bath"] . ' </large> 
                            <br>
                            <large class="list">  <b> Address : </b> ' . $row["address"] . ' </large>   
                            <br>
                            <large class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </b></large>
                            <br>
                        </p>
                     </div>
                     ';

        if (isset($_SESSION['email']) && !empty($_SESSION['email']))
        {
            $value=$row["pid"];
            echo'  
                    <div class="text-center"><a href="messaging.php"/>
                    <form method="POST" action="messaging.php">
                    <button type="submit" name="landlord" value="'.$value.'" class="btn btn-primary  btn-md">
                    Contact Landlord
                    </button>
                    </form>
                    </div> ';
        } else {
            echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div><br> ';
        }echo' <br>';

        echo'  
                    <div class="text-center">
                    <form method="POST" action="">
                    <button type="submit" name="approve" value="'.$value.'" class="btn btn-primary  btn-md">
                    Approve
                    </button>
                    </form>
                    </div> ';
        echo'  </div></td>';
        echo '</table></center>';
        $_SESSION['data']=$data;
    }

