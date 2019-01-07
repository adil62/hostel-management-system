var regINPUT       = document.getElementById("ajax3");
var searchString   = "";
var check     	   = document.getElementById("check");
var buttonPresent  = document.getElementById("present");
var buttonAbsent   = document.getElementById("absent");
var buttonResult   = document.getElementById("success");

regINPUT.addEventListener("keyup",function(){
	if( this.value.length > 4 )
	{
		XHR = new XMLHttpRequest();
		XHR.open('POST', 'http://localhost/projects/hostel/classes/checker.class.php',true);
		XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	    XHR.setRequestHeader('X-Requested-With', 'userExists');
		XHR.onreadystatechange = responseHandler;
		XHR.send('user_reg=' + encodeURIComponent(this.value));
	}
	function showForm(){
		buttonAbsent.style.display  = "inline-block";
		buttonPresent.style.display = "inline-block";
	}
	function responseHandler(){
		if(XHR.readyState === 4){
			if(XHR.status === 200){
				console.log(XHR.responseText);
				if( XHR.responseText == 1 ){
					check.innerHTML = "User Exists";
					showForm();
				}else{
					check.innerHTML = "";
				}
			}
		}	
	}	
});
// ADD event listener for buttons;
buttonPresent.addEventListener("click",function(){
	var XHR = new XMLHttpRequest();
	XHR.open('POST','http://localhost/projects/hostel/classes/attendence.class.php',true);
	XHR.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With','presentBtn');
	XHR.send("pressed=present&"+'user_reg=' + encodeURIComponent(regINPUT.value));
	XHR.onreadystatechange = callback;
	function callback(){
		if(XHR.readyState === 4){
			if (XHR.status === 200)
				buttonResult.innerHTML = "Done";
			else
				buttonResult.innerHTML = "";
		}
	}
});
buttonAbsent.addEventListener("click",function(){
	var XHR = new XMLHttpRequest();
	XHR.open('POST','http://localhost/projects/hostel/classes/attendence.class.php',true);
	XHR.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With','absentBtn');
	XHR.send("pressed=absent&"+'user_reg=' + encodeURIComponent(regINPUT.value));

	XHR.onreadystatechange = callback;
	function callback(){
		if(XHR.readyState === 4){
			if (XHR.status === 200){
				buttonResult.innerHTML = "Successfully Recorded";
				regINPUT.value = "";
				check.innerHTML = "";
			}
			else
				buttonResult.innerHTML = "";
		}
	}
});