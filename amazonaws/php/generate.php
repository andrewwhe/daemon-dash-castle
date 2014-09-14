<?php
#phpinfo();
#$con=mysqli_connect("localhost", "root", "sigmaphidelta", "DaemonDashDashDash");
#$sql="INSERT INTO Rides (Name, Email, Car, Origin, Destination, Departure_Date, Departure_Time, Phone_Number, Total_Seats, Seats_Taken) Values ('test', 'test@test', 'true', 'test', 'test', '2014-08-19', '09:09:09', '293820', '4', '5')";
#if (!mysqli_query($con,$sql)){
#       die('Error : ' . mysqli_error($con)); 
#}
#echo "1 Record added";
#mysqli_close($con);
function generate_rides($query){
$con=mysqli_connect("localhost", "root", "sigmaphidelta", "DaemonDashDashDash");
$result=mysqli_query($con, $query);
#select * from Rides order by Departure_Date desc, Departure_Time limit 10;");
while($row = mysqli_fetch_array($result)) {
 $date=$row['Departure_Date'];
 $spotstaken=$row['Seats_Taken'];
 $spotsavailable=$row['Total_Seats'];
 $time=$row['Departure_Time'];
 $origin=$row['Origin'];
 $Destination=$row['Destination'];
$hash=$row['Hash'];
 $car=$row['Car'];
$car2 = (int)$car ? 1 : 0;
#if($car2==0){
# $page= <<<EOPAGE
# <div class="small-12 column">
#          <table>
#            <tbody>
#              <tr>
#                <td rowspan="2" style="width: 65px">
# <div class="img-holder"><span style="font-weight: bold; color: green;">HITCH!</span></div>
#                </td>
#                <td style="width:120px">
#                  <span style="font-size: 16px">$date</span>
#                </td>
#                <td>
#                <span style="color:red">
#                This ride needs a driver!
#                </span>
#                  <span style="color:green">
#                    $spotstaken people looking for a ride!
#                  </span>
#                </td>
#              </tr>
#              <tr>
#                <td style="width:80px">
#                  <span style="">$time</span>
#                </td>
#                <td><span style="">$origin</span> <span style="color:#999999">-></span> <span style="">$Destination</span></td>
#              </tr>
#            </tbody>
#          </table>
#        </div>
#EOPAGE;
#echo $page;
#}

 if($spotstaken==$spotsavailable ){
 $page= <<<EOPAGE
 <div class="small-12 column">
          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="width: 65px">                  
<div class="img-holder"><span style="font-weight: bold; color: red;">FULL</span></div>
                </td>
                <td style="width:120px">
                  <span style="font-size: 16px">$date</span>
                </td>
                <td>
		<span style="color:red">
		Sorry!
		</span>
                  <span style="color:red">
                    $spotstaken/$spotsavailable This ride is full!
                  </span>
                </td>
              </tr>
              <tr>
                <td style="width:80px">
                  <span style="">$time</span>
                </td>
                <td><span style="">$origin</span> <span style="color:#999999">-></span> <span style="">$Destination</span></td>
              </tr>
            </tbody>
          </table>
        </div>
EOPAGE;
echo $page;
}
if($spotstaken<$spotsavailable ){
$spotsleft = $spotsavailable-$spotstaken;
if($_GET['hash']){
$page= <<<EOPAGE

 <div class="small-12 column">
          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="width: 65px">
 <a href="#" onclick="$('#hitch-modal').modal()" name="$hash"><div class="img-holder"><span style="font-weight: bold; color: green;">HITCH!</span></div></a>
                </td>
                <td style="width:120px">
                  <span style="font-size: 16px">$date</span>
                </td>
                <td>
                  <span style="color:green">
                    $spotstaken/$spotsavailable This ride has $spotsleft seats left!
                  </span>
                </td>
              </tr>
              <tr>
                <td style="width:80px">
                  <span style="">$time</span>
                </td>
                <td><span style="">$origin</span> <span style="color:#999999">-></span> <span style="">$Destination</span></td>
              </tr>
            </tbody>
          </table>
        </div>
EOPAGE;

echo $page;

}else{
$page= <<<EOPAGE

 <div class="small-12 column">
          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="width: 65px">
 <a href="?hash=$hash" name="$hash"><div class="img-holder"><span style="font-weight: bold; color: green;">HITCH!</span></div></a>
                </td>
                <td style="width:120px">
                  <span style="font-size: 16px">$date</span>
                </td>
                <td>
                  <span style="color:green">
                    $spotstaken/$spotsavailable This ride has $spotsleft seats left!
                  </span>
                </td>
              </tr>
              <tr>
                <td style="width:80px">
                  <span style="">$time</span>
                </td>
                <td><span style="">$origin</span> <span style="color:#999999">-></span> <span style="">$Destination</span></td>
              </tr>
            </tbody>
          </table>
        </div>
EOPAGE;

echo $page;
}
}
}
mysqli_close($con);
}
?>

