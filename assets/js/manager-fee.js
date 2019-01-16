var currentAmount = document.getElementById("current-amount");
var updateBtn     = document.getElementById("update");
var newFee        = document.getElementById("new-fee");
var date1         = document.getElementById("date2");
var filter1  	  = document.getElementById("filter1");
var filter2  	  = document.getElementById("filter2");
var year          = document.getElementById("year");
if(currentAmount!=null){
window.addEventListener("load",function(){
	var XHR = new XMLHttpRequest();
	XHR.open("GET","http://localhost/projects/hostel/classes/fee.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","getLatest");
	// XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send();
	function callback(){
		if(XHR.readyState == 4){
			if(XHR.status == 200){
				var response = XHR.responseText;
				response     = JSON.parse(response); 
				currentAmount.value = response.fee;
				// console.log( response );				
			}
		}
	}
});
}
if(updateBtn != null){
updateBtn.addEventListener("click",function(){
	var value = newFee.value;
	var XHR   = new XMLHttpRequest();
	var div   = document.getElementById("msg");
	XHR.open("POST","http://localhost/projects/hostel/classes/fee.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","updateValue");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send("value="+ encodeURIComponent(value));
	function callback(){
		if( XHR.readyState == 4 ){
			if( XHR.status == 200 ){
				var response = XHR.responseText;
				currentAmount.value = value;
				div.innerHTML = "success";
				div.classList.add("alert");
				div.classList.add("alert-success");
				setTimeout(function(){
					div.innerHTML = "";
					div.classList.remove("alert");					
					div.classList.remove("alert-success");
				},4000);
			}
		}
	}
});
}
if (filter1 != null){
filter1.addEventListener("click",function(){
	var value = date1.value;
	var XHR   = new XMLHttpRequest();
	var div   = document.getElementById("msg");
	XHR.open("POST","http://localhost/projects/hostel/classes/fee.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","getDate");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send("date="+ encodeURIComponent(value));
	function callback(){
		if( XHR.readyState == 4 ){
			if( XHR.status == 200 ){
				if( document.contains( document.getElementById("dynTable") )){
       				document.getElementById("dynTable").remove();
       			}	
				var div      = document.getElementById("content");
				var response = XHR.responseText;
				// console.log(response);
				var response = JSON.parse(response);
				var table    = document.createElement("table");
				var tbody    = document.createElement("tbody");
				var thead    = document.createElement("thead");
				var trH      = table.insertRow();
				// add classes to table
				table.classList.add("table","table-hover");
				table.setAttribute("id", "dynTable");
				for(var i=0 ; i < response.length ;i++){
					var obj = response[i];
					if(i == 0){
						for(prop in obj){
							var th       = document.createElement("th");
							th.innerHTML = prop;
							trH.append(th);
							thead.append(trH);
						}
						
					}
					var tr = table.insertRow();
					for(prop in obj){
						var td = document.createElement("td");
						td.innerHTML = obj[prop];
						tr.append(td);
					}
					tbody.append(tr);
					table.append(thead);					
					table.append(tbody);
					div.append(table);
				}
				
			}
		}
	}
});
}
if ( filter2 != null ){
filter2.addEventListener("click",function(){
	var month    = document.getElementById("select");
	// var year     = document.getElementById("currentYear");
	valueYear    = year.value;
	valueMonth   = month.value;
	var XHR   = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/fee.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","getMonth");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// XHR.send("month="+ encodeURIComponent(valueMonth));
	XHR.send("month="+ encodeURIComponent(valueMonth)+"&year="+encodeURIComponent(valueYear));
    XHR.onreadystatechange = callback;

    function callback(){
		if( XHR.readyState == 4 ){
			if( XHR.status == 200 ){
				if( document.contains( document.getElementById("dynTable") )){
       				document.getElementById("dynTable").remove();
       			}	
				// console.log(XHR.responseText);
				var div      = document.getElementById("content");
				var response = XHR.responseText;
				var response = JSON.parse(response);
				var table    = document.createElement("table");
				var tbody    = document.createElement("tbody");
				var thead    = document.createElement("thead");
				var trH      = table.insertRow();
				// add classes to table
				table.classList.add("table","table-hover");
				table.setAttribute("id", "dynTable");
				for(var i=0 ; i < response.length ;i++){
					var obj = response[i];
					if(i == 0){
						for(prop in obj){
							var th       = document.createElement("th");
							th.innerHTML = prop;
							trH.append(th);
							thead.append(trH);
						}
						
					}
					var tr = table.insertRow();
					for(prop in obj){
						var td = document.createElement("td");
						td.innerHTML = obj[prop];
						tr.append(td);
					}
					tbody.append(tr);
					table.append(thead);					
					table.append(tbody);
					div.append(table);
				}

			}	
		}
	}	
});
}
// payment
var reg   = document.getElementById("pay-reg"); //button 
if(reg !=null){
reg.addEventListener("click",function(){
	var input      = document.getElementById("reg_input"); 
	// console.log("input:"+input.value);
	var XHR   = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/payment.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","getPayData");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send("reg="+ encodeURIComponent(input.value));
    XHR.onreadystatechange = callback;
    function callback(){
    	if(XHR.readyState == 4){
    		if(XHR.status == 200){
    			// console.log(XHR.responseText);
    			var payDiv                        =  document.querySelector("#payDetails");
    			var reg_div     = document.querySelector("#payDetails .reg");
				var present_div = document.querySelector("#payDetails .present");
				var amount_div  = document.querySelector("#payDetails .amount");
    			var response                      =  JSON.parse(XHR.responseText);
    			var submitPay 	                  =  document.getElementById("submitPay");
    			reg_div.children[1].innerHTML     =  response.reg;
    			present_div.children[1].innerHTML =  response.present;
    			amount_div.children[1].innerHTML  =  response.fee;
    			payDiv.classList.remove('none');
    			submitPay.classList.remove('none');
    		}
    	}
    }
});
}
var submitPay = document.getElementById("submitPay");
if(submitPay != null){
submitPay.addEventListener("click",function(){
	var input      = document.getElementById("reg_input"); 
	var msgDIV   = document.getElementById("payResult");
	var XHR      = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/payment.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","putData");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send("reg="+ encodeURIComponent(input.value));
    XHR.onreadystatechange = callback;	
    function callback(){
    	if(XHR.readyState === 4 ){
    		if(XHR.status === 200){
    			var response = XHR.responseText;
    			if(response === "payed"){
    				msgDIV.innerHTML = "Already Paid For The Previous Month";
    			}else if(response == "done"){
    				msgDIV.innerHTML = "Success";
    				msg.classList.add("alert","alert-primary");
    				setTimeout(function(){
						msg.innerHTML = "";
						msg.classList.remove("alert");					
						msg.classList.remove("alert-success");
					},4000);
    			}else{
    				msgDIV.innerHTML = "";
    			}
    		}
    	}
    }
});
}














