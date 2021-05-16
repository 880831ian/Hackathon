<?php session_start();?>
<?php include "database.php"; ?>
<?php
	$id = $_GET['id'] ;
	date_default_timezone_set('Asia/Taipei');
	$date = date('Y/m/d H:i:s');
	$query="SELECT * FROM `user` WHERE `id` = 1";
    $shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	echo $row['on_time'];
	echo (strtotime($date) - strtotime($row['on_time']))/ (60);
	if(((strtotime($date) - strtotime($row['on_time']))/ (60))>1){
    echo "登出";
    }else{
    echo "上限";
    }
?>
