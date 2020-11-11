<?php

include('db.php');
$id = $_SESSION['user_id'];

$sql="SELECT * FROM `listing` as d INNER JOIN `messaging` as c WHERE d.pid=c.pid  AND d.landlord=$id";
$usersql="SELECT * FROM `users` as a INNER JOIN `messaging` as b  INNER JOIN `listing` as c WHERE a.uid = b.uid AND c.pid=b.pid  AND c.landlord=$id";
$msgsql = "SELECT * FROM `messaging` as a INNER JOIN `users` as b INNER JOIN `listing` as c WHERE a.uid = b.uid AND c.pid=a.pid  AND c.landlord=$id";
$result = $conn->query($sql);
$msgresult = $conn->query($msgsql);
$userresult = $conn->query($usersql);

$counter = 0;


while ($rows = $result->fetch_assoc() ) {
    $row = $userresult->fetch_assoc();
    $rowss = $msgresult->fetch_assoc();
            $counter++;
            if ($counter % 3 == 1) {

                echo '<br>
            <center><table style="width:80%">
            <tr class="mix"> <td style="width:350px;"> <div class="card" style="width:350px">
            <img width="340px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($rows['image']) . '" alt="Card image cap">
             <div class="card-body" style="width:350px">
               <div class="list">  <b> Address : </b> ' . $rows["address"] . ' </div>
               <div class="list"> <b> Price: </b> ' . $rows["price"] . ' </div> 
               <div class="list">  <b> Distance to SFSU : ' . $rows["distance"] . '  </b></div> 
               <div class="list">  <b> Message From : ' . $row["first_name"] . ' ' . $row["last_name"] . '</b></div>  
               <div class="list">  <b> Sender email : ' . $row["email"] . '</b></div>  
               <div class="list">  <b> message : ' . $rowss["message"] . '</div>  
               <div class="list">  <b> Date : ' . $rowss["date"] . '</b></div> 
               

               ';

                echo '  </div></td>';
            } elseif ($counter % 3 == 2) {
                echo '
            <td style="width:350px;">
             <div class="card" style="width:350px">
            <img width="340px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($rows['image']) . '" alt="Card image cap">
             <div class="card-body" style="width:350px">
               <div class="list">  <b> Address : </b> ' . $rows["address"] . ' </div>
               <div class="list"> <b> Price: </b> ' . $rows["price"] . ' </div> 
               <div class="list"> <b> Distance to SFSU : ' . $rows["distance"] . '  </b></div> 
              <div class="list">  <b> Message From : ' . $row["first_name"] . ' ' . $row["last_name"] . '</b></div>  
               <div class="list">  <b> Sender email : ' . $row["email"] . '</b></div> 
               <div class="list">  <b> message : ' . $rowss["message"] . '</div> 
               <div class="list">  <b> Date : ' . $rowss["date"] . '</b></div> 

               ';


                echo '
                 </div></td>';
            } else if ($counter % 3 == 0) {
                echo '
            <td style="width:350px;"> <div class="card" style="width:350px">
            <img width="340px" height = "200px" src="data:image/jpeg;base64,' . base64_encode($rows['image']) . '" alt="Card image cap">
             <div class="card-body" style="width:350px">
               <div class="list"> <b> Address : </b> ' . $rows["address"] . ' </div>
               <div class="list"> <b> Price: </b> ' . $rows["price"] . ' </div> 
               <div class="list">  <b> Distance to SFSU : ' . $rows["distance"] . '  </b></div> 
               <div class="list">  <b> Message From : ' . $row["first_name"] . ' ' . $row["last_name"] . '</b></div> 
                <div class="list">  <b> Sender email : ' . $row["email"] . '</b></div> 
                <div class="list">  <b> message : ' . $rowss["message"] . '</div> 
                <div class="list">  <b> Date : ' . $rowss["date"] . '</b></div> 
               ';

                echo '                                               
 
                 </div></td> <br> </tr> </table></center>';

            }
}
