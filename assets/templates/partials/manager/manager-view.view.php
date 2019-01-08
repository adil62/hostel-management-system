<div class="section">
	<div class="row">
		<label class="mr-3">Filter</label>
		<div id="room"></div>
		<button class="btn btn-outline-warning btn-sm ml-3" id="viewRoom">Go</button>	
	</div>
	<div id="roomDetails" style="overflow-x: scroll;max-width: 1000px;"></div>	
</div>
<script type="text/javascript">
	
window.addEventListener("load",function(){
	var selectRoom = document.getElementById('room');
	var selectTag  = document.createElement("select");
		selectTag.setAttribute("id","selectDyn")
	// selectTag.setAttribute("value")
	var XHR   = new XMLHttpRequest();
	XHR.open("GET","http://localhost/projects/hostel/classes/room.class.php",true);
	XHR.onreadystatechange = callback;
	XHR.send();
    function callback(){
    	if(XHR.readyState == 4){
    		if(XHR.status == 200){
    			var response = JSON.parse(XHR.responseText);
    			for(var i=0 ; i<response.length ;i++){
					for(prop in response[i]){
						var option       = document.createElement('option');
						option.innerHTML = response[i][prop]; 
						// console.log(response[0][prop] );
						selectTag.append(option);
					} 	
    			}
    			selectRoom.append(selectTag);
    			var select = document.getElementById("selectDyn");
    			console.log( select.children.length );
    			for(var i=0; i < select.children.length; i++){
   					for( var k=0; k < select.children.length ; k++ ){
    					console.log(select.children[i]);
   						if( select.children[i].innerHTML == select.children[k].innerHTML ){
			    				if( i != k ){
			    					select.children[i].remove();
			    				}
   						}else{
   							continue;
   						}
   					} 				
    			}
    		}
    	} 
    }	
});
var viewGo 		   = document.getElementById("viewRoom");
viewGo.addEventListener("click",function(){
	var selectTag  = document.getElementById("selectDyn");
	// console.log(selectTag.value);
	var XHR        = new XMLHttpRequest();
	XHR.open("GET","http://localhost/projects/hostel/classes/room.class.php?viewRoom="+selectTag.value,true);
	XHR.onreadystatechange = callback;
	XHR.send();
    function callback(){
    	if( XHR.readyState === 4 ){
    		if( XHR.status === 200 ){
    			if(document.contains(document.getElementById("dynRoomDetails"))){
    				document.getElementById("dynRoomDetails").remove();
    			}
    			
    			var result   = JSON.parse(XHR.responseText);
    			var dynTable = document.getElementById("roomDetails");
    			var table    = document.createElement('table');
    				table.setAttribute("id","dynRoomDetails");
    				table.classList.add("table","table-hover","table-compact");
    			var tBody    = document.createElement('tbody');
    			var tHead    = document.createElement('thead');
                    tHead.classList.add("thead-light");
				var trH      = table.insertRow();
    			
    			console.log(result[0][prop]);
    			for(var i=0; i<result.length ; i++){
    				var tr        = table.insertRow();
    				for(prop in result[i]){
	    				if( i == 0 ){
		    				var th       = document.createElement('th');
		    				th.innerHTML = prop;
		    				trH.append(th);
		    				tHead.append(trH);
	    				}
	    				var td        = document.createElement('td');
	    				td.innerHTML  = result[i][prop];
	    				tr.append(td);
	    				tBody.append(tr); 
	    				
    				}
    			}
    			table.append(tHead);
    			table.append(tBody);
    			dynTable.append(table);
    			// console.log(result);
    		}
    	}
    }
}); 







</script>