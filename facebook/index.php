<?php
session_start();
include "../../chat/php_conf/database.php";
require_once dirname(__FILE__).'/facebook_login/initialization.php'; //引入 Facebook 登入初始設定
if (isset($accessToken))
{
  require_once dirname(__FILE__) . '/facebook_login/statuslogin.php';
  $query="SELECT * FROM `user` WHERE `user_name` LIKE '".$profile["id"]."'";
	$shouts = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($shouts);
	$id = $row['id'];
	$type = $row['type'];
	$username = $row['user_name'];
	$first_name = $row['first_name'];
  $query1="SELECT * FROM `user` WHERE `mail` LIKE '".$profile['email']."";
	$shouts1 = mysqli_query($con,$query1);
	$row1=mysqli_fetch_assoc($shouts1);
	$db_mail = $row1['mail'];
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
            $username=$profile["id"];
            $mail=$profile["email"];
            $first_name=$profile["first_name"];
            $last_name=$profile["last_name"];
            $pic_url=$profile["picture"]["url"];
            $query="INSERT INTO `user` (`user_name`, `mail`, `first_name`, `last_name`, `pic_url`) VALUES ('$username','$mail','$first_name','$last_name','$pic_url');";
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
else
{
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //取得目前頁面網址
    $loginUrl = $helper->getLoginUrl($url, $permissions); //取得 Facebook 登入網址
    header("Location: $loginUrl");

    ?>
        <p><font color="#ff0000">您尚未登入 Facebook！</font></p>
        <h3><a href="<?php echo $loginUrl; ?>">使用 Facebook 登入</a></h3>
    <?php
}
?>
<html>
    <head>
        <title>Facebook 登入功能示範</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.css" />
    </head>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.js" type="text/javascript"></script>

