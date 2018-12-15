var ele          = document.getElementById("ajaxBtn");
var responseDATA;
ele.addEventListener('click',function(){
	var postDATA = document.getElementById("reg_no").value;
	// console.log(postDATA);
	var XHR      = new XMLHttpRequest;
	XHR.onreadystatechange = responseHandle;	
	XHR.open('POST', 'http://localhost/projects/hostel/classes/member-update.class.php', true);
	XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With', 'Ajax');
	XHR.send('reg_no=' + encodeURIComponent(postDATA));
	function responseHandle(){
		if ( XHR.readyState === 4 ) {
	    // Everything is good, the response was received.
			if (XHR.status === 200) {
				responseDATA = XHR.responseText;
				// console.log(responseDATA);
				responseDATA = JSON.parse(responseDATA);
				displayResponse(responseDATA);
				// console.log(responseDATA);
			} 
		} else {
	    	console.log("AJAX FETCHING.......");
		}
	}
	function displayResponse(DATA){
		var section = document.getElementById("section1");
		var table   = `
		<table class="table table-condensed table-hover table-dashed">
		<thead>
			<tr>
				<th>Name             </th>
				<th>Branch 			 </th>
				<th>Year			 </th>
				<th>Reg				 </th>
				<th>Email		     </th>
				<th>Phone		     </th>
				<th>Address	         </th>
				<th>Parent Phone     </th>
				<th>Gender		     </th>
				<th>Room  		     </th>
			</tr>	
		</thead>
		<tbody>
				<td id="aj-name">   ${DATA.user_name}          </td>
				<td id="aj-branch"> ${DATA.user_branch}        </td>
				<td id="aj-year">   ${DATA.user_year}          </td>
				<td id="aj-reg">    ${DATA.user_reg}           </td>
				<td id="aj-email">  ${DATA.user_email}         </td>
				<td id="aj-phone">  ${DATA.user_phone}         </td>
				<td id="aj-phone">  ${DATA.user_address}       </td>
				<td id="aj-phone">  ${DATA.user_parent_phone}  </td>
				<td id="aj-phone">  ${DATA.user_gender}        </td>
				<td id="aj-phone">  ${DATA.user_room}          </td>
		</tbody>
		</table>`;
	section.innerHTML = table;	
	}
});

var ele2   = document.getElementById("AJAX2");
var responseDATA2;
ele2.addEventListener('click',function(){
	var postDATA      = document.getElementById("reg_no").value;  //register number
	var postDATA2     = document.getElementsByName("update_name")[0].value; //name to be updated
	var postDATAvalue = document.getElementsByName("update_value")[0].value; //new value to be inserted
	// console.log(postDATA2);
	var XHR      = new XMLHttpRequest;
	XHR.onreadystatechange = responseHandle;	
	XHR.open('POST', 'http://localhost/projects/hostel/classes/member-update.class.php', true);
	XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	XHR.setRequestHeader('X-Requested-With', 'AjaxUPDATE');
	// console.log('update_name=' + encodeURIComponent(postDATA2)+'&'+'update_value=' + encodeURIComponent(postDATAvalue));
	XHR.send('update_name=' + encodeURIComponent(postDATA2)+
			 '&'+'update_value=' + encodeURIComponent(postDATAvalue)+
			 '&'+'reg_no=' + encodeURIComponent(postDATA));
	function responseHandle(){
		if ( XHR.readyState === 4 ) {
	    // Everything is good, the response was received.
			if (XHR.status === 200) {
				responseDATA2 = XHR.responseText;
				displayResponse(responseDATA2);
			} 
		} 
	}
	function displayResponse(responseDATA2){
		console.log(responseDATA2);
		var elem = document.getElementById('result');
		if(responseDATA2 == '1')
			elem.innerHTML = `Successfully Updated`;
		else
			elem.innerHTML = `Error Updating Record`;
	}
});