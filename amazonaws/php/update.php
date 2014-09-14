<?php

$con=mysqli_connect("localhost", "root", "sigmaphidelta", "DaemonDashDashDash");

echo $_GET['hash'];
$getHash = $_GET["hash"];
$getHash = rtrim($getHash, "#");
$result = mysqli_query($con, "UPDATE Rides SET Seats_Taken=Seats_Taken+1 WHERE Hash='$getHash';");
echo $result;
echo "\n";
echo $getHash;

$result = mysqli_query($con, "SELECT * FROM Rides WHERE Hash ='$getHash';");
$row = mysqli_fetch_array($result);

$driver_email = $row['Email'];
$driver_phone = $row['Phone_Number'];
$driver_name = $row['Name'];
$ride_time = $row['Departure_Time'];
$ride_date = $row['Departure_Date'];

echo $driver_email;
echo $driver_phone;
echo $driver_name;
#$ride_date = mysqli_query($con, "SELECT Departure_Date FROM Rides WHERE Hash ='getHash';");
#$ride_time = mysqli_query($con, "SELECT Departure_Time FROM Rides WHERE Hash ='getHash';");

$hitcher_email = mysqli_real_escape_string($con, $_POST['email-hitcher-field']);
$hitcher_phone = mysqli_real_escape_string($con, $_POST['phone-hitcher-field']);
$hitcher_name = mysqli_real_escape_string($con, $_POST['name-hitcher-field']);

echo $hitcher_name;
echo $hitcher_email;
echo $hitcher_phone;

$hitcher_message = "Hello $hitcher_name,\nYou have been confirmed to be hitched up with $driver_name on $ride_date at $ride_time.\nYour driver's email address is $driver_email and phone number $driver_phone.\nPlease contact your driver and coordinate pickup and ride details!\nThanks for using COMPNAME!";
echo "$hitcher_email: $hitcher_message";

$driver_message = "Hello $driver_name,\nYou have been successfully hitched up with $hitcher_name on $ride_date at $ride_time.\nYour hitcher's email address is $hitcher_email and phone number $hitcher_phone.\nPlease contact your hitcher and coordinate picking them up and ride details!\nThanks for using COMPNAME!";
 
#system("sudo su ubuntu && echo '$hitcher_message' | mail -s 'Hitcher Confirmation' $hitcher_email");
mail($hitcher_email, "Hitcher Confirmation", $hitcher_message);
#system("sudo su ubuntu && echo '$driver_message' | mail -s 'Hitcher Confirmation' $driver_email");
mail($driver_email, "You've Been Hitched", $driver_message);


?>


