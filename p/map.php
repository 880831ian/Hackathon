<?php
session_start(); 
include "../chat/php_conf/database.php"; 
$query="SELECT * FROM `user` WHERE `id` LIKE '".$_SESSION['id']."'";
$shouts = mysqli_query($con,$query);
$row=mysqli_fetch_assoc($shouts);
$gps_jin=$row['gps_jin'];
$gps_wei=$row['gps_wei'];
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8">
  <style>
  html,
  body {
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
  }
  
  #map {
    height: 100%;
    width: 100%;
    background: #000;
  }
  </style>
</head>

<body>
  <div id="map"></div>
  <script>
  var map;
  function initMap() {
    var position = {
      lat: <?php echo $gps_jin;?>,
      lng: <?php echo $gps_wei;?>
    };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: position
    });
    var marker = new google.maps.Marker({
    position: position,
    map: map,
    animation: google.maps.Animation.BOUNCE
    });
  }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXb49cp3v88Xn-COKCJqOE2TusAX66IVw&callback=initMap" async defer></script>

</body>

</html>
