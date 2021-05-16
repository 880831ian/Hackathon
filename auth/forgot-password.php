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
    <title>簡疫聊天室 - 忘記密碼頁面</title>
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
  </head>
  <body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
      <div class="container-tight py-6">
        <div class="text-center mb-4">
        <a href="../index"><img src="../images/logo/logo.png" height="85" alt=""></a>
        </div>
        <form class="card card-md" action="" method="post">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">忘記密碼</h2>
            <p class="text-muted mb-4">請輸入您註冊時填寫的信箱，系統會自動發送郵件至您的信箱，該郵件<font color='blue'>30分鐘</font>內有效，請儘速修改密碼。</p>
            <div class="mb-3">
              <label class="form-label">信箱</label>
              <input type="email" class="form-control" placeholder="請輸入信箱" require>
            </div>
            <div class="form-footer">
              <a href="" class="btn btn-primary w-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
                傳送找回密碼郵件
              </a>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          我想起來了, <a href="sign-in">帶我回去</a> 登入畫面
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
  </body>
</html>