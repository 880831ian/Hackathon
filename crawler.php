<?php session_start(); ?>
<?php include "./chat/php_conf/database.php"; ?>
<?php
header('Access-Control-Allow-Origin: *'); 
header("Content-Type: text/html; charset=utf-8");

$text = file_get_contents('https://covid19dashboard.cdc.gov.tw/dash3');
$tt = mb_convert_encoding($text, 'UTF-8',
          mb_detect_encoding($text, 'UTF-8, big5', true));

$obj = json_decode($text, true);
$Confirmed = $obj[0]["確診"];
$releasedisolation = $obj[0]["解除隔離"];
$death = $obj[0]["死亡"];
$quarantine = $obj[0]["送驗"];
$lastdayconfirmed = $obj[0]["昨日確診"];
$lastdayexclude = $obj[0]["昨日排除"];
$lastdayquarantine = $obj[0]["昨日送驗"];
echo $query="UPDATE `config` SET `Confirmed` = '$Confirmed',`released_isolatio` = '$releasedisolation',`deaths` = '$death',
`quarantine` = '$quarantine',`last_day_confirmed` = '$lastdayconfirmed',`last_day_exclude` = '$lastdayexclude',`last_day_quarantine` = '$lastdayquarantine' WHERE `config`.`id` = 1;";
$shouts = mysqli_query($con,$query);
?>