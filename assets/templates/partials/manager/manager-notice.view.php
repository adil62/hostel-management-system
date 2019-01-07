<?php if( isset($_GET['p'] ) && $_GET['p'] == 'add'  || empty($_GET['p']) ): ?>
<div class="section">
	<h3 class="text-center font-weight-light mb-3">New Notice</h3>						
	<input type="text" name="" placeholder="Enter Reg Number" id="regNum">              
	<input type="text" name="" placeholder="Enter Message" id="Msg" required="required">
	<input type="submit" name="" class="btn btn btn-success btn-sm" value="Add" id="submit">
</div>	

<?php elseif( isset($_GET['p']) && $_GET['p'] == 'view'  ): ?>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/notice.class.php") ?>
<table class="table table-hover ">
	<caption>All Notices</caption>
	<thead class="thead-light">
	<tr>
		<th>Id</th>
		<th>Reg.No</th>
		<th>Message</th>
		<th>Date</th>
		<th>Delete</th>
	</tr>		
	</thead>
	<tbody>
		<?php $row = $ob->getNoticeAll();  ?>
		<?php foreach ($row as $key => $value):  ?>
			<tr>
				<td> <?= $row[$key]['id'];      ?> </td>				
				<td> <?= $row[$key]['reg'];     ?> </td>				
				<td> <?= $row[$key]['message']; ?> </td>				
				<td> <?= $row[$key]['date'];    ?> </td>				
				<td>  
				<a  href=" <?= 'http://localhost/projects/hostel/classes/notice.class.php?dltId='.$row[$key]['reg'];?> " >
					<strong>Delete</strong>
				</a> 
				</td>				
			</tr>
		<?php endforeach; ?>	
	</tbody>
		
</table>
<?php endif; ?>
