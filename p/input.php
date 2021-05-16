<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body onclick="$('#input').modal();">
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
    <input type="checkbox" name="value" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0" checked>
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
<script>
	if ('serviceWorker' in navigator) {
		window.addEventListener('load', function() {
        navigator.serviceWorker.register('../service-worker.js').then(function() { console.log("Service Worker Registered, Cheers to PWA Fire!"); });
         });
    };
</script>
</body>
   <script src="dist/js/jquery-3.3.1.slim.min.js"></script>
    <script src="dist/js/popper.min.js"></script>
 <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
     <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dist/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>