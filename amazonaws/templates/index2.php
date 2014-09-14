<?php

include "../php/functions.php";
include "../php/generate.php";
?>


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

    <form action="../functions.php" method="post" id="submit-modal" class="modal">
      
      <div class="row">
        <div class="small-12 column">
          <h1>Submit a ride</h1>
          <h4 style="color: red">Please search to see if a similar ride exists before you submit!</h4>
        </div>
      </div>      

      <div class="row">
        <div class="small-12 column">
          <input type="text" placeholder="Origin" id="submit-origin-field">
        </div>
      </div>
      <div class="row">
        <div class="small-12 column">
          <input type="text" placeholder="Destination" id="submit-destination-field">
        </div>
      </div>
      <div class="row">
        <div class="small-6 column">
          <input type="date" placeholder="Date" id="submit-date-field">
        </div>
        <div class="small-6 column">
          <input type="time" placeholder="Time" id="submit-time-field">
        </div>
      </div>
      <div class="row">
        <div class="small-4 column">
          <input type="number" placeholder="Seats" id="submit-seats-field">
        </div>
        <div class="small-8 column">
         <input type="text" placeholder="Phone number" id="submit-phone-field"> 
        </div>
      </div>
      <div class="row">
        <div class="small-4 column">
          <input type="checkbox" value="car" id="submit-hascar-field">
          <label for="has_car">Have a car?</label>
        </div> 
        <div class="small-8 column">
          <input type="email" placeholder="Email" id="submit-email-field">
        </div>
      </div>
      <div class="row">
        <a href="#" class="button expand" id="search-submit-button">Submit</a>
      </div>
    </form>

    <div class="wrapper">
    <div class="side-float-box">
      <h3>Search for a ride</h3>
      <form>
        <input type="text" placeholder="Origin">
        <input type="text" placeholder="Destination">
        <input type="text" placeholder="Date">
        <input type="text" placeholder="Time">
        <a href="#" class="button expand">Search</a>
      </form>
    </div>



        <div class="small-12 column" style="text-align: left">
          <h1>Upcoming Rides</h1>
        </div>
    
<?php
   generate_rides('Select * from Rides order by Departure_Date desc, Departure_Time limit 10;'); 
?>
        <div class="small-12 column">
          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="width: 65px">
                  <a href="#"><div class="img-holder"><span style="font-weight: bold; color: green;">HITCH!</span></div></a>
                </td>
                <td style="width:120px">
                  <span style="font-size: 16px">Sep 14 2014</span>
                </td>
                <td>
                  <span style="color: #25D6FF">
                    This ride has a driver!
                  </span> | 
                  <span style="color:green">
                    3/5 spots taken
                  </span>
                </td>
              </tr>
              <tr>
                <td style="width:80px">
                  <span style="">12:44 AM</span>
                </td>
                <td><span style="">8809 38th Avenue Baltimore MD, 20874</span> <span style="color:#999999">-></span> <span style="">Alex's butthole</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      
      
      
        <div class="small-12 column">
          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="width: 65px">
                  <div class="img-holder"><span style="font-weight: bold; color: red;">FULL</span></div>
                </td>
                <td style="width:120px">
                  <span style="font-size: 16px">Sep 14 2014</span>
                </td>
                <td>
                  <span style="color: #25D6FF">
                    This ride has a driver!
                  </span> | 
                  <span style="color:red">
                    4/4 spots taken
                  </span>
                </td>
              </tr>
              <tr>
                <td style="width:80px">
                  <span style="">9:14 PM</span>
                </td>
                <td><span style="">8809 38th Avenue Baltimore MD, 20874</span> <span style="color:#999999">-></span> <span style="">Alex's butthole</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      

      
        <div class="small-12 column">
          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="width: 65px">
                  <a href="#"><div class="img-holder"><span style="font-weight: bold; color: green;">HITCH!</span></div></a>
                </td>
                <td style="width:120px">
                  <span style="font-size: 16px">Sep 15 2014</span>
                </td>
                <td>
                  <span style="color: orange">This ride needs a driver!</span> | 
                  <span style="color:green">
                    1/6 spots taken
                  </span>
                </td>
              </tr>
              <tr>
                <td style="width:80px">
                  <span style="">7:00 AM</span>
                </td>
                <td><span style="">8809 38th Avenue Baltimore MD, 20874</span> <span style="color:#999999">-></span> <span style="">Alex's butthole</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      

    </div>
  </body>
</html>
