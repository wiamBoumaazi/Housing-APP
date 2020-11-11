<?php
$data[]= array();
$sql = "NULL";

$submit = $_POST['submit'];
$search = $_POST['search'];
$select = $_POST['select'];

if (isset($submit)) {
    if ($select=="All"){
        if (!isset($search)){
            $sql = "SELECT * FROM listing ORDER BY PRICE";
        }
        else {
                $sql = "SELECT * FROM listing WHERE (`description` LIKE '%" . $search . "%') OR (`address` LIKE '%" . $search . "%') OR (`zipcode` LIKE '%" . $search . "%') ORDER BY PRICE";
            }
    }
    else if ($select!="All") {
        if (empty($search)) {
            $sql = "SELECT * FROM listing WHERE type='$select' ORDER BY PRICE";
        } else {
                $sql = "SELECT * FROM listing WHERE (type='$select' AND (`description` LIKE '%" . $search . "%' OR `address` LIKE '%" . $search . "%' OR `zipcode` LIKE '%" . $search . "%')) ORDER BY PRICE";

        }
    }
    else if (!is_null($select) && isset($search)){
        $sql = "SELECT * FROM listing WHERE (type='$select' AND `description` LIKE '%".$search."%') OR (`address` LIKE '%".$search."%')OR (`zipcode` LIKE '%".$search."%')";
    }
    else { echo ' NOTHING';}
}



try {
    $result = $conn->query($sql);
}
catch(Exception $e) {
    echo 'Error Message: '.$e->getMessage();
}
$counter = 0;
echo '
<h4 style="margin-left: 10% ; color:purple ">Total number of listings : '.$result->num_rows.'</h4>';

while(($row = mysqli_fetch_array($result, MYSQLI_ASSOC))){
    $data[]=$row["pid"];
    $value=$row["pid"];
    $counter++;
    if ($counter % 4 == 1) {
        echo '
                    <center><table style="width:80%"><br>
                    <tr class="mix"> <td style="width:200px;"> <div class="card" style="width:260px">
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
                            <large class="list">  <b> zip code : ' . $row["zipcode"] . '  </b></large>
                            <br>
                        </p>
                     </div>
                     ';

        if (isset($_SESSION['email']) && !empty($_SESSION['email']))
        {
           // $value=$row["landlord"];
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
        }
        echo'  </div></td>';
    } elseif ($counter % 4 == 2) {
        echo '
                    <td style="width:200px;"> <div class="card" style="width:260px;">
                    <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
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
                            <large class="list">  <b> zip code : ' . $row["zipcode"] . '  </b></large>
                            <br>
                        </p>
                     </div>                   
                      ';

        if (isset($_SESSION['email']) && !empty($_SESSION['email']))
        {
            //$value=$row["landlord"];
            echo'  
                     <div class="text-center"><a href="messaging.php"/>
                     <form method="POST" action="messaging.php">
                     <button type="submit" name="landlord" value="'.$value.'" class="btn btn-primary  btn-md">
                     Contact Landlord
                     </button>
                     </form>
                     </div>';
        } else {
            echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div><br> ';
        }
        echo'  </div></td>';
    } elseif ($counter % 4 == 3) {
        echo '
                    <td style="width:200px;"> <div class="card" style="width:260px;">
                    <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
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
                            <large class="list">  <b> zip code : ' . $row["zipcode"] . '  </b></large>
                            <br>
                        </p>
                     </div>                   
                     ';

        if (isset($_SESSION['email']) && !empty($_SESSION['email']))
        {
           // $value=$row["landlord"];
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
        }
        echo'  </div></td>';
    }
    elseif ($counter % 4 == 0) {
        echo '
                    <td style="width:200px;"> <div class="card" style="width:260px; margin-left: 20%;">
                    <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
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
                            <large class="list">  <b> zip code : ' . $row["zipcode"] . '  </b></large>
                            <br>
                        </p>
                     </div>                   
                     ';

        if(isset($_SESSION['email']) && !empty($_SESSION['email']))
        {
           // $value=$row["landlord"];
            echo'  
                    <div class="text-center"><a href="messaging.php"/>
                    <form method="POST" action="messaging.php">
                    <button type="submit" name="landlord" value="'.$value.'" class="btn btn-primary  btn-md">
                    Contact Landlord
                    </button>
                    </form>
                    </div> ';
        }else{
            echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div><br> ';
        }
        echo'  </div></td>';
    }
    else {
        echo '</table></center><h2 class = "sd-text" > No Results!</h2>';
    }}
echo '</table></center>';
$_SESSION['data']=$data;

$conn->close();


