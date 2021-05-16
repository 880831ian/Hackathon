<?php session_start(); ?>
<?php include "../chat/php_conf/database.php"; ?>
<?php include "../gps/GPS.php"; ?>
<?php
if(isset($_POST['submit']) && $_POST['submit']=="修改"){
	$value = $_POST['value'];
	$type = $_POST['type'];
	$u = $_POST['u'];
	$sql = "UPDATE `user` SET `$type` = '$value' WHERE `user_name` LIKE '$u'";
	$shouts = mysqli_query($con,$sql);
	$url = "https://health.airhot.tw/p/$u";
	header("Location: $url"); 
}
	$username = $_GET['u'];
	$query="SELECT * FROM `user` WHERE `user_name` LIKE '$username'";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	if(isset($row['id'])){
    //導向至404
    }
	$name = $row['last_name'].$row['first_name'];
	$atname = "@".$username;
	$birthday = date("Y/m/d",strtotime($row['birthday']));
	if($row['tel']=="N/A"){
    	$tel = "";
    }else{
    	$tel = $row['tel'];
    }
	$mail = $row['mail'];
	$passport = $row['passport'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$pic_url = $row['pic_url'];
	$bg_url = $row['bg_pic_url'];
	if($row['address']=="N/A"){
    	$add = "";
    }else{
    	$add = $row['address'];
    }
	if($row['Facebook']=="N/A"){
    	$Facebook = "";
    }else{
    	$Facebook = $row['Facebook'];
    }
	if($row['Instagram']=="N/A"){
    	$Instagram = "";
    }else{
    	$Instagram = $row['Instagram'];
    }
	if($row['Twitter']=="N/A"){
    	$Twitter = "";
    }else{
    	$Twitter = $row['Twitter'];
    }
	if($_SESSION['username'] == $username){
    	$acc = 1;
    }else{
    	$acc = 0;
    }
	if($row['country']=="N/A"){
    	$country = "";
    }else{
    	$country = $row['country'];
    }
if($row['input']==1){
    	$input = "<font color='green'>開啟</font>";
		$input_tp = "checked";
    }else{
    	$input = "<font color='red'>關閉</font>";
		$input_tp = "";
    }
if($row['mail_info']==1){
    	$mail_info = "<font color='green'>開啟</font>";
		$mail_info_tp = "checked";
    }else{
    	$mail_info =  "<font color='red'>關閉</font>";
		$mail_info_tp = "";
    }
if($row['login_info']==1){
    	$login_info = "<font color='green'>開啟</font>";
		$login_info_tp = "checked";
    }else{
    	$login_info =  "<font color='red'>關閉</font>";
		$login_info_tp = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>簡疫聊天室 - 個人化</title>
    <meta name="description"
        content="The ultimate Bootstrap based Messaging framework to help build Messaging or Chat application fast and easy. Fully responsive and crafted with modern elements and latest design">
    <meta name="keywords" content="Chatriq, chat, messaging, theme, platform" />
    <meta name="subject" content="">
    <meta name="copyright" content="">
	 <link href="https://health.airhot.tw/images/logo/logo48.ico" rel="icon" type="image/x-icon" />
    <link href="https://health.airhot.tw/images/logo/logo48.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://health.airhot.tw/images/logo/logo48.ico" rel="bookmark" type="image/x-icon" />
    <link href="https://health.airhot.tw/images/logo/logo180.ico" rel="apple-touch-icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="dist/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="dist/css/app.css">
    <link rel="stylesheet" type="text/css" href="dist/css/theme/default-theme.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="default-theme">
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
                <div class="ml-auto d-flex align-items-center">
                    <div class="navbar-nav">
                          <div class="dropdown user-nav">
                    	<div class="user-avatar user-avatar-sm user-avatar-rounded" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        	<img src="<?php echo $pic_url;?>">
                    	</div>
                    <div class="dropdown-menu dropdown-menu-right">
                    <?php
                    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
						echo '<a class="dropdown-item" href="https://health.airhot.tw/p/'. $_SESSION['username'].'">
                    		<span><i class="mdi mdi-account-outline"></i></span>
                        	<span>個人化</span>
                    	</a>
                         <a class="dropdown-item" >
                        	<span><i class="mdi mdi-arrow-up-bold"></i></span>
                        	<span>版本 dd</span>
                    	</a>
                    	<div class="dropdown-divider"></div>
                    	<a class="dropdown-item" href="https://health.airhot.tw/auth/logout.php">
                        	<span><i class="mdi mdi-logout-variant"></i></span>
                        	<span>登出</span>
                    	</a>';
					}else{
                    echo '
                    	<a class="dropdown-item" href="https://health.airhot.tw/">
                        	<span><i class="mdi mdi-home"></i></span>
                        	<span>回首頁</span>
                    	</a>
                    	<div class="dropdown-divider"></div>
                    	<a class="dropdown-item" href="https://health.airhot.tw/auth/sign-in">
                        	<span><i class="mdi mdi-login"></i></span>
                        	<span>登入</span>
                    	</a>';
                    
                    }
                    ?>	
                    
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
                	<a class="nav-link" href="https://health.airhot.tw/find/index.php">
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
                    <!-- contact profile wrapper start -->
                    <div class="contactist-profile-wrapper custom-scrollbar open" style="overflow:scroll;">
                        <div class="container">
                            <div class="back-button-md back2contacts"><a onclick="history.back();" ><i class="mdi mdi-arrow-left"></i><span>返回</span></a></div>
                            <div class="ca-profile-thumb" style="background-image: url(<?php echo $bg_url;?>)">
                                <div class="ca-profile-info">
                                    <div class="ca-profile-pic"><img src="<?php echo $pic_url;?>" width="150" height="150" alt=""></div>
                                </div>
                             
                                <div class="ca-overlay"></div>
                            </div>
                            <div class="profile-settings-list border mb-5">
                                <div class="ca-profile-title">
                                    <h2 class="ca-profile-name"><?php echo $name;?></h2>
                                    <div class="ca-profile-tag"><span><?php echo $atname;?></span></div>
                                    <div class="ca-contcat-profile__calling-buttons pt-2">
                                        <div class="iconbox iconbox-pill btn-outline-light"><i
                                                class="iconbox__icon mdi mdi-share"></i><span>分享資料</span>
                                    	</div>
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
                                            <div class="ps-list__right"><?php echo $username;?>&nbsp;</div>
                                        </div>
                                    </li>
                                <?php
                                //姓氏
                                if($acc==1){
                                if($row['acc_last_name']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-calendar-text"></i></div>
                                                <div class="ps-list__left--name">姓氏</div>
                                            </div>
                                            <div class="ps-list__right">'.$last_name.'&nbsp;<a onclick="$('."'#last_name'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_last_name']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-calendar-text"></i></div>
                                                	<div class="ps-list__left--name">姓氏</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$last_name.'</div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }

                                }
                                
                                ?>
                                 <?php
                                //名字
                                if($acc==1){
                                if($row['acc_first_name']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-calendar-text"></i></div>
                                                <div class="ps-list__left--name">名字</div>
                                            </div>
                                            <div class="ps-list__right">'.$first_name.'&nbsp;<a onclick="$('."'#first_name'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_first_name']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-calendar-text"></i></div>
                                                	<div class="ps-list__left--name">名字</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$first_name.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }

                                }
                                
                                ?>
                                <?php
                                //識別碼(身分證/護照)
                                if($acc==1){
                                echo ' <li>
                                        <div class="ps-list">
                                            <div class="ps-list__left">
                                                <div class="ps-list__left--icon"><i
                                                        class="mdi mdi-account-circle"></i></div>
                                                <div class="ps-list__left--name">識別碼(身分證/護照)</div>
                                            </div>
                                            <div class="ps-list__right">'.$passport.'</div>
                                        </div>
                                    </li>';
                                }
                                ?>    
								<?php
                                //生日
                                if($acc==1){
                                if($row['acc_birthday']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-cake"></i></div>
                                                <div class="ps-list__left--name">生日</div>
                                            </div>
                                            <div class="ps-list__right">'.$birthday.'&nbsp;<a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_birthday" > <i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_birthday']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-cake"></i></div>
                                                	<div class="ps-list__left--name">生日</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$birthday.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		}else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-cake"></i></div>
                                                	<div class="ps-list__left--name">生日</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
                                 
                               	<?php
                                //電話號碼
                                if($acc==1){
                                if($row['acc_tel']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-cellphone-android"></i></div>
                                                <div class="ps-list__left--name">電話號碼</div>
                                            </div>
                                            <div class="ps-list__right">'.$tel.'&nbsp;<a onclick="$('."'#tel'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a>&nbsp;<a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_tel" ><i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_tel']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-cellphone-android"></i></div>
                                                	<div class="ps-list__left--name">電話號碼</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$tel.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else {
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-cellphone-android"></i></div>
                                                	<div class="ps-list__left--name">電話號碼</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
                                
                                <?php
                                //Email
                                if($acc==1){
                                if($row['acc_mail']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-email-outline"></i></div>
                                                <div class="ps-list__left--name">Email</div>
                                            </div>
                                            <div class="ps-list__right">'.$mail.'&nbsp;<a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_mail" ><i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_mail']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-email-outline"></i></div>
                                                	<div class="ps-list__left--name">Email</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$mail.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-email-outline"></i></div>
                                                	<div class="ps-list__left--name">Email</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
                                <?php
                                //國籍
                                if($acc==1){
                                if($row['acc_country']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-web"></i></div>
                                                <div class="ps-list__left--name">國籍</div>
                                            </div>
                                            <div class="ps-list__right">'.$country.'&nbsp;<a onclick="$('."'#country'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a>&nbsp;<a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_country" ><i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_country']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-web"></i></div>
                                                	<div class="ps-list__left--name">國籍</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$country.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-web"></i></div>
                                                	<div class="ps-list__left--name">國籍</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
                                <?php
                                //地址
                                if($acc==1){
                                if($row['acc_address']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                <div class="ps-list__left--name">地址</div>
                                            </div>
                                            <div class="ps-list__right">'.$add.'&nbsp;<a onclick="$('."'#address'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a>&nbsp;<a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_address" ><i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_address']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                	<div class="ps-list__left--name">地址</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$add.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                	<div class="ps-list__left--name">地址</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
   
                                </ul>
                             <?php
                                if($acc==1){
                                echo '   <div class="setting-sunheading setting-sunheading-style01 my-4">設定</div>
                                <ul class="list-unstyled">
                                   <li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                	<div class="ps-list__left--name">開啟ENTER傳送<br></div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">'.$input.'</font></a>&nbsp<a onclick="$('."'#input'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a></div>
                                        	</div>
                                    	</li>
                                        <li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                	<div class="ps-list__left--name">登入通知</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">'.$login_info.'</font></a>&nbsp<a onclick="$('."'#login_info'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a></div>
                                        	</div>
                                    	</li>
                                        <li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-home"></i></div>
                                                	<div class="ps-list__left--name">系統通知</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">'.$mail_info.'</font></a>&nbsp<a onclick="$('."'#mail_info'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a></div>
                                        	</div>
                                    	</li>
                                </ul>';
                                }
                                ?>      
                                <div class="setting-sunheading setting-sunheading-style01 my-4">社群媒體</div>
                                <ul class="list-unstyled">
                             <?php
                                //Facebook
                                if($acc==1){
                                if($row['acc_Facebook']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-facebook"></i></div>
                                                <div class="ps-list__left--name">Facebook</div>
                                            </div>
                                            <div class="ps-list__right">'.$Facebook.'&nbsp;<a onclick="$('."'#Facebook'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a><a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_Facebook" ><i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_Facebook']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-facebook"></i></div>
                                                	<div class="ps-list__left--name">Facebook</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$Facebook.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-facebook"></i></div>
                                                	<div class="ps-list__left--name">Facebook</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>  
                                <?php
                                //Instagram
                                if($acc==1){
                                if($row['acc_Instagram']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-instagram"></i></div>
                                                <div class="ps-list__left--name">Instagram</div>
                                            </div>
                                            <div class="ps-list__right">'.$Instagram.'&nbsp;<a onclick="$('."'#Instagram'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a><a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_Instagram" ><i class="mdi '.$show_eye.'"></i></a></i></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_Instagram']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-instagram"></i></div>
                                                	<div class="ps-list__left--name">Instagram</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$Instagram.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-instagram"></i></div>
                                                	<div class="ps-list__left--name">Instagram</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
				          <?php
                                //Twitter
                                if($acc==1){
                                if($row['acc_Twitter']!=0){
                                	$show_eye = "mdi-eye";
                                }else{
                                	$show_eye = "mdi-eye-off";
                                
                                }
                                echo '
                                <li>
 							      <div class="ps-list">
                                       <div class="ps-list__left">
                                            <div class="ps-list__left--icon"><i class="mdi mdi-twitter"></i></div>
                                                <div class="ps-list__left--name">Twitter</div>
                                            </div>
                                            <div class="ps-list__right">'.$Twitter.'&nbsp;<a onclick="$('."'#Twitter'".').modal();" style="text-decoration:none;"><i class="mdi mdi-pencil"></i></a><a href="https://health.airhot.tw/p/edit.php?id='.$_SESSION['id'].'&tp=acc_Twitter" ><i class="mdi '.$show_eye.'"></i></a></div>
                                        </div>
                                    </li>
                                ';
                                }else{
                                	if($row['acc_Twitter']!=0){
                                	echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-twitter"></i></div>
                                                	<div class="ps-list__left--name">Twitter</div>
                                            	</div>
                                            	<div class="ps-list__right">'.$Twitter.'</a></div>
                                        	</div>
                                    	</li>
                                	  ';
                               		 }else{
                                    echo '
                                		<li>
 							      			<div class="ps-list">
                                       			<div class="ps-list__left">
                                            		<div class="ps-list__left--icon"><i class="mdi mdi-twitter"></i></div>
                                                	<div class="ps-list__left--name">Twitter</div>
                                            	</div>
                                            	<div class="ps-list__right"><font color="blue">未公開</font></a></div>
                                        	</div>
                                    	</li>
                                	  ';
                                    }
                                }
                                ?>
                                </ul>
                             <?php
                                //地圖
                                if($acc==1){
                                  ?>
                                <div class="setting-sunheading setting-sunheading-style01 my-4">綁定位置</div>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="ps-list">
                                        <div id="map"></div>
                                        <iframe src="map.php" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                                }
                                ?>    
                            
                            </div>
                        </div>
                    <br><br><br>
                    <br>     <br><br><br>
                    <br>   
                    </div><!-- contact profile wrapper end -->
                </div>
            </div>
        </div>
    </div><!-- main wrapper end -->
<?php 
if($acc==1){ 
echo '
<!--tel-->
	<div class="modal fade" id="tel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - 電話</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊電話&nbsp;:&nbsp;'.$tel.'</label>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新電話&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="tel">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--first_name-->
	<div class="modal fade" id="first_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - 名字</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊名字&nbsp;:&nbsp;'.$first_name.'</label>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新名字&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="first_name">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--tel-->
	<div class="modal fade" id="last_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - 姓氏</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊姓氏&nbsp;:&nbsp;'.$last_name.'</label>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新姓氏&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="last_name">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--地址-->
	<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - 地址</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊地址&nbsp;:&nbsp;'.$add.'</label> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新地址&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="address">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--國籍-->
	<div class="modal fade" id="country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - 國籍</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊國籍&nbsp;:&nbsp;'.$country.'</label> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新國籍&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="country">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--Facebook-->
	<div class="modal fade" id="Facebook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - Facebook</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊Facebook&nbsp;:&nbsp;'.$Facebook.'</label> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新Facebook&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="Facebook">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--Instagram-->
	<div class="modal fade" id="Instagram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - Instagram</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊Instagram&nbsp;:&nbsp;'.$Instagram.'</label> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新Instagram&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="Instagram">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--Twitter-->
	<div class="modal fade" id="Twitter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改 - Twitter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">舊Twitter&nbsp;:&nbsp;'.$Twitter.'</label> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">新Twitter&nbsp;:&nbsp;</label>
            <input type="text" class="form-control" id="message-text" name="value">
          	<input type="hidden" class="form-control" id="message-text" name="type" value="Twitter">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--input-->
	<div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">設定 - ENTER傳送</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">現在狀態&nbsp;:&nbsp;'.$input.'</label>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">變更狀態&nbsp;:&nbsp;</label>
            <div class="onoffswitch">
    <input type="checkbox" name="value" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0" '.$input_tp.'>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
          	<input type="hidden" class="form-control" id="message-text" name="type" value="input">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--mail_info-->
	<div class="modal fade" id="mail_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">設定 - 系統通知</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">現在狀態&nbsp;:&nbsp;'.$mail_info.'</label>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">變更狀態&nbsp;:&nbsp;</label>
			<div class="onoffswitch">
    			<input type="checkbox" name="value" class="onoffswitch-checkbox" id="myonoffswitch2" tabindex="0" '.$mail_info_tp.'>
    			<label class="onoffswitch-label" for="myonoffswitch2">
        			<span class="onoffswitch-inner"></span>
        			<span class="onoffswitch-switch"></span>
    			</label>
			</div>
          	<input type="hidden" class="form-control" id="message-text" name="type" value="mail_info">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>
<!--login_info-->
	<div class="modal fade" id="login_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">設定 - 登入通知</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form action="#" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">現在狀態&nbsp;:&nbsp;'.$login_info.'</label>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">變更狀態&nbsp;:&nbsp;</label>
            <div class="onoffswitch">
    			<input type="checkbox" name="onoffswitch3" class="onoffswitch-checkbox" id="myonoffswitch3" tabindex="0" '.$login_info_tp.'>
    			<label class="onoffswitch-label" for="myonoffswitch3">
        			<span class="onoffswitch-inner"></span>
        			<span class="onoffswitch-switch"></span>
    			</label>
			</div>
          	<input type="hidden" class="form-control" id="message-text" name="type" value="login_info">
          	<input type="hidden" class="form-control" id="message-text" name="u" value="'.$username.'">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <input type="submit" name="submit" class="btn btn-primary" value="修改">
      </div>
  </form>
    </div>
  </div>
</div>

';

}  ?>
<style>
.onoffswitch {
    position: relative; width: 104px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 41px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 36px; padding: 0; line-height: 36px;
    font-size: 16px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "開啟";
    padding-left: 11px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "關閉";
    padding-right: 11px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 14px; margin: 11px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 64px;
    border: 2px solid #999999; border-radius: 41px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
</style>
    <!-- Javascripts Files -->
   <script src="dist/js/jquery-3.3.1.slim.min.js"></script>
    <script src="dist/js/popper.min.js"></script>
 <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
     <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dist/js/main.js"></script>
<!--	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
<script>
	if ('serviceWorker' in navigator) {
		window.addEventListener('load', function() {
        navigator.serviceWorker.register('../service-worker.js').then(function() { console.log("Service Worker Registered, Cheers to PWA Fire!"); });
         });
    };
</script>
</body>

</html>
<script>
var map;
function initMap() {
  var position = {
  lat: 25.0339031,
  lng: 121.5623212
  };
var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 18,
  center: position
  });
var marker = new google.maps.Marker({
  position: position,
  map: map
  });
  }
</script>

<script>
	if ('serviceWorker' in navigator) {
		window.addEventListener('load', function() {
        navigator.serviceWorker.register('../service-worker.js').then(function() { console.log("Service Worker Registered, Cheers to PWA Fire!"); });
         });
    };
</script>