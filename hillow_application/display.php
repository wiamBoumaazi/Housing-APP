<?php

include 'db.php';
$user_id = $_SESSION["user_id"];
$sql = "SELECT property.pid AS `pid`,
               property.type AS `type` ,
               property.address AS `address`,
               property.image AS `image`,
               property.nBed AS `bed`,
               property.nBath AS `bath`,
               property.price AS `price`
FROM property WHERE property.owner='$user_id' ";
$result = $conn->query($sql);
$counter = 0;


echo'<div class="container" id="messageList">
 <table class="table">
   <thead class="thead-dark">
     <tr>
       <th scope="col" width="10px">#</th>
       <th scope="col" width="10px">P_ID</th>
       <th scope="col" width="150px">Type</th>
       <th scope="col" width="200px">Address</th>
       <th scope="col" width="200px">Image</th>
       <th scope="col" width="10px">Beds</th>
       <th scope="col" width="10px">Baths</th>
       <th scope="col" width="40px">$$$</th>
     </tr>
   </thead>
   <tbody>';


if ($result->num_rows >= 0) {
    while ($row = $result->fetch_assoc()) {
        $counter++;
        echo'
   <tr>
       <td> '.$counter.'</td>
       <td> '.$row["pid"].' </td>
       <td> '.$row["type"].'</td>
       <td> '.$row["address"].'</td>
       <td><img width="257px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Card image cap"> </td>
       <td> '.$row["bed"].'</td>
       <td> '.$row["bath"].'</td>
       <td> '.$row["price"].'</td>


     </tr>';
    }}
echo'
  </tbody>
 </table>
 </div>

' ;
?>

