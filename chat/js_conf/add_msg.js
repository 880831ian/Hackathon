function addHint(gid,sid) {
var data = document.getElementById("msg_text").value;
document.getElementById("msg_text").value="";
if(data.indexOf("\n") >= 0 ){
	data = data+"<br>";
	data=data.replace(/\n/g,"<br>");
}
var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
    }
  };
  xhttp.open("GET", "./php_conf/add_mes.php?gid="+gid+"&sid="+sid+"&text="+data+"&text_type=text", true);
  xhttp.send(); 



}
