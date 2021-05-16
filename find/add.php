<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php
	$sid = $_SESSION['id'];
	$uid = $_GET['uid'];
	$query="SELECT * FROM `msg_group` WHERE (`user_id_2` = $sid && `user_id_1` = $uid ) || ( `user_id_2` = $uid && `user_id_1` = $sid)";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	if(isset($row['id'])){
  		$url = "https://health.airhot.tw/chat/?t=m&g=".$row['id'];
    	header("Location: $url");
    	exit();
    }else{
    	$query="INSERT INTO `msg_group` (`id`, `start_time`, `user_id_1`, `user_id_2`,`tp`) VALUES (NULL, current_timestamp(), '$sid', '$uid','0');";
		$shouts = mysqli_query($con,$query);
    	$query="SELECT * FROM `msg_group` WHERE (`user_id_2` = $sid && `user_id_1` = $uid ) || ( `user_id_2` = $uid && `user_id_1` = $sid)";
		$shouts = mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($shouts);
    	$id = $row['id'];
    	date_default_timezone_set('Asia/Taipei');
    	$today = date("Y-m-d H:i:s"); 
    	$query="SELECT * FROM `user` WHERE `id` = $sid";
		$shouts = mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($shouts);
    	$img = $row['pic_url'];
    	$name = $row['last_name'].$row['first_name'];
    	$query="INSERT INTO `msg_acc` (`id`, `u_id`, `g_id`, `club_name`, `club_pic`, `no_notic`, `last_change_time`, `last_change_text`) VALUES (NULL, '$uid', '$id', '$name', '$img', '0', '$today', NULL);";
		$shouts = mysqli_query($con,$query);
    	$query="SELECT * FROM `user` WHERE `id` = $uid";
		$shouts = mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($shouts);
    	$img = $row['pic_url'];
    	$name = $row['last_name'].$row['first_name'];
    	$query="INSERT INTO `msg_acc` (`id`, `u_id`, `g_id`, `club_name`, `club_pic`, `no_notic`, `last_change_time`, `last_change_text`) VALUES (NULL, '$sid', '$id', '$name', '$img', '0', '$today', NULL);";
		$shouts = mysqli_query($con,$query);
    	$query="SELECT * FROM `msg_group` WHERE (`user_id_2` = $sid && `user_id_1` = $uid ) || ( `user_id_2` = $uid && `user_id_1` = $sid)";
		$shouts = mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($shouts);
    	$url = "https://health.airhot.tw/chat/?t=m&g=".$row['id'];
    	header("Location: $url");
    	exit();
    
    }
