var searchBtn   = document.getElementsByName("search")[0];
var searchIp    = document.getElementsByName("searchTxt")[0];

searchBtn.addEventListener("click",function(){
	// console.log(searchIp.value);
	var XHR = new XMLHttpRequest();
	XHR.open("POST","http://localhost/projects/hostel/classes/library.class.php",true);
	XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With', 'searchForm');
	XHR.onreadystatechange = responseHandler;
	XHR.send('searchQuery=' + encodeURIComponent(searchIp.value));
	function responseHandler(){
		var div = document.getElementById("dynDiv");
		// console.log(XHR.responseText);
		var res = JSON.parse(XHR.responseText);
		if( document.contains( document.getElementById("statTable") ) ){
			//remove talbe
			document.getElementById("statTable").remove();
		}
		if(document.contains( document.getElementById("dynTable")  )){
			document.getElementById("dynTable").remove();
		}
		// add dyn table
		if(res.length > 0 ){
			var table = document.createElement('table');
				table.setAttribute("id","dynTable");
				table.classList.add("table","table-hover");
			var	thead = document.createElement('thead');
				thead.classList.add("thead-light");
			var	tbody = document.createElement('tbody');
			var trH   = table.insertRow();
			var th    = 
			`
				<th> Id	</th>
				<th> Book Title	</th>
				<th> Book Name	</th>
				<th> Book Author</th>
				<th> </th>
			`;
			trH.innerHTML = th ;
			thead.append(trH);

			for(var i=0 ; i<res.length;i++){
				var tr = table.insertRow();
				for( prop in res[i] ){
					var td = document.createElement("td");
					td.innerHTML = res[i][prop];
					tr.append(td);
					if(prop === "image"){
						var img = document.createElement("img");
						img.setAttribute("src",)
					}
				}
				tbody.append(tr);
			}
			table.append(thead);
			table.append(tbody);
			div.append(table);
		}else{
			div.innerHTML = "<h5 class='text-center mt-4'> Nothing Found.. </h5>";
		}

	}	
});