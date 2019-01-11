var viewBtn = document.getElementById('view');
var date    = document.getElementById('date');

viewBtn.addEventListener('click',function(){
	// console.log(date.value);
	//post the date to page
	// display returned info as table
	var XHR = new XMLHttpRequest();
	XHR.open('POST','http://localhost/projects/hostel/classes/attendence.class.php',true);
	XHR.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With','viewRecords');
	XHR.send('date=' + encodeURIComponent(date.value) );
	XHR.onreadystatechange = callback;
	function callback(){
		if(XHR.readyState === 4) {
			if(XHR.status === 200) {
				// generate dyn TABLE
				// $res = JSON.parse( XHR.responseText );
				var res    =  XHR.responseText;
				// console.log(res);
				parsedData =  JSON.parse(XHR.responseText);
				// console.log(parsedData);
				generateTable(parsedData);
			}
		}
	}
});
function generateTable(data){
	// when multiple requests are made multiple tables are generated so remove previosly created table
	if ( document.contains( document.getElementById("dynTable") )){
       document.getElementById("dynTable").remove();
    }else{
		 // get Div element to be appende the table 
    	var DIVtabl   = document.getElementById("DIVtable");  
		// create <table>
		 var table     = document.createElement("TABLE");
		 table.setAttribute("id", "dynTable");
		 // add bootstrap clas to table
		 table.classList.add("table");table.classList.add("table-hover");
		 // create a row for heading
	 	var rowHead   = table.insertRow();
	 	// include TH's in The row
	 	
		 // add th e th's to the THEAD-Row and Add the row to the table and append to DIV in html
		 table.appendChild(rowHead);
		 // DIVtable.appendChild(table);

		 // var tbody= document.createElement("tbody");
		 if ( data.constructor === Array ){
			for (prop in data[0]){
		 		var th = document.createElement("th");	
		 		th.innerHTML = prop;
			 	rowHead.appendChild(th);
			 }
			 for( var i=0 ; i <= data.length ;i++ ){
			 	// create one row Put nth element in to the row
			 	var rowBody = table.insertRow();
			 	for(prop in data[i]){
			 		if( typeof data[i][prop] != 'undefined' ){
						var td = document.createElement("td");
			 			// console.log(data[prop]);
			 			td.innerHTML = data[i][prop];
			 			rowBody.appendChild(td);
			 			table.appendChild(rowBody);
			 		}
			 	}
			 }
			}else if( typeof data === 'object' ){
			for (prop in data){
		 		var th = document.createElement("th");	
		 		th.innerHTML = prop;
			 	rowHead.appendChild(th);
			 }
			 for( var i=0 ; i <= Object.keys(data).length ;i++ ){
			 	// create one row Put nth element in to the row
			 	var rowBody = table.insertRow();
			 	for(prop in data){
			 		if( typeof data[prop][i] != 'undefined' ){
						var td = document.createElement("td");
			 			// console.log(data[prop]);
			 			td.innerHTML = data[prop][i];
			 			rowBody.appendChild(td);
			 			table.appendChild(rowBody);
			 		}
			 	}
			 }
			}
		 // append the final table to the child
		 DIVtable.appendChild(table);
   	 }

}


var monthFilter = document.getElementById("monthFilter");
// if( monthFilter != null ){
	monthFilter.addEventListener("click",function(){
		console.log("hii");
		var month = document.getElementById("month");
		var year  = document.getElementById("year");
		var XHR   = new XMLHttpRequest();
		XHR.open('POST','http://localhost/projects/hostel/classes/attendence.class.php',true);
		XHR.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XHR.setRequestHeader('X-Requested-With','filterMonth');
		XHR.send( "month=" + encodeURIComponent(month.value) + "&year=" + encodeURIComponent(year.value) );
		XHR.onreadystatechange = callback;
		function callback(){
			if(XHR.readyState === 4){
				if (XHR.status === 200){
					// console.log(XHR.responseText);			
					var res = JSON.parse( XHR.responseText );		
					generateTable(res);
				}	
				else{
					
				}
			}
		}
	});
// }	