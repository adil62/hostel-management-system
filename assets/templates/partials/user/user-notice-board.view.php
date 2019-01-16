<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/notice.class.php") ?>
<?php if( isset($_GET['p']) && $_GET['p'] == 'my'  ): ?>
<?php $row = $ob->getNotice($_SESSION['name'][0]->user_reg);  ?>
<?php if ( sizeof($row) != 0 ): ?>
	<h3 class="text-center font-weight-light">Notices</h3>
	<table class="table table-hover ">
		<caption>My Notices</caption>
		<thead class="thead-light">
		<tr>
			<th>  Id      </th>
			<th>  Reg.No  </th> 
			<th>  Message </th>
			<th>  Date    </th> 
<!-- 			<th>  Delete  </th> -->
		</tr>		
		</thead>
		<tbody>
			<?php foreach ($row as $key => $value):  ?>
				<tr>
					<td> <?= $row[$key]['id'];      ?> </td>				
					<td> <?= $row[$key]['reg'];     ?> </td>				
					<td> <?= $row[$key]['message']; ?> </td>				
					<td> <?= $row[$key]['date'];    ?> </td>				
				</tr>
			<?php endforeach; ?>	
		</tbody>
	</table>
<?php else: ?>
	<p class="alert alert-primary">No Notices..</p>
<?php endif; ?>	
<!-- BROADCAST -->
<?php elseif( isset($_GET['p']) && $_GET['p'] == 'bcast'  ): ?>
	<?php $row = $ob->getBcast();  ?>
	<?php if( sizeof($row) != 0 ): ?>
		<h3 class="text-center font-weight-light ">Broadcasted Messages</h3>
		<table class="table table-hover ">
		<caption>Broadcast Notices</caption>
		<thead class="thead-light">
		<tr>
			<th>  Id      </th>
			<th>  Message </th>
			<th>  Date    </th>
		</tr>		
		</thead>
		<tbody>
			<?php foreach ($row as $key => $value):  ?>
				<tr>
					<td> <?= $row[$key]['id'];      ?> </td>				
					<td> <?= $row[$key]['message']; ?> </td>				
					<td> <?= $row[$key]['date'];    ?> </td>				
				</tr>
			<?php endforeach; ?>	
		</tbody>
		</table>
	<?php else: ?>
		<p class="alert alert-primary">No res..</p>
	<?php endif; ?>		
<?php endif; ?>
