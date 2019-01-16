var searchBtn   = document.getElementsByName("search")[0];
var searchIp    = document.getElementsByName("searchTxt")[0];
if ( searchBtn != null){
	searchBtn.addEventListener("click",function(){
		// console.log(searchIp.value);
		var XHR = new XMLHttpRequest();
		XHR.open("POST","http://localhost/projects/hostel/classes/library.class.php",true);
		XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		XHR.setRequestHeader('X-Requested-With', 'searchForm');
		XHR.onreadystatechange = responseHandler;
		XHR.send('searchQuery=' + encodeURIComponent(searchIp.value));
		function responseHandler(){
			if(XHR.readyState === 4){
				if(XHR.status === 200){
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
							<th> Book Title	</th>
							<th> Book Name	</th>
							<th> Book Author</th>
							<th> Image</th>
						`;
						trH.innerHTML = th ;
						thead.append(trH);

						for(var i=0 ; i<res.length;i++){
							var tr = table.insertRow();
							for( prop in res[i] ){
								var td = document.createElement("td");

								if(prop === "image"){
									var img = document.createElement("img");
									img.setAttribute("src","../../images/books/"+res[i][prop]);
									img.setAttribute("width","150px");
									img.setAttribute("height","180px");
									td.append(img);
									tr.append(td);
								}else if(prop === "id"){
									continue;
								}else{
									td.innerHTML = res[i][prop];
									tr.append(td);
								}
							}
							tbody.append(tr);
						}
						table.append(thead);
						table.append(tbody);
						div.append(table);
					}
				}
			}
		}	
	});
}
	let searchParams = new URLSearchParams( window.location.href );
	let val          = searchParams.get("msg");
	var div          = document.getElementById("msg");
	if(val === 'yes'){
		//display succ msg
		div.classList.add("alert");
		div.classList.add("alert-success");
		div.innerHTML = "Success";
		setTimeout(function(){
			div.innerHTML = "";
			div.classList.remove("alert");					
			div.classList.remove("alert-success");
		},5000);
	}