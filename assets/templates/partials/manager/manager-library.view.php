<?php  if( isset($_GET['p']) && $_GET['p'] === 'delete'  ):  ?>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/library.class.php"); ?>
	<?php $ob->renderDelete(); ?>

<?php elseif( isset($_GET['p']) && $_GET['p'] === 'add' ): ?>	
<div class="section">
	<h3 class="font-weight-light text-center mb-3"> Add New Book </h3>
	<form action=" <?= DOCROOT.'/classes/library.class.php' ?>" method="POST" class="form-group mt-2"  enctype="multipart/form-data" >
		<div class="row">
			<input type="text" name="b_title" placeholder="Enter The Book Title" class="col-md-6 offset-md-3 form-control mt-2" required="required">
			<input type="text" name="b_name" placeholder="Enter The Book Name" class="col-md-6 offset-md-3 form-control mt-2" required="required">
			<input type="text" name="b_author" placeholder="Enter The Book Author" class="col-md-6 offset-md-3 form-control mt-2" required="required">
			<label for="image" class="form-control col-md-6 offset-md-3 mt-2" style="text-overflow: ellipsis;">
				Select Book Image
			<input id="image" type="file" name="b_img" class="" required="required" style="text-overflow: ellipsis;">			
			</label>
			<input type="submit" name="Submit" class="col-md-6 offset-md-3 btn btn-success">		
		</div>
	</form>
</div>
<div id="msg"></div>
<script type="text/javascript">
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
</script>
<?php elseif( isset($_GET['p']) && $_GET['p'] === 'requests' ): ?>	
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/classes/library.class.php'); ?>
	<?php $row = $ob->getRequests() ; ?>
	<?php if(sizeof($row) > 1 ):  ?>
		<table class="table table-hover">
			<thead class="thead-light">
				<tr>
					<th>Id</th>
					<th>Book Name</th>
					<th>Author</th>
					<th>Requested By</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php foreach ($row as $key => $value): ?>
				<tr>
					<td><?= $row[$key]['id']; ?></td>
					<td><?= $row[$key]['book_name']; ?></td>
					<td><?= $row[$key]['author']; ?></td>
					<td><?= $row[$key]['requested_by']; ?></td>
					<td><?= $row[$key]['date']; ?></td>
					<td>
						<?php $id = $row[$key]['id'];  ?>
						<a href="<?= DOCROOT.'/classes/library.class.php?p=requests&delete='.$id; ?>">Delete</a>	
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<h6 class="text-center mt-5">No Requests To Show..</h6>	
	<?php endif; ?>
<?php endif; ?>