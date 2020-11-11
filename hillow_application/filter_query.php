<?php
        include('db.php');
         $sql = "NULL";
         $flag = "";

        $submit_filter= $_POST['submit_filter'];
        $price_range= $_POST['price_range'];
        $distance = $_POST['distance'];
        $sql = "SELECT * FROM listing";
            if (isset($submit_filter)) {
                if (isset($price_range) && !empty($distance)){
                    if ($price_range == "Less than $1000"){
                    $sql .=" WHERE `price` <= 1000";
                    }
                elseif($price_range == "Between $1000 and $2000"){
                    $sql .= " WHERE `price` BETWEEN 1000 AND 2000";
                }
                elseif($price_range == "Between $2000 and $3000"){
                    $sql .= " WHERE `price` BETWEEN 2000 AND 3000;";
                }
                elseif($price_range == "Between $3000 and $4000"){
                    $sql .= " WHERE `price` BETWEEN 3000 AND 4000";
                }
                elseif($price_range == "More than $4000"){
                    $sql .= " WHERE `price` >= 4000";
                }
                elseif ($price_range == "Any"){
                    $sql = "SELECT * FROM listing";
                }
            }
            if (isset($distance) && !empty($price_range)){
                if ($distance == "Less than 1 mi."){
                    if ( $sql != "SELECT * FROM listing"){
                        $sql .=" AND `distance` <= 1.00;";
                    } else {
                        $sql .=" WHERE `distance` <= 1.00";
                        
                    }
                }
            elseif ($distance == "Less than 2 mi."){
                if ( $sql != "SELECT * FROM listing"){
                    $sql .=" AND `distance` <= 2.00;";
                
                } else {
                    $sql .=" WHERE `distance` <= 2.00";
                }
            }
            elseif ($distance == "Less than 3 mi."){
                if ( $sql != "SELECT * FROM listing"){
                    $sql .=" AND `distance` <= 3.00;";
                } else {
              
                    $sql .=" WHERE `distance` <= 3.00";
                }
            }
            elseif($distance == "More than 3 mi."){
                if ( $sql != "SELECT * FROM listing"){
                    $sql .=" AND `distance` >= 4.00";
                } else {
                    $sql .=" WHERE `distance` >= 4.00";

                }
            }
            elseif($distance == "Any"){
                if ($sql == "SELECT * FROM listing")  {
                       $sql.=";";}
               else {
                $sql .= ";";
               }
        }
        }
        echo $flag;

        }

            try {
                $result = $conn->query($sql);
                if (!$result) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }
              }

              catch(Exception $e) {
                echo 'Error Message: ' .$e->getMessage();
              }
              $counter =0;
              $void = true;
              while(($row = mysqli_fetch_array($result, MYSQLI_ASSOC))>0){
                   if ( in_array($row["pid"], $_SESSION['data'] ,false)){
                       $void = false;
                       $value=$row["pid"];
                       $counter++;
                       if ($counter % 4 == 1) {
                        echo '<br>
                            <center><table style="width:80%; margin-top:-2rem"><br>
                            <tr class="mix"> <td style="width:200px;"> <div class="card" style="width:260px">
                            <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
                            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
                            </div>
                             <div class="card-body" style="width:260px">
                             <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div>
                             <div class="list"> <b> Bedrooms: </b> ' . $row["number_bed"] . ' </div> 
                             <div class="list"> <b> Bathrooms: </b> ' . $row["number_bath"] . ' </div> 
                             <div class="list">  <b> Address : </b> ' . $row["address"] . ' </div>   
                             <div class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </div> 
                              <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div><br>                         
                         ';
                             if(isset($_SESSION['email']) && !empty($_SESSION['email']))
                             {
                             //  $value=$row["landlord"];
                            echo'  
                            <div class="text-center"><a href="messaging.php"/>
                            <form method="POST" action="messaging.php">
                            <button type="submit" name="landlord" value="'.$value.'" class="btn btn-primary  btn-md">
                            Contact Landlord
                            </button>
                            </form>
                            </div> ';
                            }else{
                                 echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
                             }
                            
                         ;
                      } elseif ($counter % 4 == 2) {
                        echo '
                            <td style="width:200px;"> <div class="card" style="width:260px">
                            <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
                            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
                            </div>
                             <div class="card-body" style="width:260px">
                             <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div>
                             <div class="list"> <b> Bedrooms: </b> ' . $row["number_bed"] . ' </div> 
                             <div class="list"> <b> Bathrooms: </b> ' . $row["number_bath"] . ' </div> 
                             <div class="list">  <b> Address : </b> ' . $row["address"] . ' </div>     
                             <div class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </b></div>
                               <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div><br>                          
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
                                 echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
                             }
                            
                         ;
                      } elseif ($counter % 4 == 3) {
                        echo '
                            <td style="width:200px;"> <div class="card" style="width:260px">
                            <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
                            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
                            </div>
                             <div class="card-body" style="width:260px">
                             <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div>
                             <div class="list"> <b> Bedrooms: </b> ' . $row["number_bed"] . ' </div> 
                             <div class="list"> <b> Bathrooms: </b> ' . $row["number_bath"] . ' </div> 
                             <div class="list">  <b> Address : </b> ' . $row["address"] . ' </div>                            
                             <div class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </b></div>
                               <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div><br>                          
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
                                 echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
                             }
                            
                         ;
                         echo'  </div></td>';
                      }
                      elseif ($counter % 4 == 0) {
                        echo '
                            <td style="width:200px;"> <div class="card" style="width:260px">
                            <div class="text-center" style="color:purple";> <b>  '.$row["type"].'  </b> </div>
                            <img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap">
                            </div>
                             <div class="card-body" style="width:260px">
                             <div class="list"> <b> Price: </b> ' . $row["price"] . ' </div>
                             <div class="list"> <b> Bedrooms: </b> ' . $row["number_bed"] . ' </div> 
                             <div class="list"> <b> Bathrooms: </b> ' . $row["number_bath"] . ' </div> 
                             <div class="list">  <b> Address : </b> ' . $row["address"] . ' </div>                            
                             <div class="list">  <b> Distance to SFSU : ' . $row["distance"] . '  </b></div>  
                              <div class="list">  <b> zip code: ' . $row["zipcode"] . '  </b></div> <br>                          
                             ';

                             if(isset($_SESSION['email']) && !empty($_SESSION['email']))
                             {
                             //  $value=$row["landlord"];
                            echo'  
                            <div class="text-center"><a href="messaging.php"/>
                            <form method="POST" action="messaging.php">
                            <button type="submit" name="landlord" value="'.$value.'" class="btn btn-primary  btn-md">
                            Contact Landlord
                            </button>
                            </form>
                            </div> ';
                            }else{
                                 echo'  <div class="text-center"><a href="login.php"/> <button type="button" class="btn btn-primary  btn-md">Contact Landlord</button></div> ';
                             }
                            
                         ;
                              echo'</td></tr>';
                      }
                     else {
                    }
                   }                   

               }    
            if ($void){
                echo '</table></center><h2 class = "sd-text" > No Results !</h2>';

            }
            echo '</table></center>';
            $conn -> close();
        ?>