<?php

include "../php/generate.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Hitch!</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/foundation.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/jquery.modal.css">
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/jquery.modal.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/foundation.min.js"></script>
  </head>
  <body>
    <div class="fixed">
      <nav class="top-bar" id="dash-bar" data-topbar="">
        <ul class="title-area">
          <li class="name">
            <h1 style="color: #0AD157; margin-left: 10px">Hitch!</h1>
          </li>
        </ul>
      </nav>
    </div>

    <a href="#" onclick="submitButton()">
      <div id="submit-button">
        <h3>+ Submit a ride</h3>
      </div>
    </a>

    <form action="../php/functions.php" method="post" id="submit-modal" class="modal">
      
      <div class="row">
        <div class="small-12 column">
          <h1>Submit a ride</h1>
          <h4 style="color: red">Please search to see if a similar ride exists before you submit!</h4>
        </div>
      </div>      

      <div class="row">
        <div class="small-12 column">
          <input name="origin" type="text" placeholder="Origin" id="submit-origin-field">
        </div>
      </div>
      <div class="row">
        <div class="small-12 column">
          <input type="text" name="destination" placeholder="Destination" id="submit-destination-field">
        </div>
      </div>
      <div class="row">
        <div class="small-6 column">
          <input type="date" placeholder="Date" name="date" id="submit-date-field">
        </div>
        <div class="small-6 column">
          <input type="time" placeholder="Time" name="time" id="submit-time-field">
        </div>
      </div>
      <div class="row">
        <div class="small-4 column">
          <input type="number" placeholder="Seats" name="seats" id="submit-seats-field">
        </div>
        <div class="small-8 column">
         <input type="text" placeholder="Phone number" name="phonenumber" id="submit-phone-field"> 
        </div>
      </div>
     <!-- <div class="row">
     #  <div class="small-4 column">
         <input type="checkbox" value="car" name="car" id="submit-hascar-field">
          <label for="has_car">Have a car?</label>
        </div> --> 
        <div class="small-12 column">
          <input type="email" placeholder="Email" name="email" id="submit-email-field">
        </div>
      </div>
      <div class="row">
        <input type="submit" href="#" class="button expand" id="search-submit-button"></input>
      </div>
    </form>

    <div class="wrapper">
    <div class="side-float-box">
      
      <form>
        <div class="row">
          <div class="small-12 column">
            <h3>Search for a ride</h3>
          </div>
        </div>
        <div class="row">
          <div class="small-8 column">
            <input type="text" placeholder="Origin" id="origin-address">
          </div>
          <div class="small-4 column">
            <input type="text" placeholder="Within (mi)" id="origin-distance">
          </div>
        </div>
        <div class="row">
          <div class="small-12 column">
            <input type="text" placeholder="Destination" id="destination-address">
          </div>
        </div>
        <div class="row">
          <div class="small-6 column">
            <input type="date" id="min-date">
          </div>
          <div class="small-6 column">
            <input type="date" id="max-date">
          </div>
        </div>
        <div class="row">
          <div class="small-6 column">
            <input type="time" id="min-time">
          </div>
          <div class="small-6 column">
            <input type="time" id="max-time">
          </div>
        </div>
        <div class="row">
        <div class="small-12 column">
        <a href="#" class="button expand" onclick="getAddress()">Search</a>
        </div>
        </div>
      </form>
    </div>



        <div class="small-12 column" style="text-align: left">
          <h1>Upcoming Rides</h1>
        </div>
    
<?php
if($_GET["hash"]){
$newhash = $_GET["hash"];
generate_rides("select * from Rides where Hash='$newhash';");
}else{
generate_rides("select * from Rides order by Departure_Date desc, Departure_Time limit 10;");
}
?>
    <?php
	echo "<form id=\"hitch-modal\" class=\"modal\" method=\"post\" action=\"../php/update.php?hash=$newhash\">";
	?>
      <div class="row">
        <div class="small-6 column">
          <input type="text" placeholder="Name" name="name-hitcher-field">
        </div>
        <div class="small-6 column">
          <input type="text" placeholder="Phone" name="phone-hitcher-field">
        </div>
      </div>
      <div class="row">
        <div class="small-12 column">
          <input type="text" placeholder="Email" name="email-hitcher-field">
        </div>
      </div>
      <div class="row">
        <div class="small-12 column">
          <h1>Hitch this ride?</h1>
        </div>
      </div>
      <div class="row">
        <a><div class="small-6 column" style="background-color: f3f3f3">
        <h2 style="color:green">Yes</h2><input href="#" type="submit"></input> 
        </div></a>
        <a><div class="small-6 column" style="background-color: f3f3f3">
        <h2 style="color:red">No</h2>
        </div></a>
      </div>

    </form> 

    </div>
  </body>
</html>
