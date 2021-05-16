<?PHP 
session_start();
session_destroy();
?>
<script type="text/javascript">
setTimeout(function() {
swal({
  title: "您已登出",
  text: "期待與您再相會 !",
  type: "success",
  allowEscapeKey: false,
  allowOutsideClick: false
}).then(function () {
  window.location.href = "sign-in"
});
}, 100);
</script>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡疫聊天室 - 登出頁面</title>
    <link href="../images/logo48.ico" rel="icon" type="image/x-icon" />
    <link href="../images/logo48.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="../images/logo48.ico" rel="bookmark" type="image/x-icon" />
    <link href="../images/logo180.ico" rel="apple-touch-icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.css" />
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.js" type="text/javascript"></script>
</body>
</html>