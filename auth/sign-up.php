<?php 
include "../chat/php_conf/database.php";

if(isset($_POST['username'])){
	$query="SELECT * FROM `user` WHERE `user_name` LIKE '".$_POST['username']."'";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$id = $row['id'];
	$query1="SELECT * FROM `user` WHERE `mail` LIKE '".$_POST['mail']."'";
	$shouts1 = mysqli_query($con,$query1);
	$row1=mysqli_fetch_assoc($shouts1);
	$db_mail = $row1['mail'];

  $username=$_POST['username'];
  $mail=$_POST['mail'];
  $pass=$_POST['pass'];
  $pass_check=$_POST['pass_check'];
	if(isset($id)){
    ?>
    <script type="text/javascript">
    setTimeout(function() {
    swal({
      title: "註冊錯誤",
      html: "該帳號已被註冊，請換一個帳號試試看",
      type: "info",
      allowEscapeKey: false,
      allowOutsideClick: false
    }).then(function () {
      window.location.href = ""
    });
    }, 100);
    </script>
    <?php
    }else	if(isset($db_mail)){
      ?>
      <script type="text/javascript">
      setTimeout(function() {
      swal({
        title: "註冊錯誤",
        html: "該信箱已被註冊，請換一個信箱試試看",
        type: "info",
        allowEscapeKey: false,
        allowOutsideClick: false
      }).then(function () {
        window.location.href = ""
      });
      }, 100);
      </script>
      <?php
    }else{
        if($pass==$pass_check)
        {
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
          $pic_num=rand(1,7);
          $bg_num=rand(1,10);
          $query="INSERT INTO `user` (`user_name`, `mail`, `password`, `pic_url`, `bg_pic_url`) VALUES ('$username','$mail','$pass','https://health.airhot.tw/images/profile/$pic_num.jpg','https://health.airhot.tw/images/bg/$bg_num.jpg');";
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
              html: "您的帳號是："+username+"<br>您的信箱是："+mail+"<br>請牢記您的資料",
              type: "success",
              allowEscapeKey: false,
              allowOutsideClick: false
            }).then(function () {
              window.location.href = "sign-in"
            });
            }, 100);
            </script>
            <?php
          }
        }
        else
        {  
          ?>
          <script type="text/javascript">
          setTimeout(function() {
          swal({
            title: "密碼錯誤",
            html: "密碼兩次輸入不相同，請重新再試一次",
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
    <title>簡疫聊天室 - 註冊頁面</title>
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
            <h2 class="card-title text-center mb-4">創建一個帳號</h2>
            <div class="mb-3">
              <label class="form-label">帳號</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="請輸入陪伴您14天的帳號名稱" required>
            </div>
            <div class="mb-3">
              <label class="form-label">信箱</label>
              <input type="email" id="mail" name="mail" class="form-control" placeholder="請輸入信箱，用來找回您的密碼" required>
            </div>
            <div class="mb-3">
              <label class="form-label">密碼</label>
              <div class="input-group input-group-flat">
              <input type="password" id="myInput" name="pass"  class="form-control"  placeholder="請輸入密碼，帶領你前往未知的領域"  autocomplete="off" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" onclick="myFunction()" title="查看密碼" data-bs-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">再一次密碼</label>
              <div class="input-group input-group-flat">
              <input type="password" id="myInput_check" name="pass_check"  class="form-control"  placeholder="請輸入密碼，來驗證你有沒有打錯🤣"  autocomplete="off" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" onclick="myFunction_check()" title="查看密碼" data-bs-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required/>
                <span class="form-check-label" for="exampleCheck1">我同意 <a href="./manual" tabindex="-1">簡疫聊天室使用申明與規範</a></span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">建立新帳號</button>
            </div>
            </div>

        </form>
      </div>
      <div class="text-center text-muted mt-3">
          我有帳號了 <a href="sign-in" tabindex="-1">登入</a>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
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
function myFunction_check() { //密碼
  var x = document.getElementById("myInput_check");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>  