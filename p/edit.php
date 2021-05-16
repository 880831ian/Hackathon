<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php
	$id = $_GET['id'];
	$tp = $_GET['tp'];
	$query="SELECT * FROM `user` WHERE `id` = $id";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$username = $row['user_name'];
	if ($row[$tp] == 1){
    	$pt = 0;
    }else{
    	$pt = 1;
    }
	echo $query="UPDATE `user` SET `$tp` = '$pt' WHERE `user`.`id` = $id";
	$shouts = mysqli_query($con,$query);
	$url = "https://health.airhot.tw/p/".$username;
	header("Location:$url");
?>