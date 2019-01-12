
var submit = document.getElementById("submit");
var div    = document.getElementById("msg");
submit.addEventListener("click",function(){
	var regNum = document.getElementById("regNum");
	var msg    = document.getElementById("Msg")   ;
	var XHR    = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/notice.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","putData");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send('reg=' + encodeURIComponent(regNum.value) + '&msg=' + encodeURIComponent(msg.value));
	function callback(){
		if(XHR.readyState === 4){
			if(XHR.status === 200){
				if(XHR.responseText == 1){
					div.classList.add("alert");
					div.classList.add("alert-success");
					div.innerHTML = "Success";
					setTimeout(function(){
						div.innerHTML = "";
						div.classList.remove("alert");					
						div.classList.remove("alert-success");
					},5000);
				}
			}
		}
	}
}); 