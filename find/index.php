<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php
if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
	$url= "https://health.airhot.tw/auth/sign-in.php";
	header("location: $url");
}
if(isset($_POST['submit'])){
	if(isset($_POST['tp1'])){
    	$query="UPDATE `user` SET `birthday` = '".$_POST['v1']."' WHERE `user`.`id` =".$_SESSION['id'];
		$shouts = mysqli_query($con,$query);

    }
	if(isset($_POST['tp2'])){
    	
    	$query="UPDATE `user` SET `passport` = '".$_POST['v2']."' WHERE `user`.`id` =".$_SESSION['id'];
		$shouts = mysqli_query($con,$query);
    }
	if(isset($_POST['tp3'])){
    	
    	$query="UPDATE `user` SET `mail` = '".$_POST['v3']."' WHERE `user`.`id` =".$_SESSION['id'];
		$shouts = mysqli_query($con,$query);
    }
	if(isset($_POST['tp4'])){
    	
    	$query="UPDATE `user` SET `last_name` = '".$_POST['v4']."' WHERE `user`.`id` =".$_SESSION['id'];
		$shouts = mysqli_query($con,$query);
    }
	if(isset($_POST['tp5'])){
    	
    	$query="UPDATE `user` SET `first_name` = '".$_POST['v5']."' WHERE `user`.`id` =".$_SESSION['id'];
		$shouts = mysqli_query($con,$query);
    }
	$url = "https://health.airhot.tw/find/index.php?#";
	header("Location: $url");
}
	$query="SELECT * FROM `user` WHERE `id` = ".$_SESSION['id'];
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	if($row['first_name']=="" || $row['first_name']=="" ||$row['last_name']=="" || $row['last_name']=="" ||$row['birthday']=="" || $row['passport']=="" ||$row['passport']=="N/A" || $row['mail']=="" ||$row['mail']=="N/A"){
    	$show_js = '<script>$(document).ready(function(){ $("#myModal").modal({show:true, keyboard:false, backdrop: "static"});});</script>';
    	
    	if($row['birthday']==""){
        	$show_bir ='
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">生日:</label>
            <input type="date" name="v1" class="form-control" id="recipient-name">
            <input type="hidden" name="tp1" value="1">
          </div>';
        }else{
        	$show_bir="";
        }
    	if($row['passport']=="N/A" ||$row['passport']==""){
        	$show_pass ='<div class="form-group">
            <label for="message-text" class="col-form-label">身分證字號:</label>
            <input type="text" name="v2" class="form-control" id="recipient-name">
            <input type="hidden" name="tp2" value="1">
          </div>';
        }else{
        	$show_pass="";
        }
    if($row['first_name']=="N/A" ||$row['first_name']==""){
        	$first_name ='<div class="form-group">
            <label for="message-text" class="col-form-label">名字:</label>
            <input type="text" name="v5" class="form-control" id="recipient-name">
            <input type="hidden" name="tp5" value="1">
          </div>';
        }else{
        	$first_name="";
        }
    if($row['last_name']=="N/A" ||$row['last_name']==""){
        	$last_name ='<div class="form-group">
            <label for="message-text" class="col-form-label">姓:</label>
            <input type="text" name="v4" class="form-control" id="recipient-name">
            <input type="hidden" name="tp4" value="1">
          </div>';
        }else{
        	$last_name="";
        }
    	if($row['mail']=="N/A" ||$row['mail']==""){
        	$show_mail ='<div class="form-group">
            <label for="message-text" class="col-form-label">Email:</label>
            <input type="email" name="v3" class="form-control" id="recipient-name">
            <input type="hidden" name="tp3" value="1">
          </div>';
        }else{
        	$show_mail="";
        }
    	}
		if($row['passport']!="" && $row['birthday']!=""){
        	if($row['gps_jin']=="" || $row['gps_wei']==""){
        		$show_js = '<script>$(document).ready(function(){ $("#ask_gps").modal({show:true, keyboard:false, backdrop: "static"});});</script>';
        	}
        }	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>簡疫聊天室-疫搜尋 </title>
    <meta name="description"
        content="The ultimate Bootstrap based Messaging framework to help build Messaging or Chat application fast and easy. Fully responsive and crafted with modern elements and latest design">
    <meta name="keywords" content="Chatriq, chat, messaging, theme, platform" />
    <meta name="subject" content="">
    <meta name="copyright" content="">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="dist/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="dist/css/app.css">
    <link rel="stylesheet" type="text/css" href="dist/css/theme/default-theme.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.css" />
</head>

<body class="default-theme" onload="showallHint();">

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">填寫個人資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form action="#" method="post">
      <div class="modal-body">
      <p>OOPS....您好像少填了些資料😭😭</p>
      <?php echo $last_name?> 
      <?php echo $first_name?> 
      <?php echo $show_bir;?>
      	<?php echo $show_pass;?>
      	<?php echo $show_mail;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="javascript:location.href='https://health.airhot.tw/find/index.php'">Close</button>
        <input type="submit" class="btn btn-primary" name="submit" value="送出">
      </div>
       </form>
    </div>
  </div>
</div>
<div class="modal fade" id="ask_gps" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">綁定GPS位置</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            您必須接受我們收集您的GPS位置，作為檢疫時的依據，方才可使用本服務。<br><br>
      <input type="checkbox" name="sport[]" value="跑步"><label>&nbsp;同意<a href=''>隱私權條款</a></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="getLocation();">確定</button>
      </div>
    </div>
  </div>
</div>
<!-- Preloader Start -->
    <div class="preloader"></div><!-- Preloader end -->
    <!-- main wrapper start -->
    <div class="main-wrapper">
        <div class="chatapp">
            <!-- navbar start -->
            <nav id="navbar" class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow-sm">   
            <a class="navbar-brand" href="https://health.airhot.tw/find/">
            	<img src="https://health.airhot.tw/images/logo/logo.png" width="200" height="50" class="d-inline-block align-top" alt="">
        	</a>
     		<?php
            	$query="SELECT * FROM `user` WHERE `id` = ".$_SESSION['id'];
				$shouts = mysqli_query($con,$query);
				$row=mysqli_fetch_assoc($shouts);
       
            ?> 
            <?php
            	$query2="SELECT * FROM `config` WHERE `id` = 1";
				$shouts2 = mysqli_query($con,$query2);
				$row2=mysqli_fetch_assoc($shouts2);
       
            ?>   
            <div class="ml-auto d-flex align-items-center">
                    
                    <div class="navbar-nav">
                        <div class="iconbox-group">
                        </div>
                        <div class="dropdown user-nav">
                            <div class="user-avatar user-avatar-sm user-avatar-rounded" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $row['pic_url'];?>"/>
                    	</div>
                    <div class="dropdown-menu dropdown-menu-right">
                    	<a class="dropdown-item" href="https://health.airhot.tw/p/<?php echo $_SESSION['username'];?>">
                    		<span><i class="mdi mdi-account-outline"></i></span>
                        	<span>個人化</span>
                    	</a>
                    	<a class="dropdown-item" >
                        	<span><i class="mdi mdi-arrow-up-bold"></i></span>
                        	<span>版本 <?php echo $row2['v'];?></span>
                    	</a>
                    	<div class="dropdown-divider"></div>
                    	<a class="dropdown-item" href="https://health.airhot.tw/auth/logout.php">
                        	<span><i class="mdi mdi-logout-variant"></i></span>
                        	<span>登出</span>
                    	</a>
                    </div>
                </div>
                        <div class="iconbox-searchbar">
                            <form><input type="text" class="form-control" placeholder="Search here..." autofocus><button
                                    class="search-submit" type="submit"><i class="mdi mdi-magnify"></i></button><a
                                    href="javascript:void(0)" class="search-close"><i
                                        class="mdi mdi-arrow-left"></i></a></form>
                        </div>
                    </div>
                </div>
            </nav><!-- navbar end -->
            <!-- sidebar start -->
            <div class="chatapp__sidebar">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                	<a class="nav-link active" href="../find/index.php">
                    	<i class="mdi mdi-account-box-outline"></i>
                    		<span>疫搜尋</span>
                	</a>
            	</li>	
            <li class="nav-item">
                	<a class="nav-link " href="https://health.airhot.tw/chat/">
                    	<i class="mdi mdi-message-text-outline"></i>
                    		<span>聊天室</span>
                	</a>
            	</li>
            	<li class="nav-item nav-item-todo">
                	<a class="nav-link" href="https://health.airhot.tw/chat/todo.php" >
                    	<i class="mdi mdi-checkbox-marked-outline"></i>
                    		<span>代辦事項</span>
                	</a>
            	</li>
            	<li class="nav-item sidebar-bottom-nav nav-item-help">
                	<a class="nav-link" href="help.html" title="Help">
                    	<i class="mdi mdi-help-circle-outline"></i>
                    		<span>Help</span>
                	</a>
            	</li>
                </ul>
            </div><!-- sidebar end -->
            <div class="chatapp__content">
                <div class="chatapp__contactstab">
                    <!-- user list start -->
                    <div class="chatapp-user-list">
                        <div class="chatapp-user-list-body custom-scrollbar">
                            <ul class="list-unstyled">
                                <li class="border-bottom-0">
                                    <div class="contactlist-heading"><span>附近居家檢疫者</span></div>
                                </li>
                            	<span id="msg"></span>
                              
                            </ul>
                        </div>
                    </div><!-- user list end -->
     <?php
           if(!isset($_GET['id'])){
           	$uid = $_SESSION['id'];
           	$add = '';
           }else{
           	$uid = $_GET['id'];
           $add = '<a href="https://health.airhot.tw/find/add.php?uid='.$_GET['id'].'"style="text-decoration:none;color:black;"><div class="iconbox iconbox-pill btn-outline-light"><i
                                                class="iconbox__icon mdi mdi-facebook-messenger"></i><span>聊天</span></div></a>';
           }
          $query2="SELECT * FROM `user` WHERE `id`  = ".$uid;
		  $shouts2 = mysqli_query($con,$query2);
		  $row2=mysqli_fetch_assoc($shouts2);
       
       ?>
                    <!-- contact profile wrapper start -->
             <?php if($_GET['t']=="m"){
				echo '<div class="contactist-profile-wrapper custom-scrollbar open" style="overflow:scroll;">';
			}else{
				echo '<div class="contactist-profile-wrapper custom-scrollbar " style="overflow:scroll;">';
			}?>
                        <div class="container">
                            <div class="back-button-md back2contacts">
                            <a href= "https://health.airhot.tw/find/index.php?id=<?php echo $_GET['id'];?>" style="color:black;"> <i class="mdi mdi-arrow-left"></i><span>Back</span></a></div>
                            <div class="ca-profile-thumb" style="background-image: url(<?php echo $row2['bg_pic_url'];?>)">
                                <div class="ca-profile-info">
                                    <img class="ca-profile-pic" src="<?php echo $row2['pic_url'];?>" alt="">
                                </div>
                                <div class="ca-profile-actions">
                                    <div class="iconbox-group">
                                        <br>
                                    </div>
                                </div>
                                <div class="ca-overlay"></div>
                            </div>
                            <div class="profile-settings-list border mb-5 ">
                                <div class="ca-profile-title">
                                    <h2 class="ca-profile-name"><?php echo $row2['last_name']." ".$row2['first_name']; ?></h2>
                                    <div class="ca-profile-tag"><span><?php echo "@".$row2['user_name']; ?></span></div>
                                    <div class="ca-contcat-profile__calling-buttons pt-2">
                                       <?php echo $add;?>
                                    </div>
                                </div>
                                <div class="setting-sunheading  setting-sunheading-style01  my-3">個人資料</div>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="ps-list">
                                            <div class="ps-list__left">
                                                <div class="ps-list__left--icon"><i
                                                        class="mdi mdi-account-circle"></i></div>
                                                <div class="ps-list__left--name">帳號</div>
                                            </div>
                                            <div class="ps-list__right"><?php echo $row2['user_name']; ?>&nbsp;</div>
                                        </div>
                                    </li>
                                                                                                     
								
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-cake"></i></div>
                                                	<div class="ps-list__left--name">生日</div>
                                            	</div>
                                            	<div class="ps-list__right">
                                                <?php if($row2['acc_birthday']){
														echo $row2['birthday'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                               
                                            	</div>
                                        	</div>
                                    	</li>
                                	                                   
                               	
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-cellphone-android"></i></div>
                                                	<div class="ps-list__left--name">電話號碼</div>
                                            	</div>
                                            	<?php if($row2['acc_tel']){
														echo $row2['tel'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                	                                  
                                
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-email-outline"></i></div>
                                                	<div class="ps-list__left--name">Email</div>
                                            	</div>
                                            	<?php if($row2['acc_mail']){
														echo $row2['mail'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                	                                  
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-web"></i></div>
                                                	<div class="ps-list__left--name">國籍</div>
                                            	</div>
                                            	<?php if($row2['acc_country']){
														echo $row2['country'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                	                                  
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                	<div class="ps-list__left--name">地址</div>
                                            	</div>
                                            	<?php if($row2['acc_address']){
														echo $row2['address'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                	     
                                </ul>
                                   
                                <div class="setting-sunheading setting-sunheading-style01 my-4">社群媒體</div>
                                <ul class="list-unstyled">
                             
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-facebook"></i></div>
                                                	<div class="ps-list__left--name">Facebook</div>
                                            	</div>
                                            	<?php if($row2['acc_Facebook']){
														echo $row2['Facebook'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                   		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-instagram"></i></div>
                                                	<div class="ps-list__left--name">Instagram</div>
                                            	</div>
                                            	<?php if($row2['acc_Instagram']){
														echo $row2['Instagram'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                	  				          
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-twitter"></i></div>
                                                	<div class="ps-list__left--name">Twitter</div>
                                            	</div>
                                            		<?php if($row2['acc_Twitter']){
														echo $row2['Twitter'];
													}else{
														echo '<font color="blue">未公開</font>';
													}?>
                                        	</div>
                                    	</li>
                                	 </ul>
                            <br><br><br><br>
                            </div>
                        </div>
                    </div><!-- contact profile wrapper end -->
                </div>
            </div>
        </div>
    </div><!-- main wrapper end -->
    <!-- Javascripts Files --> 
    <script src="dist/js/jquery-3.3.1.slim.min.js"></script>
    <script src="dist/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="assets/vendors/bootstrap/bootstrap-datepicker.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dist/js/main.js"></script>
<script>
function getLocation() {
	if (navigator.geolocation) {
    	navigator.geolocation.getCurrentPosition(showPosition);
  	} else { 
    	x.innerHTML = "Geolocation is not supported by this browser.";
  	}
}
function showPosition(position) {
  var x = position.coords.latitude ;
  var y = position.coords.longitude;
  addgps(x,y);
  document.location.href="https://health.airhot.tw/find/index.php";
}
    
function addgps(x,y) {
	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
     
    	}
  	};
  xhttp.open("GET", "./gps_add.php?uid=<?php echo $_SESSION['id'];?>&x="+x+"&y="+y, true);
  xhttp.send(); 
}
function showallHint() {
	if(!navigator.onLine){
    	document.getElementById("msg").innerHTML = localStorage.getItem("'.$grup_id.'");
	}else{
		var xhttp;
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			var msg =  this.responseText;
                localStorage.setItem("'.$grup_id.'",msg);
    			var allmsg = localStorage.getItem("'.$grup_id.'");
            	document.getElementById("msg").innerHTML = allmsg
    		}
  		};
  		xhttp.open("GET", "./show.php?uid=<?php echo $_SESSION['id'];?>", true);
  		xhttp.send(); 
	}  
}
var t2 = window.setInterval("showallHint();",3000); 
</script>
<?php echo $show_js;?>

<!--	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
</body>

</html>