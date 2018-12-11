<?php
if(isset($_GET['p'])): ?>
	<?php if( $_GET['p'] === 'update'): ?>
		<h1>UPDATE BODY</h1>;
	<?php elseif($_GET['p'] === 'delete'): ?>
		<h1>deley e body</h1>
	<?php else: ?>
		<h1>default boody</h1>
	<?php endif; ?>
<?php else: ?> 
<div class="section">
<h3 class="text-center font-weight-light">Members</h3>
<table class="table table-hover table-condensed m-2">
	<thead>
		<tr>
			<th>Date</th>
			<th>Message</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>12-09-2018</td>
			<td>Fee is Due</td>
			<td>  <a href="" class="dlt-btn" > Delete </a> </td>
		</tr>
	</tbody>	
</table>	
</div>
?>
<?php endif; ?>

