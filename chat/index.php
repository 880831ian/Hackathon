<?php session_start(); ?>
<?php include "./php_conf/database.php"; ?>
<?php include "../gps/GPS.php"; ?>
<?php
if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
	$url= "https://health.airhot.tw/auth/sign-in.php";
	header("location: $url");;
}
$user_id = $_SESSION['id'];
$grup_id = $_GET['g'];
$type = $_GET['t'];
?>
<?php
	$query="SELECT * FROM `msg_acc` WHERE `g_id` = $grup_id AND `u_id` = $user_id";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	if(isset($row['id'])){
    			$query2="SELECT * FROM `msg_group` WHERE `id` = ".$grup_id;
			$shouts2 = mysqli_query($con,$query2);
			$row2=mysqli_fetch_assoc($shouts2);
    	if ($row2['tp'] != 0){
            	$send_acc = '<div class="composer__middle">
                      	<textarea class="form-control" rows="1" placeholder="對方以離開聊天室" disabled="disabled" id = "msg_text" ></textarea>
                    	</div>
                    	<div class="composer__right">
                        	<div class="composer__right--send" ">
                            	<i class="mdi mdi-send"></i>
                        	</div>
                        	<div class="composer__right--microphone">
                        		<i class="mdi mdi-send"></i>
                        	</div>
                    	</div>';
            }else{
            	$send_acc = '<div class="composer__middle">
                      	<textarea class="form-control" rows="1" placeholder="請輸入聊天內容" id = "msg_text" ></textarea>
                    	</div>
                    	<div class="composer__right">
                        	<div class="composer__right--send" onclick="addHint()">
                            	<i class="mdi mdi-send"></i>
                        	</div>
                        	<div class="composer__right--microphone" onclick="addHint()">
                        		<i class="mdi mdi-send"></i>
                        	</div>
                    	</div>';
            }
		}
			if(isset($row['id'])){
    $ms_text = '<div class="conversation-panel" >
                		<div class="conversation-panel__head">
                        <div class="back-button-md">
                        	<a href="https://health.airhot.tw/chat/?g='.$grup_id.'">
                            <i class="mdi mdi-arrow-left"></i>
                            </a>
                    	</div>
                    	<div class="conversation-panel__avatar info-panel-opener">
                        	<div class="user-avatar user-avatar-rounded">
                                <img src="'.$row['club_pic'].'">
                        	</div>
                        	<div class="conversation__name">
                            	<div class="conversation__name--title">'.$row['club_name'].'</div>
                        	</div>
                    	</div>
                    	<div class="conversation__actions">
                        	<div class="dropdown">
                            	<div class="action-icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                	<i class="mdi mdi-dots-vertical"></i>
                            	</div>
                            	<div class="dropdown-menu dropdown-menu-right">
                                	<a class="dropdown-item info-panel-opener" href="javascript:;">
                                    	<span><i class="mdi mdi-information-outline"></i></span>
                                    	<span>聊天室資訊</span></a>
                                		<a class="dropdown-item" href="javascript:;">
                                        	<span><i class="mdi mdi-volume-mute"></i></span>
                                        	<span>關閉提醒</span>
                                		</a>
                                		<div class="dropdown-divider"></div>
                                		<a class="dropdown-item" href="https://health.airhot.tw/chat/">
                                        	<span><i class="mdi mdi-cancel"></i></span>
                                        	<span>退出聊天室</span>
                                		</a>
                            		</div>
                        		</div>
                    		</div>
                		</div>
              	<div class="conversation-panel__body">
                        	<div id="perfect-scrollbar-end" class="custom-scrollbar2 composer__right--onload">
                            	<div class="container">
                                	<ul class="chat-style-2">
                                    	<span id="msg"></span>
                                	</ul>
                           		</div>
                        	</div>
                		</div>
                <div class="conversation-panel__footer">
                	<div class="composer">
                    	<div class="composer__left">
                    	</div>
                    	'.$send_acc.'
                	</div>
            	</div>
                </div>
      	</div>
    </div>';
    }else{
    	$ms_text = '<div class="conversation-panel" style="text-align:center">
                <br><br><h6>請選擇對話框<br><br> <a href="https://health.airhot.tw/chat/" target="" title="">返回</a></h6>
                ';
    }

?>
<?php
    $query="SELECT * FROM `user` WHERE `id` = ".$_SESSION['id'];
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$pic = $row['pic_url'];
    $query1="SELECT * FROM `config`";
    $shouts1 = mysqli_query($con,$query1);
    $row1=mysqli_fetch_assoc($shouts1);
    $v = $row1['v'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  	<link rel="manifest" href="../manifest.json">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <link href="https://health.airhot.tw/images/logo/logo48.ico" rel="icon" type="image/x-icon" />
    <link href="https://health.airhot.tw/images/logo/logo48.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://health.airhot.tw/images/logo/logo48.ico" rel="bookmark" type="image/x-icon" />
    <link href="https://health.airhot.tw/images/logo/logo180.ico" rel="apple-touch-icon" type="image/x-icon" />
	<title>簡疫聊天室 - 聊天室</title>
	<meta name="description" content="The ultimate Bootstrap based Messaging framework to help build Messaging or Chat application fast and easy. Fully responsive and crafted with modern elements and latest design"><meta name="keywords" content="Chatriq, chat, messaging, theme, platform"/><meta name="subject" content=""><meta name="copyright" content=""><link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="dist/css/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href=""/>
	<link rel="stylesheet" type="text/css" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="dist/css/app.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/theme/default-theme.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
</head>
<body class="default-theme" onload="showallHint();showchat();chatOnload();">
<script src="/chat/js_conf/add_msg.js"></script>
	<!-- Preloader Start -->
	<div class="preloader"></div>
	<!-- Preloader end --><!-- main wrapper start -->
	<div class="main-wrapper">
    	<div class="chatapp">
        <!-- navbar start -->
        <nav id="navbar" class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow-sm">
        	<a class="navbar-brand" href="https://health.airhot.tw/chat/">
            	<img src="https://health.airhot.tw/images/logo/logo.png" width="200" height="50" class="d-inline-block align-top" alt="">
        	</a>
        	<div class="ml-auto d-flex align-items-center">
            	<div class="iconbox iconbox-search btn-hovered-light">
                
            	</div>
            	<div class="navbar-nav">
                	<div class="iconbox-group">
         
                </div>
                	<div class="dropdown user-nav">
                    	<div class="user-avatar user-avatar-sm user-avatar-rounded" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        	<img src="<?php echo $pic;?>">
                    	</div>
                    <div class="dropdown-menu dropdown-menu-right">
                    	<a class="dropdown-item" href="https://health.airhot.tw/p/<?php echo $_SESSION['username'];?>">
                    		<span><i class="mdi mdi-account-outline"></i></span>
                        	<span>個人化</span>
                    	</a>
                    	<a class="dropdown-item" >
                        	<span><i class="mdi mdi-arrow-up-bold"></i></span>
                        	<span>版本 <?php echo $v;?></span>
                    	</a>
                    	<div class="dropdown-divider"></div>
                    	<a class="dropdown-item" href="https://health.airhot.tw/auth/logout.php">
                        	<span><i class="mdi mdi-logout-variant"></i></span>
                        	<span>登出</span>
                    	</a>
                    </div>
                </div>
                <div class="iconbox-searchbar">
                	<form>
                		<input type="text" class="form-control" placeholder="Search here..." autofocus>
                		<button class="search-submit" type="submit">
                    		<i class="mdi mdi-magnify"></i>
                		</button>
                		<a href="javascript:void(0)" class="search-close">
                    		<i class="mdi mdi-arrow-left"></i>
                		</a>
               		</form>
              	</div>
            </div>
        </div>
        </nav>
        <!-- navbar end -->
        <!-- sidebar start -->
        <div class="chatapp__sidebar" >
        	<ul class="nav" id="myTab" role="tablist">
            <li class="nav-item">
                	<a class="nav-link" href="../find/index.php">
                    	<i class="mdi mdi-account-box-outline"></i>
                    		<span>疫搜尋</span>
                	</a>
            	</li>	
            <li class="nav-item">
                	<a class="nav-link active" href="https://health.airhot.tw/chat/">
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
                	<a class="nav-link" href="https://health.airhot.tw/isolation" title="Help">
                    	<i class="mdi mdi-help-circle-outline"></i>
                    		<span>Help</span>
                	</a>
            	</li>
        	</ul>
        </div>
        <!-- sidebar end -->
        <!-- main content start -->
        <div class="chatapp__content" >
        	<div class="chatapp__messagetab">
            <!-- user list start -->
            	<div class="chatapp-user-list">
                	<div class="chatapp-user-list-body custom-scrollbar">
                    	<div class="chatapp__headingbar">
                        	<h6>聊天室</h6>
                        	<div class="chatapp__actions">
                            	
                        	</div>
                    	</div>
                    <ul class="list-unstyled">
                    	<span id="chat"></span>
                 </ul>
          	</div>
                <ul id="mfbMenu" class="mfb-component--br mfb-slidein-spring" data-mfb-toggle="click">
                	<li class="mfb-component__wrap">
                    	
                	</li>
                </ul>
            </div>
           <!--  <div class="chatapp__conversations open">-->
          <?php if($type=="m"){
				echo '<div class="chatapp__conversations open">';
			}else{
				echo ' <div class="chatapp__conversations ">';
			}?> <!--手機板聊天 <div class="chatapp__conversations open">-->
            <div class="conversation-wrapper">
           <?php echo $ms_text;?>
     <!-- VIDEO CALL START-->
<div class="modal fade videocall-modal CallDialogFullscreen-sm" id="incomingVideoStart" tabindex="-1" role="dialog" aria-labelledby="incomingVideoStart" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-body"><div class="icvideocallwrapper"><div class="icvideo-contact"><img class="img-fluid icvideo-contact__inner" src="assets/images/media/call-01.jpg" alt=""></div><div class="icvideo-user"><img src="assets/images/user/150/01.jpg" alt=""></div><div class="icvideo-actions"><div class="icvideo-actions__left"><div class="icvideo-actions__left--duration">00:36</div></div><div class="icvideo-actions__middle"><div class=""><div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Speaker"><i class="iconbox__icon mdi mdi-volume-high"></i></div><div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Hold"><i class="iconbox__icon mdi mdi-pause"></i></div><div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Add Call"><i class="iconbox__icon mdi mdi-phone-plus"></i></div><div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Disbale Video"><i class="iconbox__icon mdi mdi-video-off-outline"></i></div><div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Mute"><i class="iconbox__icon mdi mdi-microphone-off"></i></div></div></div><div class="icvideo-actions__right"><div class="iconbox btn-hovered-light bg-danger" data-dismiss="modal"  data-toggle="tooltip" data-placement="top" title="Hangup"><i class="iconbox__icon text-white mdi mdi-phone-hangup"></i></div></div></div></div></div></div></div></div>
    <!-- OUTGOING VOICE CALL -->
 <div class="modal CallDialogFullscreen-sm" id="outGoingCall" tabindex="-1" role="dialog" aria-labelledby="outGoingCall" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-body"><div class="text-center"><div class="user-avatar user-avatar-rounded user-avatar-xl"><img src="assets/images/user/80/01.jpg" alt=""></div><div class="userprofile-name"><span>Calling...</span><h4>Jack P. Angulo</h4><span>Product Manager</span><div class="call-duration">00:36</div></div><div class="call-options"><div class="row"><div class="col-4"><div class="call-options__iconbox"><i class="mdi mdi-microphone-off"></i></div><h6>Mute</h6></div><div class="col-4"><div class="call-options__iconbox"><i class="mdi mdi-volume-high"></i></div><h6>Speaker</h6></div><div class="col-4"><div class="call-options__iconbox"><i class="mdi mdi-pause"></i></div><h6>Hold</h6></div></div></div><div class="call-actions"><div class="call-hangup" data-dismiss="modal"><i class="mdi mdi-phone-hangup"></i></div></div></div></div></div></div></div></div><!-- main wrapper end -->
<!-- Javascripts Files -->
<script src="dist/js/jquery-3.3.1.slim.min.js" ></script>
<!--<script src="dist/js/popper.min.js" ></script>-->
<script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/vendors/material-floating-button/dist/mfb.min.js"></script>
<script src="dist/js/main.min.js"></script>
<script src="/chat/js_conf/pwa.js"></script>
<script src="/chat/js_conf/read_msg.js"></script>
<script src="/chat/js_conf/add_msg.js"></script>
<script>

</script>
<script>
setInterval("showchat()",1000);
function showchat() {
	if(!navigator.onLine){
    	document.getElementById("chat").innerHTML = localStorage.getItem("chat_box");
	}else{
		var xhttp;
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			var msg =  this.responseText;
            	document.getElementById("chat").innerHTML = msg;
    			localStorage.setItem("chat_box",msg);
    		}
  		};
  		xhttp.open("GET", "./php_conf/shoe_chat_room.php?gid=<?php echo $grup_id;?>&uid=<?php echo $user_id; ?>", true);
  		xhttp.send(); 
	}  
}

</script>
    <?php
	$query="SELECT * FROM `msg_acc` WHERE `g_id` = $grup_id AND `u_id` = $user_id";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	if(isset($row['id'])){
    echo	$ms_text = '<script>
setInterval("showHint()",1000);
function showHint() {
	if(!navigator.onLine){
    	document.getElementById("msg").innerHTML = localStorage.getItem("'.$grup_id.'");
	}else{
		var xhttp;
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			var msg =  this.responseText;
    			var allmsg = localStorage.getItem("'.$grup_id.'")+msg;
            	document.getElementById("msg").innerHTML = allmsg
    			localStorage.setItem("'.$grup_id.'",allmsg);
    		}
  		};
  		xhttp.open("GET", "./php_conf/show_mes.php?gid='.$grup_id.'&uid='.$user_id.'", true);
  		xhttp.send(); 
	}  
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
  		xhttp.open("GET", "./php_conf/show_all_mes.php?gid='.$grup_id.'&uid='.$user_id.'", true);
  		xhttp.send(); 
	}  
}

function addHint() {
var data = document.getElementById("msg_text").value;
document.getElementById("msg_text").value="";
if(data.indexOf("\n") >= 0 ){
	data = data+"<br>";
	data=data.replace(/\n/g,"<br>");
}
var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
    }
  };
  xhttp.open("GET", "./php_conf/add_mes.php?gid='.$grup_id.'&sid='.$user_id.'&text="+data+"&text_type=text", true);
  xhttp.send(); 



}

</script>';
 }
?>

<script>
$(".composer__right--send").click(() => {
  const ps = new PerfectScrollbar('#perfect-scrollbar-end');
    document.getElementById("perfect-scrollbar-end").scrollTop = document.getElementById("perfect-scrollbar-end").scrollHeight;
	console.log(ps);
    ps.update();
});
</script>

<script>
$(function(){
	setTimeout(()=>{
    	const ps = new PerfectScrollbar('#perfect-scrollbar-end');
    	document.getElementById("perfect-scrollbar-end").scrollTop = document.getElementById("perfect-scrollbar-end").scrollHeight;
		console.log(ps);
    	ps.update();
    }, 300);
});
</script>

<script>
	if ('serviceWorker' in navigator) {
		window.addEventListener('load', function() {
        navigator.serviceWorker.register('../service-worker.js').then(function() { console.log("Service Worker Registered, Cheers to PWA Fire!"); });
         });
    };
</script>
<script>
	if ('serviceWorker' in navigator) {
		window.addEventListener('load', function() {
        navigator.serviceWorker.register('../service-worker.js').then(function() { console.log("Service Worker Registered, Cheers to PWA Fire!"); });
         });
    };
</script>
	</body>
</html>