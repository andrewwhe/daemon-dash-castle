<?php

	$response = http_get("https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyA62Emg7xa0gMRpgXrMc6MxeuMckYhulX8", array("timeout"=>1), $info);
	print_r($info);

?>