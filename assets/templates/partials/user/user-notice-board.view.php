<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/notice.class.php") ?>
<?php if( isset($_GET['p']) && $_GET['p'] == 'my'  ): ?>
<table class="table table-hover ">
	<caption>My Notices</caption>
	<thead class="thead-light">
	<tr>
		<th>  Id      </th>
		<th>  Reg.No  </th> 
		<th>  Message </th>
		<th>  Date    </th> 
		<th>  Delete  </th>
	</tr>		
	</thead>
	<tbody>
		<?php $row = $ob->getNotice($_SESSION['name'][0]->user_reg);  ?>
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
<?php elseif( isset($_GET['p']) && $_GET['p'] == 'bcast'  ): ?>
	<table class="table table-hover ">
	<caption>Broadcast Notices</caption>
	<thead class="thead-light">
	<tr>
		<th>  Id      </th>
		<!-- <th>  Reg.No  </th>  -->
		<th>  Message </th>
		<th>  Date    </th>
	</tr>		
	</thead>
	<tbody>
		<?php $row = $ob->getBcast();  ?>
		<?php foreach ($row as $key => $value):  ?>
			<tr>
				<td> <?= $row[$key]['id'];      ?> </td>				
				<td> <?= $row[$key]['message']; ?> </td>				
				<td> <?= $row[$key]['date'];    ?> </td>				
			</tr>
		<?php endforeach; ?>	
	</tbody>
</table>
<?php endif; ?>
