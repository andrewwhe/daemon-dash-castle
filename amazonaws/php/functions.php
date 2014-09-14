<?php
$con=mysqli_connect("localhost", "root", "sigmaphidelta", "DaemonDashDashDash");
#$sql="INSERT INTO Rides (Name, Email, Car, Origin, Destination, Departure_Date, Departure_Time, Phone_Number, Total_Seats, Seats_Taken) Values ('test', 'test@test', 'true', 'test', 'test', '2014-08-19', '09:09:09', '293820', '4', '5')"; 
#if (mysqli_connect_errno()){
#	echo "Failed to connect to MySqL" . mysqli_connect_error();
#}
$origin = mysqli_real_escape_string($con, $_POST['origin']);
$destination = mysqli_real_escape_string($con, $_POST['destination']);
$date = $_POST['date'];#date( "Y-m-d", $_POST['date']);
#$date = mysqli_real_escape_string($con, $_POST['date']);
#$time = mysqli_real_escape_string($con, $_POST['time']);
$time = $_POST['time'];
$seats = $_POST['seats'];

#$seats = mysqli_real_escape_string($con, $_POST['seats']);
$phone_number = mysqli_real_escape_string($con, $_POST['phonenumber']);
if(!empty($_POST['car'])){
$car='True';
}
else{
$car = 'True';
} 
#mysqli_real_escape_string($con, $_POST['car']);
$email = mysqli_real_escape_string($con, $_POST['email']);
echo $email;
echo $date;
echo $phone_number;
$seatstaken = 1;
$hash=(string)uniqid();

	$sql="INSERT INTO Rides (Name, Email, Car, Origin, Destination, Departure_Date, Departure_Time, Phone_Number, Total_Seats, Seats_Taken, Hash) Values ('test','$email','$car','$origin','$destination','$date','$time','$phone_number', '$seats', '$seatstaken', '$hash')"; 
if(!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
}
echo "1 record added";
mysqli_close($con);

$page= <<<EOPAGE
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
<h2>Driver Email: $email Driver Phone Number: $phone_number<h2>
</body>
</html>
EOPAGE;

$myfile = fopen("/var/www/html/website/hashes/$hash.php", "w");
fwrite($myfile, $page);
fclose($myfile); 
#system("sudo echo '$page' > /var/www/html/website/hashes/$hash.php");

echo $seatstaken;
echo $origin;

?>
