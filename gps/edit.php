<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php
if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
	$url= "https://health.airhot.tw/auth/sign-in.php";
	header("location: $url");
}
if(isset($_GET['uid'])){
    	$query="UPDATE `user` SET `type` = '2' WHERE `user`.`id` = ".$_GET['uid'];
		$shouts = mysqli_query($con,$query);
		$query="UPDATE `msg_group` SET `tp` = '1' WHERE `user_id_1` = ".$_GET['uid'];
		$shouts = mysqli_query($con,$query);
		$query="UPDATE `msg_group` SET `tp` = '1' WHERE `user_id_2` = ".$_GET['uid'];
		$shouts = mysqli_query($con,$query);
}