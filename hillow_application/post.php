

<?php include 'db.php' ?>
<?php session_start();
include 'navbar.php' ?>



<html>

<head>
    <meta charset="utf-8">
    <title>admin listings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="style.css" rel="stylesheet">

    <style>
        .col{
            color: red;
        }
        .texts {
            color: red;
        }
    </style>

</head>

<div>




<div class="bg-primary text-center py-5 mb-4" >
    <div class="container">
        <h1 class="sd-text">Post a new Listing</h1>
    </div>

</div>

<?php
if (isset($_GET['error'])){
    if ($_GET['error'] == "emptyfields" ){
        echo '<p class= " posterror texts"> Fill in all the mandatory fields!</p>';
    }
}
?>

<form method="post" action=" insert_listing.php" enctype="multipart/form-data">
    <div><h6 style="color:red; margin-left: 5%;" > Fields with * mark are mandatory!</h6></div>
    <div class="form-group col-md-12" id="type">
        <label style="color:darkred;"> Type:</label>
        <select class="form-control" name="type" style="width: 10%; display:inline; margin-left:1%">
            <option >Choose</option>
            <option value="Apartment">Apartment</option>
            <option value="Room">Room</option>
            <option value="House">House</option>
        </select>
    </div>

    <fieldset class="form-group col-md-12">
        <label style="color:darkred;"> *Address: </label>
        <input class="form-control" type="text" name="address" placeholder="Address" style='width:35%;display:inline;margin-left:3px' />
    </fieldset>

    <fieldset class="form-group col-md-12">
        <label style="color:darkred;"> *ZipCode: </label>
        <input class="form-control" type="text" name="zipcode" placeholder="Zip code" style='width:30%;display:inline' />
    </fieldset>

    <fieldset class="form-group col-md-12">
        <div  id="bedroomBathroom" style='display:inline'>
            <label style="color:purple;">Bedrooms:</label>
            <select class="form-control" name="number_bed" style='display:inline; width : 5%' >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
         &nbsp; &nbsp;



            <label  style="color:purple;">Bathrooms:</label>
            <select class="form-control" name="number_bath" style='display:inline; width : 5%' >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
    </fieldset>
    <div style='margin-top:7px; display : inline'>
        <fieldset class="form-group col-md-12">
            <label  style="color:darkred;" for="c2">*Price per Month:</label>
            <input type="text" name="price" placeholder="$$$$" style='margin-left:2px; border-radius: 4px;padding: .375rem .75rem;border: 1px solid silver;border-radius: 0.5rem;' />
            <label style="color:darkred;" for="c2">*Distance to SFSU:</label>
            <input type="text" name="distance" placeholder="mi." style='width : 13%;margin-left:2px;border-radius: 4px;padding: .375rem .75rem;border: 1px solid silver;border-radius: 0.5rem;' />
        </fieldset>
        <div>
            <br>
            <fieldset>
                <div class="form-group col-md-12">
                    <label style="color:darkred;">*Upload image:</label>
                    <input type="file" name="image"/>
                    (2 MB MAX)
                </div>
            </fieldset>
            <fieldset class="form-group col-md-12">
                <div class="form-group">
                    <textarea class="form-control" name="description" placeholder="Description (Optional)" rows="7" style ="width : 30%"></textarea>
                </div>

                <div>
                    <small>It might take up tp 24h to approve your post </small>
                </div>
                <br>
                <button type="submit" name="submit" style='float:left;margin-left:2% '>
                    Submit
                </button>


            </fieldset>



</form>

</div>

<div>
    <?php include "footer.php" ?>
</div>
</body>

</html>

