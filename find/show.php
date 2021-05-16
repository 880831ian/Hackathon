<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php
	$uid = $_GET['uid'];
	$query="SELECT * FROM `user` WHERE `id` = ".$uid;
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$x = $row['gps_jin'];
	$y = $row['gps_wei'];
	$num = 0 ;
	$query2="SELECT * FROM `user` WHERE `gps_jin` is not null AND `type` = 0 AND `id` != ".$uid;
	$shouts2 = mysqli_query($con,$query2);
	while($row2=mysqli_fetch_assoc($shouts2)){
    	$x = $row['gps_jin'];
		$y = $row['gps_wei'];
    	$x2 = $row2['gps_jin'];
		$y2 = $row2['gps_wei'];
    	$all_arr[$num]['id'] = $row2['id'];
    	$all_arr[$num]['username'] = "@".$row2['user_name'];
    	$all_arr[$num]['chname'] = $row2['last_name'].$row2['first_name'];
    	$all_arr[$num]['long'] =  getDistance($x, $y, $x2, $y2);
    	$all_arr[$num]['url'] = $row2['pic_url'];
		$num ++ ;
    }
	uasort($all_arr, 'sort_by_long');
	foreach($all_arr as $x => $val) {
    	echo '
        <a href= "https://health.airhot.tw/find/index.php?t=m&id='.$all_arr[$x]['id'].'" style="text-decoration:none; color:black;">
        <li>
				  <div class="contactlist">
                       <div class="user-avatar user-avatar-rounded online">
                              <img src="'.$all_arr[$x]['url'].'">
                        </div>
                        <div class="contactlist__details">
                             <div class="contactlist__details--name">'.$all_arr[$x]['chname'].'</div>
                                   <div class="contactlist__details--info">離您'.$all_arr[$x]['long'].'公里</div>
                              </div>
                        </div>
               </li>
               </a>';
	}
?>
<?php
function getDistance($lat1,$lng1,$lat2,$lng2)
{
	//將角度轉為狐度
	$radLat1 = deg2rad($lat1);//deg2rad()函式將角度轉換為弧度
	$radLat2 = deg2rad($lat2);
	$radLng1 = deg2rad($lng1);
	$radLng2 = deg2rad($lng2);
	$a = $radLat1 - $radLat2;
	$b = $radLng1 - $radLng2;
	$s = 2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6371;
	return round($s,2);
}
function sort_by_long($a, $b)
{
    if($a['long'] == $b['long']) return 0;
    return ($a['long'] > $b['long']) ? 1 : -1;
}


?>