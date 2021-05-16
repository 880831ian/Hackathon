// 當service worker在「安裝階段」時會觸發此事件
self.addEventListener('install', function(event) {
    console.log('[Service Worker] Installing Service Worker ...', event);
});

// 當service worker在「激活階段」時會觸發此事件
self.addEventListener('activate', function(event) {
    console.log('[Service Worker] Activating Service Worker ...', event);
    return self.clients.claim();   // 加上這行是為了確保service worker被正確載入和激活，不加也行
});
self.addEventListener('fetch', function(event) {
    console.log('[Service Worker] Fetch something ...', event);
    event.respondWith(fetch(event.request));
});
let deferredPrompt;

self.addEventListener('beforeinstallprompt', function(event) {
    console.log('beforeinstallprompt fired');
    event.preventDefault();  // 取消預設的直接跳出通知設定
    deferredPrompt = event;  // 將監聽到的install banner事件傳到deferredPrompt變數
    
    return false;
});
if(deferredPrompt) {   // 確定我們有「攔截」到chrome所發出的install banner事件
    deferredPrompt.prompt();   // 決定要跳出通知

    // 根據用戶的選擇進行不同處理，這邊我指印出log結果
    deferredPrompt.userChoice.then(function(choiceResult) {
      console.log(choiceResult.outcome);
      
      if(choiceResult.outcome === 'dismissed'){
        console.log('User cancelled installation');
      }else{
        console.log('User added to home screen');
      }
    });
    deferredPrompt = null; // 一旦用戶允許加入後，之後就不會再出現通知
}