<!DOCTYPE html>
<html>
<body>
<button onclick="getLocation()">Try It</button>
<p id="demo"></p>
<?php echo "<h1>".$_GET['value']."<h1>";?>
<br>
<script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = position.coords.latitude + 
  "," + position.coords.longitude;
  location.href="gps_dec.php?value=" +x.innerHTML;
}
var t2 = window.setInterval("getLocation()",5000); 
</script>

</body>
</html>
