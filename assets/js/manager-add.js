var userName          = document.getElementsByName('user-name')[0];
var userBranch 	      = document.getElementsByName('user-branch')[0];
var userYear          = document.getElementsByName('user-year')[0];
var userRegno 	      = document.getElementsByName('user-regno')[0];
var userEmail         = document.getElementsByName('user-email')[0];
var userPhone         = document.getElementsByName('user-phone')[0];
var userAddress       = document.getElementsByName('user-address')[0];
var userParentPhone   = document.getElementsByName('user-parentphone')[0];
var userGender        = document.getElementsByName('user-gender')[0];
var userRoom          = document.getElementsByName('user-roomnum')[0];
var __DONTFLAG        = null;
function strip( val){
  	val     =  val.replace(/[^a-zA-Z0-9\s]/g,'_');
  	return val;
  	// console.log("stripped");
}
function displayErrors(msg,ele){
	// console.log(ele);
	// console.log(ele.parentNode.parentNode.children[1]);
	ele.parentNode.parentNode.children[1].innerHTML = msg; 
}

// check on each keyup if provide value is valid
  userName.addEventListener("keyup",function(){
  	/*
		extract the value on each key up
		strip the value of special characters
		check if its a word 
			if not word display ERROR 
  	*/
  	val     = userName.value;
  	var re  = /^[\sA-Za-z]{1,20}$/;
  	val     = strip(val);
  	if( !re.test(val) ){
  		displayErrors("Enter A Valid Name",this);
  		__DONTFLAG = true;
  	}
  	else{
  		displayErrors("",this);
  		__DONTFLAG = false;
  	}
  	if( val===""){
  		displayErrors("",this);
  		__DONTFLAG = true;
  	}
  });
  
  userBranch.addEventListener("keyup",function(){
  	var val = userBranch.value;
  	strip(val);
  	val     = val.toLowerCase();
  	var re = /^[a-z]{1,4}$/;
  	displayErrors("che bme ece",this);
  	if ( !re.test(val) ){
  		displayErrors("Enter A Valid Branch",this);
  		__DONTFLAG = true;
  	}
  	if(val === "che" | val === "ece" | val === "bme" || val === ""){
  		displayErrors("",this);
  		__DONTFLAG = false;
  	}
  });

  userYear.addEventListener("keyup",function(){
  	var val   = userYear.value;
  	strip(val);
  	val       = val.replace(/\s/g,''); 
  	var re    = /^[1-3]$/;
  	// console.log(re.test(val));
  	if( !re.test(val) ){
  		displayErrors("Enter A Valid Year (1,2,3)",this);
  		__DONTFLAG  = true;
  	}
  	else{
  		displayErrors("",this);
  		__DONTFLAG = false;
  	}
  });

  userEmail.addEventListener("keyup",function(){
  	var val = userEmail.value;
  	strip(val);
  	var re  = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
  	val     = val.replace(/\s/g,''); 
  	if ( !re.test(val) ){
  		displayErrors("Enter A Valid Email Address",this);
  		__DONTFLAG = true;
  	}
  	else{
  		displayErrors("",this);
  		__DONTFLAG = false;
  	}
  });
  userPhone.addEventListener("keyup",function(){
  	var val = userPhone.value;
  	strip(val);
  	var re  = /^[0-9]{10,13}$/g;
  	if ( !re.test(val) ){
  		displayErrors("Enter A Valid Phone Number",this);
  		__DONTFLAG = true;
  	}
  	else{
  		displayErrors("",this);
  		__DONTFLAG = false;  		
  	}
  	
  });

  userAddress.addEventListener("keyup",function(){
  	var val = userAddress.value;
  	strip(val);
  	var re  = /^[-a-zA-Z0-9\.\s]+$/g;
  	if ( !re.test(val) ){
  		displayErrors("Enter A Valid Address",this);
  		__DONTFLAG = true;
  	}
  	else{
  		displayErrors("",this);
  		__DONTFLAG = false;
  	
  	}
  	
  });

userRegno.addEventListener("keyup",function(){
    var val = userRegno.value;
    // console.log(val);
    strip(val);
    var re  = /^[0-9\s]{1,10}$/g;
    if ( !re.test(val) ){
      __DONTFLAG = true;
      if( val.length > 10 )
        displayErrors("Max 10 Digits",this);
      else
        displayErrors("Enter A Valid Regno",this);
    }
    else{
      displayErrors("",this);
      __DONTFLAG = false;
    }
});
userParentPhone.addEventListener("keyup",function(){
    var val = userParentPhone.value;
    strip(val);
    var re  = /^[0-9]{10,13}$/g;
    if ( !re.test(val) ){
      displayErrors("Enter A Valid Phone Number",this);
      __DONTFLAG = true;
    }
    else{
      displayErrors("",this);
      __DONTFLAG = false;     
    }
  
});


// if any problem disable submit
var submit = document.getElementById("submit");
if (submit.addEventListener) {
  submit.addEventListener("click", validate);
} 
function validate (e) {
  e = e || window.event;
  // if invalid flag  is set by any event dont submit
  if ( __DONTFLAG === true ) {
    e.preventDefault();
  }else if(__DONTFLAG === false ){
  	var data = 
  	{
		 userName         : userName.value ,      
		 userBranch 	  : userBranch.value ,	    
		 userYear         : userYear.value ,       
		 userRegno 	      : userRegno.value ,	    
		 userEmail        : userEmail.value ,      
		 userPhone        : userPhone.value ,      
		 userAddress      : userAddress.value ,    
		 userParentPhone  : userParentPhone.value ,
		 userGender       : userGender.value    , 
		 userRoom         : userRoom.value     
  	};
  	 // console.log(data);
  	 var msg = document.getElementById("msg");
  	 var data = JSON.stringify(data);
  	 var XHR = new XMLHttpRequest();
  	 XHR.open('POST', 'http://localhost/projects/hostel/classes/register.class.php',true);
  	 XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	 XHR.setRequestHeader('X-Requested-With', 'submit');
	 XHR.onreadystatechange = responseHandler;
	 XHR.send('data=' + encodeURIComponent( data ));
	 function responseHandler(){
	 	if( XHR.readyState === 4){
	 		if(XHR.status === 200){
	 			// console.log(XHR.responseText);
	 			if ( XHR.responseText === "exist"){
	 				msg.classList.add("alert");
					msg.classList.add("alert-success");
					msg.innerHTML = "Regsiter Number Already Exists";
					setTimeout(function(){
						msg.innerHTML = "";
						msg.classList.remove("alert");					
						msg.classList.remove("alert-success");
					},5000);
	 			}else if( XHR.responseText === true ){
	 				msg.classList.add("alert");
					msg.classList.add("alert-success");
					msg.classList.add("mt-3");
					msg.innerHTML = "Added";
					setTimeout(function(){
						msg.innerHTML = "";
						msg.classList.remove("alert");					
						msg.classList.remove("alert-success");
					},5000);
	 			}
	 		}
	 	}
	 }


  }
}