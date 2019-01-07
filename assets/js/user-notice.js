
var submit = document.getElementById("submit");


submit.addEventListener("click",function(){
	var regNum = document.getElementById("regNum");
	var msg    = document.getElementById("Msg");
	var XHR    = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/notice.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","putData");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send('reg=' + encodeURIComponent(regNum.value) + '&msg=' + encodeURIComponent(msg.value));
	function callback(){
		if(XHR.readyState === 4){
			if(XHR.status === 200){
				console.log(XHR.responseText);
			}
		}
	}
});