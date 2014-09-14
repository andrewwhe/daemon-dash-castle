var API_KEY = "AIzaSyA62Emg7xa0gMRpgXrMc6MxeuMckYhulX8";

function submitButton() {
	$("#submit-modal").modal();
}

function getAddress() {

	var query = "https://maps.googleapis.com/maps/api/geocode/json?address=";
	query+=($("#origin-address").val()).replace(/ /g, "+");
	query+="&key="+API_KEY;
	console.log(query);

	$.ajax({
		url: query,
		type: 'get',
		success: function(data) {
			console.log(JSON.stringify(data["results"]["address_components"]));
			console.log(getMilesFromCoordinates(data["results"]["geometry"]["location"]["lat"], data["results"]["geometry"]["location"]["lon"], 37.42291810, -122.08542120));
		}
	});
}

function getMilesFromCoordinates(lat1, lon1, lat2, lon2) {
	var radlat1 = Math.PI * lat1/180;

  var radlat2 = Math.PI * lat2/180;

  var radlon1 = Math.PI * lon1/180;

  var radlon2 = Math.PI * lon2/180;

  var theta = lon1-lon2;

  var radtheta = Math.PI * theta/180;

  var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);

  dist = Math.acos(dist);

  dist = dist * 180/Math.PI;

  dist = dist * 60 * 1.1515;

  return dist;
}