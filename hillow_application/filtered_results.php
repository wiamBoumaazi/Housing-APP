<?php
include('db.php');
session_start();
include ('navbar.php');
?>

<div name="filter" style="width: fit-content; margin-top: 1%; margin-left: 30%;">
    <form id="filter_form" class="form-inline ml-3" method="POST" action="filtered_results.php">
      <br>
        <div class="d-inline">
        <select name="price-range" class="custom-select my-1 mr-sm-2 text-center" id="inlineFormCustomSelectPref">
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
    <button type="submit" name="submit_filter" class="btn btn-secondary"> Search </button>
</div>
</form>
</div>
  <hr>
  <div>

  <br>

<?php include 'filter_query.php' ?>
</div>
</body>
<br><br>
</html>
