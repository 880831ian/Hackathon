<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php
if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
	$url= "https://health.airhot.tw/auth/sign-in.php";
	header("location: $url");
}
if(isset($_GET['x'])){
    	$query="UPDATE `user` SET `gps_jin` = '".$_GET['x']."',`gps_wei` = '".$_GET['y']."' WHERE `user`.`id` = ".$_GET['uid'];
		$shouts = mysqli_query($con,$query);
}