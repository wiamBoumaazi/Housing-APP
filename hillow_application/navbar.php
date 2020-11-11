<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hillow: Real Estate Marketplace</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
<body>
<div>
<!-- Navigation -->
        <h6 class="text-center p-4" style="color: dimgrey">SFSU Software Engineering Summer 2020 Team 04</h6>

<nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">

	<div class ="container-fluid">

		<a class = "navbar-brand" href="index.php"><img src="img/logo.png" style="width: 50%"></a>
		<button class = "navbar-toggler" type= "button" data-toggle = "collapse"
		data-target ="#navbarResponsive">
	<span class= "navbar-toggler-icon"></span>
</button>
        <?php
        if(isset($_SESSION['first_name']) && !empty($_SESSION['first_name']))
        {
            echo'  <a class="navbar-brand"><div style="color:purple;">Hello, ' .$_SESSION['first_name']. '</div></a> ';
        }
        ;
        ?>
<div class= "collaple navbar-collapse" id = "navbarResponsive">
        <div class="myform" style="margin-left:45px;">
            <?php
                if (isset($_GET['error'])){
                    if ($_GET['error'] == "invalidentry" ){
                    echo '<p class= " searcherror texts"> The entry is invalid!</p>';
                }
                    }
                ?>
            <form id="search_form" class="form-inline my-2  d-flex" method="POST" action="search.php">
                <select name="select" class="form-control" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    $search = $_POST['search'];
                    $select = $_POST['select'];
                    echo '<h2> SEARCH RESULTS</h2>';
                    ?>
                    <option class="dropdown-item"  value="All">All</option>
                    <option class="dropdown-item" <?php if ($GLOBALS['select'] == "Apartment") echo 'Selected'; ?> value="Apartment"> Apartment</option>
                    <option class="dropdown-item" <?php if ($GLOBALS['select'] == "Room") echo 'Selected'; ?> value="Room">Room</option>
                    <option class="dropdown-item" <?php if ($GLOBALS['select'] == "House") echo 'Selected'; ?>  value="House">House</option>
                </select>
                <input class="form-control" name="search" maxlength='40' type="search" placeholder="Enter address or zip code" aria-label="Search" style="width:500px;">
                <button class="btn btn-secondary" name="submit" type="submit" value="<?php echo $search;?>" style="margin-left:2px;">Search</button>


            </form>


        </div>
</div>



        <?php
        if(isset($_SESSION['email']) && !empty($_SESSION['email'] )) {
            echo'
            <a class = "sd-text ml-3"  ';
            if($_SESSION['type']=="Landlord"){echo ' href="landlord_dashboard.php"';}
            elseif($_SESSION['type']=="User"){echo ' href="user_dashb.php"';}
            elseif($_SESSION['type']=="Admin"){echo ' href="admin_dashb.php"';}
            echo'
          >
            
            DASHBOARD
          </a>
         
         
         
         
          <a class = "sd-text ml-3" href="aboutus.php">ABOUT</a>';

        }
        if(isset($_SESSION['email']) && !empty($_SESSION['email'] )) {
            if($_SESSION['type']=="User"){
                echo'        
          
          <a class = "sd-text ml-3" href="user_messages.php">
          
            MESSAGES
          </a>
          </a> 
        ';
            }
        }
        ?>
        <?php
        if(isset($_SESSION['email']) && !empty($_SESSION['email'] )) {

                echo'        
          
          <a class = "sd-text ml-3" href="post.php">
          
            POST
          </a>
          
        ';

        }
        ?>

        </ul>

        <?php
        if(isset($_SESSION['email']) && !empty($_SESSION['email']))
        {
            echo'        <ul class="navbar-nav ml-auto">
              
                <a class = "sd-text ml-3" href="logout.php">
                  
                  LOG OUT</a>
             
            </ul>
          </div>
       ';
        }
        else {
            echo'<ul class="navbar-nav ml-auto">
              <a class = "sd-text" href="aboutus.php">

            ABOUT
          </a>
          <a class = "sd-text" href="login.php" style="margin-left:20px;">

            POST
          </a>
                <a class = "sd-text ml-3" href ="login.php" style="margin-left:20px;" >
                 
                  LOG IN</a>
             
            </ul>
          </div>
       ';

        }

        ;
        ?>

    </div>


</nav>
</div>
</body>
</html>