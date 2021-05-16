function showHint(gid,uid) {
	if(!navigator.onLine){
    	document.getElementById("msg").innerHTML = localStorage.getItem(gid);
	}else{
		var xhttp;
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			var msg =  this.responseText;
    			var allmsg = localStorage.getItem(gid)+msg;
            	document.getElementById("msg").innerHTML = allmsg
    			localStorage.setItem(gid,allmsg);
    		}
  		};
  		xhttp.open("GET", "./php_conf/show_mes.php?gid="+gid+"&uid="+uid, true);
  		xhttp.send(); 
	}  
}
function showallHint(gid,uid) {
	if(!navigator.onLine){
    	document.getElementById("msg").innerHTML = localStorage.getItem(gid);
	}else{
		var xhttp;
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			var msg =  this.responseText;
    			var allmsg = localStorage.getItem(gid)+msg;
            	document.getElementById("msg").innerHTML = allmsg
    			localStorage.setItem(gid,allmsg);
    		}
  		};
  		xhttp.open("GET", "./php_conf/show_all_mes.php?gid="+gid+"&uid="+uid, true);
  		xhttp.send(); 
	}  
}
