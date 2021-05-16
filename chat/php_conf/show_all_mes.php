<?php session_start();?>
<?php include "database.php"; ?>
<?php
	$uid = $_GET['uid'] ;
	$gid = $_GET['gid'] ;
	$ms_id = $_COOKIE["ms_id_$gid"] ;
	$query="select * from messenge WHERE  `group_id` = ".$gid." ORDER BY `messenge`.`date` ASC,`messenge`.`time` ASC";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$date = $row['date'];
	$shouts = mysqli_query($con,$query);
	while($row2=mysqli_fetch_assoc($shouts)){
    	if($date != $row2['date']){
        	echo  '<div style="text-align:center;">'.$row2['date'].'<div>';
        	$date = $row2['date'];
     	}
		if($ms_id != $row2['id']){
			if($row2['send_uid']==$uid){
        		echo '<li class="message sent"><div class="message__text">'.base64_decode($row2['text']).'<div class="metadata"><span class="time">'.substr($row2['time'],0,-3).'</span></div></div><div class="message__options"><i class=" mdi mdi-dots-horizontal" ></i></div></li>';
        		setcookie("ms_id_".$gid, $row2['id'], time()+3600);
          	}else{
        		echo '<li class="message received"><div class="message__text">'.base64_decode($row2['text']).'<div class="metadata"><span class="time">'.substr($row2['time'],0,-3).'</span></div></div><div class="message__options"><i class=" mdi mdi-dots-horizontal" ></i></div></li> ';
        		setcookie("ms_id_".$gid, $row2['id'], time()+3600);
          	}
     	}
    }
  
?>
