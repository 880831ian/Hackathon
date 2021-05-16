<?php session_start(); ?>
<?php
$con = mysqli_connect("service.airhot.tw","root","Nilson_0313","health");
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
?>
<?php
$query="SELECT * FROM `user` WHERE `id` = ".$_SESSION['id'];
$shouts = mysqli_query($con,$query);
$row=mysqli_fetch_assoc($shouts);
$x1 =$row['gps_jin'];
$y1 = $row['gps_wei'];
?>
<script>
window.setInterval("getLocation()",3000); 
function getLocation() {
	if (navigator.geolocation) {
    	navigator.geolocation.getCurrentPosition(showPosition);
  	} 
}
function showPosition(position) {
  var x = position.coords.latitude ;
  var y = position.coords.longitude;
  var long = CoolWPDistance(<?php echo $y1;?>,<?php echo $x1;?>,y,x)
  if(long >100){
  	edit(); 
  	document.location.href="https://health.airhot.tw/auth/logout.php";
  }
}
function getRad(d){
    var PI = Math.PI;
    return d*PI/180.0;
}
function CoolWPDistance(lng1,lat1,lng2,lat2){
    var f = getRad((lat1 + lat2)/2);
    var g = getRad((lat1 - lat2)/2);
    var l = getRad((lng1 - lng2)/2);
    var sg = Math.sin(g);
    var sl = Math.sin(l);
    var sf = Math.sin(f);
    var s,c,w,r,d,h1,h2;
    var a = 6378137.0;//The Radius of eath in meter.
    var fl = 1/298.257;
    sg = sg*sg;
    sl = sl*sl;
    sf = sf*sf;
    s = sg*(1-sl) + (1-sf)*sl;
    c = (1-sg)*(1-sl) + sf*sl;
    w = Math.atan(Math.sqrt(s/c));
    r = Math.sqrt(s*c)/w;
    d = 2*w*a;
    h1 = (3*r -1)/2/c;
    h2 = (3*r +1)/2/s;
    s = d*(1 + fl*(h1*sf*(1-sg) - h2*(1-sf)*sg));
    s = Math.round(s);
    return s;
}
function edit() {
	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
     
    	}
  	};
  xhttp.open("GET", "https://health.airhot.tw/gps/edit.php?uid=<?php echo $_SESSION['id'];?>", true);
  xhttp.send(); 
}

</script>