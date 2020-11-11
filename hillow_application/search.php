<?php
include 'db.php';
session_start();
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <link rel="stylesheet" href="css/main.css" />
    <title>Hillow: Real Estate Marketplace</title>
</head>

<body>

<div name="filter" style="width: fit-content; margin-top: 1%; margin-left: 33%;">
    <form id="filter_form" class="form-inline ml-3" method="POST" action="filtered_results.php">
        <div class="d-inline">
            <select name="price_range" class="custom-select my-1 mr-sm-2 text-center" id="inlineFormCustomSelectPref">
                <?php
                $price_range = $_POST['price_range'];
                echo '<h2> SEARCH RESULTS</h2>';
                ?>
                <option <?php if ($price_range == "Any") echo 'Selected'; ?> value="Any">Price</option>
                <option <?php if ($price_range == "Less than $1000") echo 'Selected'; ?> value="Less than $1000"> Less than $1000</option>
                <option <?php if ($price_range == "Between $1000 and $2000") echo 'Selected'; ?> value="Between $1000 and $2000"> Between $1000 and $2000</option>
                <option <?php if ($price_range == "Between $2000 and $3000") echo 'Selected'; ?> value="Between $2000 and $3000">Between $2000 and $3000</option>
                <option <?php if ($price_range == "Between $3000 and $4000") echo 'Selected'; ?> value="Between $3000 and $4000"> Between $3000 and $4000</option>
                <option <?php if ($price_range == "More than $4000") echo 'Selected'; ?> value="More than $4000"> More than $4000</option>
            </select>
        </div>
        <div class="d-inline">
            <select name="distance" class="custom-select my-1 mr-sm-2 text-center" id="inlineFormCustomSelectPref">
                <?php
                $distance = $_POST['distance'];
                echo '<h2> SEARCH RESULTS</h2>';
                ?>
                <option <?php if ($distance == "Any") echo 'Selected'; ?> value="Any">Distance to SFSU</option>
                <option <?php if ($distance == "Less than 1 mi.") echo 'Selected'; ?> value="Less than 1 mi.">Less than 1 mi.</option>
                <option <?php if ($distance == "Less than 2 mi.") echo 'Selected'; ?> value="Less than 2 mi.">Less than 2 mi.</option>
                <option <?php if ($distance == "Less than 3 mi.") echo 'Selected'; ?> value="Less than 3 mi.">Less than 3 mi.</option>
                <option <?php if ($distance == "More than 3 mi.") echo 'Selected'; ?> value="More than 3 mi.">More than 3 mi.</option>
            </select>
        </div>
        <div class="d-inline">
            <button class="btn btn-secondary" type="submit" name="submit_filter"> Search </button>
        </div>
    </form>
</div>
<hr>
<div>
    <br>
    <?php include 'results.php' ?>
</div>
</body>

<br><br>



</html>


