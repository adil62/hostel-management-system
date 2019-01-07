window.addEventListener("load",function(){
	var msgDIV   = document.getElementById("divTable");
	var XHR      = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/fine.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","getData");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// XHR.send("reg="+ encodeURIComponent(input.value));
	XHR.send("getData=1");
    function callback(){
    	if( XHR.readyState === 4){
    		if( XHR.status === 200){
    			if ( document.contains( document.getElementById("dynTable") ) ){
    				document.getElementById("dynTable").remove();
    			}
    			var res   = JSON.parse(XHR.responseText);
    			var table = document.createElement('table');
    			table.classList.add('table','table-hover');
    			table.setAttribute("id","dynTable");
    			var tBody = document.createElement('tbody');
    			var tHead = document.createElement('thead');
    			var trH   = table.insertRow();
    			// console.log(res.length);
    			for(var i = 0 ; i <= res.length; i++){
	    			var trB 		 = table.insertRow();
	    			for( prop in res[i] ){
	    				if( i === 0){
		    				var th       = document.createElement('th');
		    				th.innerHTML = prop;
		    				trH.append(th);
		    				tHead.append(trH);
		    				// console.log(prop);
		    			}
		    			var td 		 = document.createElement('td');
		    			td.innerHTML = res[i][prop];
		    			// console.log(res[i][prop]);
		    			trB.append(td);
		    			tBody.append(trB);
	    			}		
    			} 
    			table.append(tHead);
    			table.append(tBody);
    			msgDIV.append(table);
    			// console.log(res);
    		}
    	}
    }
});

filterMonth = document.getElementById("filterMonth");
filterMonth.addEventListener("click",function(){
	var msgDIV      = document.getElementById("divTable");
	var selectValue = document.getElementById("month"); 
	var XHR         = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/fine.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.setRequestHeader("X-Requested-With","getMonth");
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	XHR.send("month="+encodeURIComponent(selectValue.value));
    function callback(){
    	if( XHR.readyState === 4){
    		if( XHR.status === 200){
    			if ( document.contains( document.getElementById("dynTable") ) ){
    				document.getElementById("dynTable").remove();
    			}
    			var res   = JSON.parse(XHR.responseText);
    			var table = document.createElement('table');
    			table.classList.add('table','table-hover');
    			table.setAttribute("id","dynTable");
    			var tBody = document.createElement('tbody');
    			var tHead = document.createElement('thead');
    			var trH   = table.insertRow();
    			// console.log(res.length);
    			for(var i = 0 ; i <= res.length; i++){
	    			var trB 		 = table.insertRow();
	    			for( prop in res[i] ){
	    				if( i === 0){
		    				var th       = document.createElement('th');
		    				th.innerHTML = prop;
		    				trH.append(th);
		    				tHead.append(trH);
		    				// console.log(prop);
		    			}
		    			var td 		 = document.createElement('td');
		    			td.innerHTML = res[i][prop];
		    			// console.log(res[i][prop]);
		    			trB.append(td);
		    			tBody.append(trB);
	    			}		
    			} 
    			table.append(tHead);
    			table.append(tBody);
    			msgDIV.append(table);
    			console.log(res);
    		}
    	}	
    }
});