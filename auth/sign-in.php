<?php 
session_start(); 
include "../chat/php_conf/database.php"; 

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
	header("location: https://health.airhot.tw/auth/auth-lock"); //已經登入轉址進入鎖定畫面
}


if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['pic_url']) && isset($_GET['mail'])){
  $query="SELECT * FROM `user` WHERE `user_name` LIKE '".$_GET['id']."'";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$id = $row['id'];
	$type = $row['type'];
	$username = $row['user_name'];
	$first_name = $row['first_name'];
  $say=array("a"=>"今天量體溫了嗎，注意身體狀況","b"=>"為了大家別亂跑歐，小心罰責找上門","c"=>"想好新話題了嗎，我們開始聊天吧","d"=>"就算見不到對方，人與人的連結也不會中斷","e"=>"需要任何幫助，隨時聯繫服務人員");
  $say=$say[(array_rand($say,1))]; // 隨機顯示提醒
  if(isset($id)){
    if($type=='0')
    {
      $_SESSION['username']=$username;
      $_SESSION['id']=$row['id'];
      $_SESSION['type']=$row['type'];
      ?>
      <script type="text/javascript">
       var name="<?php 
       if($first_name=='N/A') //判斷是否已輸入名字
        {
          echo $_SESSION['id']; //沒有顯示帳號名稱
        }
        else
        {
          echo $username; //有顯示名字
        }
        ?>";
       var say="<?php echo $say;?>";
                setTimeout(function() {
                swal({
                    title: "登入成功",
                    text: "歡迎 "+name+" 回來，"+say,
                    type: "success",
                    allowEscapeKey: false,
                    allowOutsideClick: false
                }).then(function () {
                    window.location.href = "../../find/index.php"
                });
                }, 100);
                </script>
            <?php
    }
    else if ($type=='1')
    {
      ?>
      <script type="text/javascript">
      setTimeout(function() {
      swal({
        title: "您已經無法在使用本服務了",
        html: "很高興您結束居家隔離，疫情嚴重出門要記得配戴口罩，<br>避免出入公眾場合，祝您身體健康，平平安安 !",
        type: "info",
        allowEscapeKey: false,
              allowOutsideClick: false
      }).then(function () {
        window.location.href = "../sign-in.php"
      });
      }, 100);
      </script>
      <?php
    }
    else
    {
      ?>
      <script type="text/javascript">
      setTimeout(function() {
      swal({
        title: "您離開了隔離場所？",
        html: "系統偵測到您尚未滿14天就離開隔離場所，<br>已將您的資料提交給疾病管制署 <br><br>若是判斷錯誤，請使用客服郵件提出修正",
        type: "error",
        allowEscapeKey: false,
              allowOutsideClick: false
      }).then(function () {
        window.location.href = "../sign-in.php"
      });
      }, 100);
      </script>
      <?php
    }
  }else
  {
 //echo $_GET[name];
    $username=$_GET[id];
    $mail=$_GET[mail];
    $pic_url=$_GET[pic_url];
    $bg_num=rand(1,10);
    $query="INSERT INTO `user` (`user_name`, `mail`, `first_name`, `last_name`, `pic_url`, `bg_pic_url`) VALUES ('$username','$mail','$first_name','$last_name','$pic_url','https://health.airhot.tw/images/bg/$bg_num.jpg');";
    $shouts = mysqli_query($con,$query);
    if(!$shouts)
    {
      ?>
      <script type="text/javascript">
      setTimeout(function() {
      swal({
        title: "寫入錯誤",
        html: "資料庫可能遺失，請聯繫創作團隊",
        type: "error",
        allowEscapeKey: false,
        allowOutsideClick: false
      }).then(function () {
        window.location.href = ""
      });
      }, 100);
      </script>
      <?php
    }
    else
    {
      ?>
      <script type="text/javascript">
      var username="<?php echo $username;?>";
      var mail="<?php echo $mail;?>";
      setTimeout(function() {
      swal({
        title: "註冊成功",
        imageUrl: "<?php echo $profile["picture"]["url"]; ?>",
        imageWidth: 100,
        imageHeight: 100,
        html: "您的帳號是："+username+"<br>您的信箱是："+mail+"<br>請牢記您的資料",
        type: "success",
        allowEscapeKey: false,
        allowOutsideClick: false
      }).then(function () {
        window.location.href = "../../find/index.php"
      });
      }, 100);
      </script>
      <?php
    }
  }

}

if(isset($_POST['username']) && isset($_POST['pass'])){
	$query="SELECT * FROM `user` WHERE `user_name` LIKE '".$_POST['username']."'";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$pass = $row['password'];
	$first_name = $row['first_name'];
	$username = $row['username'];
	$type = $row['type'];
  $say=array("a"=>"今天量體溫了嗎，注意身體狀況","b"=>"為了大家別亂跑歐，小心罰責找上門","c"=>"想好新話題了嗎，我們開始聊天吧","d"=>"就算見不到對方，人與人的連結也不會中斷","e"=>"需要任何幫助，隨時聯繫服務人員");
  $say=$say[(array_rand($say,1))]; // 隨機顯示提醒
	if (password_verify($_POST['pass'], $pass)) {
    if($type=='0')
    {
      $_SESSION['username']=$_POST['username'];
   	 	$_SESSION['id']=$row['id'];
   	 	$_SESSION['type']=$row['type'];
   	 	$_SESSION['pic_url']=$row['pic_url'];
      ?>
				<script type="text/javascript">
				var name="<?php 
        if($first_name=='N/A') //判斷是否已輸入名字
        {
          echo $_SESSION['username']; //沒有顯示帳號名稱
        }
        else
        {
          echo $first_name; //有顯示名字
        }
        ?>";
       var say="<?php echo $say;?>";
				setTimeout(function() {
				swal({
					title: "登入成功",
					text: "歡迎 "+name+" 回來，"+say,
					type: "success",
					allowEscapeKey: false,
            		allowOutsideClick: false
				}).then(function () {
					window.location.href = "../find/index.php"
				});
				}, 100);
				</script>
			<?php
    }
    else if ($type=='1')
    {
      ?>
      <script type="text/javascript">
      setTimeout(function() {
      swal({
        title: "您已經無法在使用本服務了",
        html: "很高興您結束居家隔離，疫情嚴重出門要記得配戴口罩，<br>避免出入公眾場合，祝您身體健康，平平安安 !",
        type: "info",
        allowEscapeKey: false,
              allowOutsideClick: false
      }).then(function () {
        window.location.href = ""
      });
      }, 100);
      </script>
      <?php
    }
    else
    {
      ?>
      <script type="text/javascript">
      setTimeout(function() {
      swal({
        title: "您離開了隔離場所？",
        html: "系統偵測到您尚未滿14天就離開隔離場所，<br>已將您的資料提交給疾病管制署 <br><br>若是判斷錯誤，請使用客服郵件提出修正",
        type: "error",
        allowEscapeKey: false,
              allowOutsideClick: false
      }).then(function () {
        window.location.href = ""
      });
      }, 100);
      </script>
      <?php
    }
	} else {
        ?>
        <script type="text/javascript">
        setTimeout(function() {
        swal({
          title: "登入錯誤",
          html: "您好像沒有帳號，或是密碼打錯了",
          type: "error",
          allowEscapeKey: false,
                allowOutsideClick: false
        }).then(function () {
          window.location.href = ""
        });
        }, 100);
        </script>
        <?php
	}

}

?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>簡疫聊天室 - 登入頁面</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
    <link href="../images/logo/logo48.ico" rel="icon" type="image/x-icon" />
    <link href="../images/logo/logo48.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="../images/logo/logo48.ico" rel="bookmark" type="image/x-icon" />
    <link href="../images/logo/logo180.ico" rel="apple-touch-icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.css" />
  </head>
  <body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
      <div class="container-tight py-6">
        <div class="text-center mb-4">
        <a href="../index"><img src="../images/logo/logo.png" height="85" alt=""></a>
        </div>
        <form class="card card-md" action="" method="post" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">登入您的帳號</h2>
            <div class="mb-3">
              <label class="form-label">帳號</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="請輸入您的帳號" required>
            </div>
            <div class="mb-2">
              <label class="form-label">
                密碼
                <span class="form-label-description">
                  <a href="forgot-password">我忘記密碼了</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" id="myInput" name="pass"  class="form-control"  placeholder="請輸入您的密碼"  autocomplete="off" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" onclick="myFunction()" title="查看密碼" data-bs-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">登入</button>
            </div>
          </div>


          <div class="hr-text">or</div>
          <div class="card-body">
            <div class="row">
              <div class="col"><button id="GOOGLE_login"  class="btn btn-white w-100">
              <img width="24" height="24" src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGc+PHBhdGggZD0ibTEyMCAyNTZjMC0yNS4zNjcgNi45ODktNDkuMTMgMTkuMTMxLTY5LjQ3N3YtODYuMzA4aC04Ni4zMDhjLTM0LjI1NSA0NC40ODgtNTIuODIzIDk4LjcwNy01Mi44MjMgMTU1Ljc4NXMxOC41NjggMTExLjI5NyA1Mi44MjMgMTU1Ljc4NWg4Ni4zMDh2LTg2LjMwOGMtMTIuMTQyLTIwLjM0Ny0xOS4xMzEtNDQuMTEtMTkuMTMxLTY5LjQ3N3oiIGZpbGw9IiNmYmJkMDAiLz48cGF0aCBkPSJtMjU2IDM5Mi02MCA2MCA2MCA2MGM1Ny4wNzkgMCAxMTEuMjk3LTE4LjU2OCAxNTUuNzg1LTUyLjgyM3YtODYuMjE2aC04Ni4yMTZjLTIwLjUyNSAxMi4xODYtNDQuMzg4IDE5LjAzOS02OS41NjkgMTkuMDM5eiIgZmlsbD0iIzBmOWQ1OCIvPjxwYXRoIGQ9Im0xMzkuMTMxIDMyNS40NzctODYuMzA4IDg2LjMwOGM2Ljc4MiA4LjgwOCAxNC4xNjcgMTcuMjQzIDIyLjE1OCAyNS4yMzUgNDguMzUyIDQ4LjM1MSAxMTIuNjM5IDc0Ljk4IDE4MS4wMTkgNzQuOTh2LTEyMGMtNDkuNjI0IDAtOTMuMTE3LTI2LjcyLTExNi44NjktNjYuNTIzeiIgZmlsbD0iIzMxYWE1MiIvPjxwYXRoIGQ9Im01MTIgMjU2YzAtMTUuNTc1LTEuNDEtMzEuMTc5LTQuMTkyLTQ2LjM3N2wtMi4yNTEtMTIuMjk5aC0yNDkuNTU3djEyMGgxMjEuNDUyYy0xMS43OTQgMjMuNDYxLTI5LjkyOCA0Mi42MDItNTEuODg0IDU1LjYzOGw4Ni4yMTYgODYuMjE2YzguODA4LTYuNzgyIDE3LjI0My0xNC4xNjcgMjUuMjM1LTIyLjE1OCA0OC4zNTItNDguMzUzIDc0Ljk4MS0xMTIuNjQgNzQuOTgxLTE4MS4wMnoiIGZpbGw9IiMzYzc5ZTYiLz48cGF0aCBkPSJtMzUyLjE2NyAxNTkuODMzIDEwLjYwNiAxMC42MDYgODQuODUzLTg0Ljg1Mi0xMC42MDYtMTAuNjA2Yy00OC4zNTItNDguMzUyLTExMi42MzktNzQuOTgxLTE4MS4wMi03NC45ODFsLTYwIDYwIDYwIDYwYzM2LjMyNiAwIDcwLjQ3OSAxNC4xNDYgOTYuMTY3IDM5LjgzM3oiIGZpbGw9IiNjZjJkNDgiLz48cGF0aCBkPSJtMjU2IDEyMHYtMTIwYy02OC4zOCAwLTEzMi42NjcgMjYuNjI5LTE4MS4wMiA3NC45OC03Ljk5MSA3Ljk5MS0xNS4zNzYgMTYuNDI2LTIyLjE1OCAyNS4yMzVsODYuMzA4IDg2LjMwOGMyMy43NTMtMzkuODAzIDY3LjI0Ni02Ni41MjMgMTE2Ljg3LTY2LjUyM3oiIGZpbGw9IiNlYjQxMzIiLz48L2c+PC9zdmc+" />&nbsp;Google 登入</button></div>
              <div class="col"><a href="facebook/index.php" class="btn btn-white w-100">
              <img width="24" height="24" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDExMi4xOTYgMTEyLjE5NiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTEyLjE5NiAxMTIuMTk2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiMzQjU5OTg7IiBjeD0iNTYuMDk4IiBjeT0iNTYuMDk4IiByPSI1Ni4wOTgiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTcwLjIwMSw1OC4yOTRoLTEwLjAxdjM2LjY3Mkg0NS4wMjVWNTguMjk0aC03LjIxM1Y0NS40MDZoNy4yMTN2LTguMzQNCgkJYzAtNS45NjQsMi44MzMtMTUuMzAzLDE1LjMwMS0xNS4zMDNMNzEuNTYsMjEuODF2MTIuNTFoLTguMTUxYy0xLjMzNywwLTMuMjE3LDAuNjY4LTMuMjE3LDMuNTEzdjcuNTg1aDExLjMzNEw3MC4yMDEsNTguMjk0eiIvPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" />&nbsp;Facebook 登入</a></div>
          </div>
          </div>
          </form>

        <div class="text-center text-muted mt-3">
          還沒有帳號嗎? <a href="sign-up" tabindex="-1">註冊</a> / 
           <a href="../index" tabindex="-1">返回首頁</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://apis.google.com/js/api:client.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.js" type="text/javascript"></script>
  </body>
</html>
<script>
function myFunction() { //密碼
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>  
<script>
// 進行登入程序
var startApp = function() {
gapi.load("auth2", function() {
auth2 = gapi.auth2.init({
client_id: "115196859131-r85f31rk1q0sjbvo4mtlfcg4tcv9ti5g.apps.googleusercontent.com", // 用戶端 ID
cookiepolicy: "single_host_origin"
});
attachSignin(document.getElementById("GOOGLE_login"));
});
};

function attachSignin(element) {
auth2.attachClickHandler(element, {},
// 登入成功
function(googleUser) {
var profile = googleUser.getBasicProfile(),
$target = $("#GOOGLE_STATUS_2"),
html = "";
html += "ID: " + profile.getId() + "<br/>";
html += "會員暱稱： " + profile.getName() + "<br/>";
html += "會員頭像：" + profile.getImageUrl() + "<br/>";
html += "會員 email：" + profile.getEmail() + "<br/>";
$target.html(html);
var id = profile.getId();
var name = profile.getName();
var pic_url = profile.getImageUrl();
var mail = profile.getEmail();
location.href="sign-in.php?id=" +id+"&name="+name+"&pic_url="+pic_url+"&mail="+mail;
},

// 登入失敗
function(error) {
$("#GOOGLE_STATUS_2").html("");

});
}

startApp();

// 點擊登入
$("#GOOGLE_login").click(function() {
// 進行登入程序
startApp();
});
</script>