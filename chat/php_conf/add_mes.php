<?php session_start();?>
<?php include "database.php"; ?>
<?php
	$gid = $_GET['gid'] ;
	$sid = $_GET['sid'] ;
	$text = $_GET['text'] ;
	//$text = nl2br($text);
	$text = base64_encode($text);
	$text_type = $_GET['text_type'] ;
	$msg_statue = 1;
	date_default_timezone_set('Asia/Taipei');
	$date = date('Y/m/d');
	$time = date('H:i:s');
	$query="INSERT INTO `messenge` (`id`, `group_id`, `send_uid`, `text`, `text_type`, `msg_statue`,`date`,`time`) VALUES (NULL, '$gid', '$sid',  '$text', '$text_type', '$msg_statue', '$date','$time');";
	if($text!=""){
    	$shouts = mysqli_query($con,$query);
    }
	$query="UPDATE `msg_acc` SET `last_change_text` = '$text' WHERE g_id = $gid;";
	if($text!=""){
    	$shouts = mysqli_query($con,$query);
    }
	$now = date('Y/m/d H:i:s');	
	$query="UPDATE `msg_acc` SET `last_change_time` = '$now' WHERE g_id = $gid;";
	if($text!=""){
    	$shouts = mysqli_query($con,$query);
    }
	
?>
