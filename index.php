<?php session_start(); ?>
<?php include "./chat/php_conf/database.php"; ?>
<?php
$query="SELECT * FROM `config` WHERE `id` = 1;";
$shouts = mysqli_query($con,$query);
$row=mysqli_fetch_assoc($shouts);
?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
    	<style>
        div.a { font-size: 80%; }
        div.b { font-size: 138%; }
        div.c { font-size: 300%; }
        div.d { font-size: 150%; }
        </style>
		<title>簡疫聊天室 - 首頁</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
   		<link rel="stylesheet" href="assets/css/grid.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link href="images/logo/logo48.ico" rel="icon" type="image/x-icon" />
        <link href="images/logo/logo48.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="images/logo/logo48.ico" rel="bookmark" type="image/x-icon" />
        <link href="images/logo/logo180.ico" rel="apple-touch-icon" type="image/x-icon" />
    	<link rel="manifest" href="./manifest.json">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="index.php" class="logo"><strong>Health</strong> <span>簡疫聊天室</span></a>
						<nav>
							<a href="#menu">選單</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index">首頁</a></li>
							<li><a href="introduction">介紹</a></li>
							<li><a href="https://covid-19.nchc.org.tw/">全球疫情</a></li>
							<li><a href="original team">創作團隊</a></li>
						</ul>
						<ul class="actions stacked">
							<li><a href="./auth/sign-in" class="button fit">登入</a></li>
						</ul>
					</nav>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>簡疫聊天室<br>防疫在家不無聊</h1>
							</header>
							<div class="content">
								<div class="b"><p>只要您是回國檢疫者、居家檢疫者、旅館檢疫的各位。<br>都可以加入我們的簡疫聊天室，讓您防疫不無聊。</p></div>
								<ul class="actions">
									<li><a href="./auth/sign-in.php" class="button next scrolly">開啟簡疫新生活</a></li>
								</ul>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">
							<section id="one" class="tiles">
								<article>
									<span class="image">
										<img src="images/pic002.jpg" alt="" />
									</span>
									<header class="major">
                                    	<h3><a>簡疫聊天室由來</a></h3>
										<div class="a"><p><b>在這疫情當道時代，疫情又開始逐漸地在各地爆發，<br>人人都有機會中鏢的可能性。
                                    	<br>當染疫時，一個人在房間，<br>難免會有無聊或是需要人陪您聊天的時候。<br>這時您可以選擇使用【簡疫聊天室】讓您防疫不無聊，<br>同時還能拓展交友圈，讓您在防疫時期有個美好的回憶。</b></p></div>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic003.jpg" alt="" />
									</span>
                                	<div class="modal-dialog overlay-landscape-modal-mobile" style="width: 100%">
                                    <header class="major">
                                    <div class="modal-header">
                                    <h3 class="modal-title">台灣疫情</h3>
                                    </div>
    								
    								<div class="midden">
                                    <div class="midden-people">
            								<b>
                								<span class="count"><?php echo $row['Confirmed']?></span>
                								<span>人</span>
            								</b>
    								</div>
    								<div class="midden-local">
       									<b>台灣歷史確診人數</b>
    								</div>
   									<div class="midden-people">
            								<b>
                								<span class="count"><?php echo $row['last_day_Confirmed']?></span>
               									 <span>人</span>
           									 </b>
    								</div>
   									 <div class="midden-local">
        								<b>台灣地區昨日確診人數</b>
    								</div>
                                    </div>
								</header>
                                    </div>
								</article>
								<article>
                                
									<span class="image">
										<img src="images/pic004.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="https://covid-19.nchc.org.tw/map.php" class="link" target="_blank"></a>全球確診地圖</h3>
                                    <div class="a"><b><p>讓您隨時知道有多少和您一樣的同伴</p></b></div>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic005.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="https://www.cdc.gov.tw/Bulletin/List/MmgtpeidAR5Ooai4-fgHzQ" class="link" target="_blank">疫情新聞</a></h3>
										<div class="a"><b><p>讓您隨時更新疫情資訊</p></b></div>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic006.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="../auth/manual" class="link">聊天室使用規則</a></h3> 
                                    <div class="a"><b><p>讓您聊天更愉快</p></b></div>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic007.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="isolation" class="link">隔離須知</a></h3>
                                    <div class="a"><b><p>讓您接到隔離通知書或是回國隔離時不慌張。</p></b></div>
									</header>
								</article>
							</section>

					</div>

				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" />
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" />
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="6"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="傳送訊息" class="primary" /></li>
										<li><input type="reset" value="清除" /></li>
									</ul>
								</form>
							</section>
							<section class="split">
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-envelope"></span>
										<h3>Email</h3>
										<a href="mailto:service@airhot.tw" target="_blank">service@airhot.tw</a>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon brands alt fa-facebook-f"></span>
										<h3>facebook</h3>
                                   		<a href="https://airhot.tw/wgRMgJ" target="_blank">https://airhot.tw/wgRMgJ</a>
									</div>
								</section>
                            	<section>
									<div class="contact-method">
										<span class="icon brands alt fa-github"></span>
										<h3>Github</h3>
										<span><a href="https://github.com/880831ian" target="_blank">https://github.com/880831ian</a></span>
									</div>
								</section>
							</section>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="https://www.facebook.com/Air-Cloud-%E6%99%BA%E6%85%A7%E7%94%9F%E6%B4%BB-101467452084132" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                            	<li><a href="https://www.youtube.com/channel/UCrIrzZ7Uuzk-mW_hTRG7dbQ/featured" class="icon brands alt fab fa-youtube"><span class="label">Twitter</span></a></li>
								<li><a href="https://www.instagram.com/air_cloud_1/" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="https://github.com/880831ian" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
							</ul>
							<ul class="copyright">
								<li>Copyright &copy; <?php echo date("Y");?> Air Cloud All rights reserved.</li>
							</ul>
						</div>
					</footer>
                  </div>
      

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
    		<script src="assets/js/count.js"></script>

    <script>
    $(window).on("deviceorientation resize", function( event ) {
    if (window.matchMedia("(orientation: portrait)").matches) {
        $('.overlay-landscape').removeClass('active');
        $('.overlay-landscape-modal-mobile').removeClass('active');
    }
    if (window.matchMedia("(orientation: landscape)").matches) {
        $('.overlay-landscape').addClass('active');
        $('.overlay-landscape-modal-mobile').addClass('active');
    }
});
    </script>
       <script>
          if ('serviceWorker' in navigator)
          {
          window.addEventListener('load', function() {
            navigator.serviceWorker.register('./service-worker.js')
            .then(function() { console.log("Service Worker Registered, Cheers to PWA Fire!"); });
          }
          );
        }
        </script>
	</body>
</html>