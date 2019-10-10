function initMap() {
 var lokacija = {lat: 44.364701, lng: 20.967717};

 var map = new
google.maps.Map(document.getElementById('googleMap'),
 {
 zoom: 17,
 center: lokacija
 });

 var marker = new google.maps.Marker({
 position: lokacija,
 map: map
 });
 } 