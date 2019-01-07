
var ev = document.getElementById("ev");
ev.addEventListener("click",function(){
	console.log(ev);
	var div = document.getElementById("msg");
	var ip  = document.getElementById("input");
	var XHR = new XMLHttpRequest();
	XHR.open('POST','http://localhost/projects/hostel/classes/manager-complaint.class.php',true);
	XHR.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With','dlt');
	console.log(ip.value);
	XHR.send("id="+encodeURIComponent(ip.value));
	console.log(ip.value);
	XHR.onreadystatechange = callback;
	var query = 
	XHR.send("page=");
	function callback(){
		if(XHR.readyState == 4){
			if(XHR.status == 200){
				if(XHR.responseText == 1){
					div.innerHTML =  "Success";
				}
				else{
					div.innerHTML =  "Fail";
				}
				div.classList.add("alert");
				div.classList.add("alert-success");
				setTimeout(function(){
					div.innerHTML = "";
					div.classList.remove("alert");					
					div.classList.remove("alert-success");
				},5000);
			}
		}	
	}
});