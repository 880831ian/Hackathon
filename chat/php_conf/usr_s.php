<?php session_start();?>
<?php include "database.php"; ?>
<?php
	$id = $_GET['id'] ;
	date_default_timezone_set('Asia/Taipei');
	$date = date('Y/m/d H:i:s');
	echo $query="UPDATE `user` SET `on_time` = '$date' WHERE `user`.`id` = 1;";
    $shouts = mysqli_query($con,$query);
?>
