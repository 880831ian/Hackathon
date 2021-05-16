<?php session_start();?>
<?php include "database.php"; ?>
<?php
	$uid = $_GET['uid'] ;
	$gid = $_GET['gid'] ;
	$query="SELECT * FROM `msg_acc` WHERE `u_id` = $uid ORDER BY `msg_acc`.`last_change_time` DESC";
	$shouts = mysqli_query($con,$query);
	date_default_timezone_set('Asia/Taipei');
	while($row2=mysqli_fetch_assoc($shouts)){
    	 $time2=date("Y/m/d",strtotime($row2['last_change_time'])); 
    	 $time1= date('Y/m/d');
		if(strtotime($time2)==strtotime($time1)){  
			$ec_time =  date("H:i:s",strtotime($row2['last_change_time']));   
		}else{  
			$ec_time =  $time2;
		}  
    if($row2['g_id'] == $gid){
        	if($row2['no_notic'] == 0){
        		echo'
                 	<a href="https://health.airhot.tw/chat/?g='.$row2['g_id'].'&t=m" style="color:black; text-decoration:none;"> 	                 
						<li class="active">
                    	<div class="conversation">
                    		<div class="user-avatar user-avatar-rounded recently-active">
                        		<img src="'.$row2['club_pic'].'">
                    		</div>
                    		<div class="conversation__details">
                        		<div class="conversation__name">
                            		<div class="conversation__name--title">'.$row2['club_name'].'</div>
                            		<div class="conversation__time">'.$ec_time.'</div>
                        		</div>
                        		<div class="conversation__message">
                           	 		<div class="conversation__message-preview">'.base64_decode($row2['last_change_text']).'</div>
                        		</div>
                    		</div>
                    	</div>
                    
                    </li>
                    </a>
 		
                ';
        	}else{
        		echo '  
             <a href="https://health.airhot.tw/chat/?g='.$row2['g_id'].'&t=m" style="color:black; text-decoration:none;"> 
                <li class="active">
                    	<div class="conversation">
                        	<div class="user-avatar user-avatar-rounded recently-active">
                            	<img src="'.$row2['club_pic'].'">
                        	</div>
                        	<div class="conversation__details">
                            	<div class="conversation__name">
                                	<div class="conversation__name--title">'.$row2['club_name'].'</div>
                                	<div class="conversation__time">'.$ec_time.'</div>
                            	</div>
                            	<div class="conversation__message">
                            		<div class="conversation__message-preview">'.base64_decode($row2['last_change_text']).'</div>
                            			<span><i class="mdi mdi-volume-mute"></i></span>
                            		</div>
                        		</div>
                    		</div>
                    	</li>
                        </a>
                    ';
        	}
        }else{
        	if($row2['no_notic'] == 0){
        		echo'
                     <a href="https://health.airhot.tw/chat/?g='.$row2['g_id'].'&t=m" style="color:black; text-decoration:none;">           
						<li>
                    	<div class="conversation">
                    		<div class="user-avatar user-avatar-rounded recently-active">
                        		<img src="'.$row2['club_pic'].'">
                    		</div>
                    		<div class="conversation__details">
                        		<div class="conversation__name">
                            		<div class="conversation__name--title">'.$row2['club_name'].'</div>
                            		<div class="conversation__time">'.$ec_time.'</div>
                        		</div>
                        		<div class="conversation__message">
                           	 		<div class="conversation__message-preview">'.base64_decode($row2['last_change_text']).'</div>
                        		</div>
                    		</div>
                    	</div>
                    
                    </li>
                    </a>
 				
                ';
        	}else{
        		   echo '  
             <a href="https://health.airhot.tw/chat/?g='.$row2['g_id'].'&t=m" style="color:black; text-decoration:none;"> 
                   <li>
                    	<div class="conversation">
                        	<div class="user-avatar user-avatar-rounded offline">
                            	<img src="'.$row2['club_pic'].'">
                        	</div>
                        	<div class="conversation__details">
                            	<div class="conversation__name">
                                	<div class="conversation__name--title">'.$row2['club_name'].'</div>
                                	<div class="conversation__time">'.$ec_time.'</div>
                            	</div>
                            	<div class="conversation__message">
                            		<div class="conversation__message-preview">'.base64_decode($row2['last_change_text']).'</div>
                            			<span><i class="mdi mdi-volume-mute"></i></span>
                            		</div>
                        		</div>
                    		</div>
                    	</li>
                        </a>
                    ';
        	}
        
        }
    }
//<a href="https://health.airhot.tw/chat/'.$row2['g_id'].'" style="color:black;">   
?>